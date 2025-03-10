<?php

namespace App\Http\Controllers\Api\V1;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Tools;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $request->validate([
            'user_query' => 'required|string|max:500',
            'type' => 'required|in:image,chat,voice',
            'category' => 'required_if:type,chat|in:blog,seo,translate,travel,cooking,holoo,tamin,laboroffice,sepidar,shahrdari,hesabdari,zaraban',
        ], [
            'user_query.required' => 'فیلد سوال الزامی است',
            'type.required' => 'نوع درخواست الزامی است',
            'category.required' => 'فیلد دسته بندی الزامی است',
        ]);

        $userNolimit = User::where('mobile', '09128458010')->first();

        if (auth()->id() != $userNolimit->id) {
            $checkplan = helper::checkplan(auth()->id());
            $v = json_decode(json_encode($checkplan));

            if (@$v->original->status == 2) {
                //return response()->json($v->original->message, 403);
                return $this->respondError($v->original->message);
            }



            $word_limit = Transaction::where('vendor_id', auth()->id())->sum('word_limit');

            $total_word = Chat::where('user_id', auth()->id())->sum('count');

            if ($total_word > $word_limit) {
                return response()->json(['error' => 'محدودیت توکن شما به پایان رسیده است'], 403);
            }
        }



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
            case 'holoo':
                $assistant_id = "asst_wjsXlAxIgFCfCT0kcWh9fu4C";
                break;
            case 'tamin':
                $assistant_id = "asst_BfMuAxYyfDZErkvzNWoMAAxl";
                break;
            case 'laboroffice':
                $assistant_id = "asst_tMHjw5sIGZOsB0AcYboZuOMW";
                break;
            case 'sepidar':
                $assistant_id = "asst_W7gjE3OUT2n9nzvHAA94Fn1x";
                break;
            case 'shahrdari':
                $assistant_id = "asst_ZenchXROVeFKvW9Lx9WIvus5";
                break;
            case 'hesabdari':
                $assistant_id = "asst_lOgPuDvqZGprKeNNoIOVxu7m";
                break;
            case 'zaraban':
                $assistant_id = "asst_A4EEnFcmfFcOtpUG8aAZU1us";
                break;
            default:
                return response()->json(['message' => 'دسته‌بندی نامعتبر است'], 422);
        }

        $chatPots = Chat::where(['user_id' => auth()->id(), 'assistant_id' => $assistant_id])->first();

        if (isset($chatPots) and $chatPots->thread_id) {
            $thread_id = $chatPots->thread_id;
        } else {
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

        $postContent = $response->json()['response'];
        $postContent = preg_replace('/[\x{1F600}-\x{1F64F}]/u', '', $postContent);
        $postContent = preg_replace('/[^\p{L}\p{N}\s]/u', '', $postContent);
        $wordCount = preg_match_all('/\p{L}+/u', $postContent);

        $responseData = $response->json();
        $tokensUsed = $responseData['usage']['total_tokens'] ?? null;

        $newChat = new Chat();
        $newChat->user_id = auth()->id();
        $newChat->type = $request->input('type');
        $newChat->category = $request->input('category');
        $newChat->user_query = $request->input('user_query');
        $newChat->assistant_id = $assistant_id;
        $newChat->thread_id = $thread_id;
        $newChat->response = $response->json()['response'];
        $newChat->count = $tokensUsed;
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
            return response()->json(['error' => 'خطا در پردازش درخواست', 'details' => $errorMessage], 500);
        }
        $ImagePrompt = $responseData['choices'][0]['message']['content'];

        $newChat = new Chat();
        $newChat->user_id = auth()->id();
        $newChat->type = $request->input('type');
        $newChat->category = $request->input('category');
        $newChat->user_query = $request->input('user_query');
        $newChat->image_prompt = $ImagePrompt;
        $newChat->count = 200;
        $newChat->save();


        //$url = 'https://queue.fal.run/fal-ai/flux-pro/v1.1-ultra';
        $url = "https://queue.fal.run/fal-ai/fast-sdxl";
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

                $newChat->image_request_id = $response->json()['request_id'];
                $newChat->images_status = "generate";
                $newChat->save();
                $get_image_chat = asset('') . 'api/v1/get-image-chat/' . $newChat->id;
                return response()->json(['message' => 'تصویر با موفقیت ثبت شد و در حال پردازش است.', 'chat_id' => $newChat->id, 'get-image-chat' => $get_image_chat]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'خطا در پردازش درخواست', 'details' => $e->getMessage()], 500);
        }
    }

    private function GoogleTranslate($text)
    {
        return strtolower((new GoogleTranslate('en'))->translate($text));
    }

    public function getImageChat($chat_id)
    {
        $content = Chat::find($chat_id);
        if ($content and $content->image_request_id and $content->images_status == "generate" and $content->type == "image") {

            $falAiApi = helper::appdata('')->imageAiApiKey;

            //flux-pro
            //$baseUrl = "https://queue.fal.run/fal-ai/flux-pro/requests/";

            //fast-sdxl
            $baseUrl = "https://queue.fal.run/fal-ai/fast-sdxl/requests/";

            //fast-turbo-diffusion
            //$baseUrl = "https://queue.fal.run/fal-ai/fast-turbo-diffusion/requests/";


            $statusUrl = $baseUrl . $content->image_request_id . "/status";
            $detailsUrl = $baseUrl . $content->image_request_id;

            // مرحله 1: بررسی وضعیت
            $response = Http::withHeaders([
                'Authorization' => 'Key ' . $falAiApi,
                'Content-Type' => 'application/json',
            ])->get($statusUrl);

            if (isset($response->json()['detail'])) {
                $content->errorMessage .= ' ' . $response->json()['detail'];
                $content->images_status = "error";
                $content->save();
                return response()->json(['error' => 'خطا در پردازش درخواست', 'details' => $response->json()['detail']], 500);
            }

            $statusData = $response->json();
            if (isset($statusData['status']) && $statusData['status'] === 'COMPLETED') {
                // مرحله 2: دریافت اطلاعات تصویر
                $imageResponse = Http::withHeaders([
                    'Authorization' => 'Key ' . $falAiApi,
                    'Content-Type' => 'application/json',
                ])->get($detailsUrl);


                if ($imageResponse->failed()) {
                    $errorData = $imageResponse->json();
                    $errorMessage = $errorData['message'] ?? json_encode($errorData); // اگر کلید message وجود نداشت، کل آرایه را به JSON تبدیل کنید
                    $content->messages .= ' ' . $errorMessage;
                    $content->images_status = 'error';
                    $content->save();
                    return response()->json(['error' => 'خطا در پردازش درخواست', 'details' => $errorMessage], 500);
                }

                $imageData = $imageResponse->json();
                $imageUrl = $imageData['images'][0]['url'] ?? null;

                if ($imageUrl) {
                    // مرحله 3: ذخیره تصویر در پوشه‌های لاراول
                    $imageContent = Http::get($imageUrl);

                    if ($imageContent->failed()) {
                        $content->messages .= ' Failed to download image.';
                        $content->save();
                    }

                    $path = public_path('images/chats/' . $content->vendor_id . '/generated');
                    if (!File::exists($path)) {
                        File::makeDirectory($path, 0775, true);  // Create directory recursively
                    }

                    $imageName = basename($imageUrl);
                    $imagePath = 'images/chats/' . $content->vendor_id . '/generated/' . $imageName;
                    file_put_contents(public_path($imagePath), $imageContent->body());

                    $content->gallery()->create([
                        'image_link' => $imageUrl,
                        'image' => $imagePath,
                    ]);
                    $content->count = 200;
                    $content->images_status = 'end';
                    $content->save();

                    $imageUrlLink = asset($imagePath);
                    return response()->json(['message' => 'تصویر با موفقیت ایجاد شد', 'image' => $imageUrlLink], 200);
                } else {
                    // اگر URL تصویر موجود نباشد
                    $content->messages .= ' No image URL found.';
                    $content->save();

                    return response()->json(['error' => 'خطا در پردازش درخواست', 'details' => ' No image URL found.'], 500);
                }
            } else {
                return response()->json(['message' => 'تصویر در حال پردازش است.',], 422);
            }
        } elseif ($content and $content->images_status == "end") {
            $gallery = $content->gallery()->latest()->first();
            if (isset($gallery)) {
                $imageUrlLink = asset($gallery->image);
                return response()->json(['message' => 'تصویر از قبل موجود می باشد', 'image' => $imageUrlLink], 200);
            }
            return response()->json(['message' => 'تصویر پیدا نشد.',], 422);
        }
    }
}
