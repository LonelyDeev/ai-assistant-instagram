<?php

namespace App\Http\Controllers\Api\V1;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ChatAiController extends Controller
{
    public function __construct()
    {
        $this->openAiApi = helper::appdata('')->aiApiKey;
        $this->falAiApi = helper::appdata('')->imageAiApiKey;
    }

    public function index(Request $request)
    {
        // اعتبارسنجی درخواست
        $request->validate([
            'user_query' => 'required|string|max:500',
            'type' => 'required|in:image,chat,voice',
            'category' => 'required|in:blog,seo,translate,travel,cooking',
        ], [
            'user_query.required' => 'فیلد سوال الزامی است',
            'type.required' => 'نوع درخواست الزامی است',
            'category.required' => 'فیلد دسته بندی الزامی است',
        ]);

        $response = null;
        switch ($request->type) {
            case 'image':
                $response = $this->generateImage($request);
                break;
            case 'voice':
                return response()->json(['message' => 'پردازش صدا در حال توسعه است'], 200);
                break;
            case 'chat':
                $response = $this->generateText($request);
                break;
            default:
                return response()->json(['message' => 'نوع درخواست نامعتبر است'], 422);
        }

        if ($response) {
            return $response;
        } else {
            return response()->json(['message' => 'خطا در پردازش درخواست'], 500);
        }
    }

    private function generateText(Request $request)
    {
        $opAiKey = env('OPENAI_API_KEY');
        switch ($request->input('category')) {
            case 'blog':
                $assistant_id = "asst_WJIrOz6oAnM07pOIHscZG068";
                break;
            case 'seo':
                $assistant_id = "asst_l2kyJUrxsULeUUA4YXsAcQYq";
                break;
            case 'translate':
                $assistant_id = "asst_wOrCK2ovpfRN16uhcRO7evW3";
                break;
            case 'travel':
                $assistant_id = "asst_wUdMybjciNjTzrGsBYuDEd8T";
                break;
            case 'cooking':
                $assistant_id = "asst_b5MsG33fBoG9BgD9wXIHURC2";
                break;
            default:
                return response()->json(['message' => 'دسته‌بندی نامعتبر است'], 422);
        }

        $thread_id = auth()->user()->thread_id;
        if (!$thread_id) {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $opAiKey,
                'OpenAI-Beta' => 'assistants=v2',
            ])->post('https://api.openai.com/v1/threads', []);

            if ($response->failed()) {
                return response()->json(['error' => 'خطا در ایجاد thread', 'details' => $response->body()], 500);
            }

            $thread_id = $response->json()['id'];
            User::where('id', auth()->user()->id)->update(['thread_id' => $thread_id]);
        }

        // ارسال درخواست به OpenAI
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $user_query = $request->input('user_query');
        //$user_query=$this->GoogleTranslate($request->user_query);

        $response = Http::withHeaders($headers)->withBody(json_encode([
            'user_query' => $user_query,
            'thread_id' => $thread_id,
            'assistant_id' => $assistant_id,
            'openai_apikey' => $opAiKey,
        ]), 'application/json')->post('https://openai.webcomapipy.ir/chat');

        if ($response->failed()) {
            return response()->json(['error' => 'خطا در پردازش درخواست', 'details' => $response->body()], 500);
        }

        $postContent=$response->json()['response'];
        $postContent = preg_replace('/[\x{1F600}-\x{1F64F}]/u', '', $postContent);
        $postContent = preg_replace('/[^\p{L}\p{N}\s]/u', '', $postContent);
        $wordCount = preg_match_all('/\p{L}+/u', $postContent);

        $newChat=new Chat();
        $newChat->user_id=auth()->id();
        $newChat->type=$request->input('type');
        $newChat->category=$request->input('category');
        $newChat->user_query=$request->input('user_query');
        $newChat->assistant_id=$assistant_id;
        $newChat->thread_id=$thread_id;
        $newChat->response=$response->json()['response'];
        $newChat->count=$wordCount;
        $newChat->save();


        return response()->json(['response' => $response->json()['response']]);
    }


    private function generateImage(Request $request)
    {
        $prompt = $this->GoogleTranslate($request->user_query);
        $ImagePrompt = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->openAiApi,
        ])->timeout(60)->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are an expert in creating image generation prompts for AI. Write a highly detailed prompt for generating an AI-generated image based on the following user description. Ensure it includes artistic style, environment, lighting, camera angle, and colors. Limit to 500 characters.'
                ],
                [
                    'role' => 'user',
                    'content' => 'Generate an image ' . $prompt,
                ]
            ],
            'max_tokens' => 300,
        ]);
        $responseData = $ImagePrompt->json();

        // بررسی وجود خطا در پاسخ
        if (isset($responseData['error'])) {
            $errorMessage = $responseData['error']['message'];
            $errorCode = $responseData['error']['code'];

          /*  // ذخیره خطا در جدول
            $content->messages = $content->messages . ' ' . $errorMessage;
            $content->images_status = "error";
            $content->save();*/

            // اگر خطا مربوط به API key باشد، پیام مناسب را برگردانید
            if ($errorCode === 'invalid_api_key') {
                $message = trans('messages.invalid_api');
            } else {
                $message = $errorMessage;
            }

            // لاگ خطا
            Log::error("API Error: " . $errorMessage);

            return;
        }
        $ImagePrompt = $responseData['choices'][0]['message']['content'];

        /*$content->image_prompt = $ImagePrompt;
        $content->save();*/

        //$url = 'https://queue.fal.run/fal-ai/flux-pro/v1.1-ultra';
        $url="https://queue.fal.run/fal-ai/fast-sdxl";
        //$url="https://queue.fal.run/fal-ai/fast-turbo-diffusion";

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Key ' . $this->falAiApi,
                'Content-Type' => 'application/json',
            ])->timeout(60)->post($url, [
                "prompt" => $ImagePrompt,
                "num_images" => 1,
                "enable_safety_checker" => true,
                "safety_tolerance" => "2",
                "output_format" => "jpeg",
                "aspect_ratio" => "16:9",
            ]);


            if ($response->successful()) {

                $content->image_request_id = $response->json()['request_id'];
                $content->images_status = "generate";
                $content->save();
            }

        } catch (\Exception $e) {
            $content->messages = $content->messages . ' ' . $e->getMessage();
            $content->images_status = "error";
            $content->save();
        }
    }

    private function GoogleTranslate($text)
    {
        return strtolower((new GoogleTranslate('en'))->translate($text));
    }
}
