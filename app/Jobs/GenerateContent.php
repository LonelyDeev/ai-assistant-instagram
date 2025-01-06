<?php

namespace App\Jobs;

use App\helper\helper;
use App\Models\Content;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class GenerateContent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 10;
    public $openAiApi;
    public $falAiApi;

    public function __construct()
    {
        // مقداردهی متغیرها
        $this->openAiApi = env('OPENAI_API_KEY');
        $this->falAiApi = env('IMAGE_AI_API_KEY');
    }

    public function handle()
    {
        //Log::info('GenerateContent Job started.');
        $contents = Content::where('status', 'waiting')->get();
        foreach ($contents as $content) {

            if ($content->tools_slug == "instagram-assistant") {



                $this->InstagramAssistant($content);

            }

        }

    }

    private function InstagramAssistant($content)
    {
        $translatedQuery = $this->GoogleTranslate($content->title);
        $temperature = $this->Temperature($content->temperature);

        try {


            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->openAiApi,
            ])->timeout(60)->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4-turbo',
                'temperature' => 0.8,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are an expert content creator specializing in crafting high-quality Instagram posts in Persian. Always include a creative caption, a step-by-step explanation if needed, and a list of hashtags relevant to the content. Make sure the content is engaging, complete, and culturally relevant to the Persian audience.' . $temperature . ' Use emoticons as much as you can.',
                    ],
                    [
                        'role' => 'user',
                        'content' => $translatedQuery
                    ]
                ],
                'max_tokens' => 1000,
            ]);

            $responseData = $response->json();

            // بررسی وجود خطا در پاسخ
            if (isset($responseData['error'])) {
                $errorMessage = $responseData['error']['message'];
                $errorCode = $responseData['error']['code'];

                // ذخیره خطا در جدول
                $content->messages = $content->messages . ' ' . $errorMessage;
                $content->status = "error";
                $content->save();

                // اگر خطا مربوط به API key باشد، پیام مناسب را برگردانید
                if ($errorCode === 'invalid_api_key') {
                    $message = trans('messages.invalid_api');
                } else {
                    $message = $errorMessage;
                }

                // لاگ خطا
                Log::error("API Error: " . $errorMessage);

                // ادامه ندهید و از تابع خارج شوید
                return;
            }

            // اگر خطایی وجود نداشت، ادامه دهید
            $postContent = $responseData['choices'][0]['message']['content'];

            $content->content = $postContent;


            $postContent = preg_replace('/[\x{1F600}-\x{1F64F}]/u', '', $postContent);
            $postContent = preg_replace('/[^\p{L}\p{N}\s]/u', '', $postContent);
            $wordCount = preg_match_all('/\p{L}+/u', $postContent);


            $content->count += $wordCount;
            $content->status = "end";
            $content->save();



            //از جاب استفاده شده به جای استفاده متقیم
            //$this->GenerateImage($content, $translatedQuery);

        } catch (\Throwable $th) {
            // مدیریت سایر خطاها
            if ($th->getMessage() == "title_required") {
                $message = 'عنوان ضروری است';
            } elseif ($th->getMessage() == "slug_unique") {
                $message = 'موضوع بخش تکراری است';
            } elseif ($th->getMessage() == 'You exceeded your current quota, please check your plan and billing details.') {
                $message = trans('messages.invalid_api_maximum');
            } elseif ($th->getMessage() == 'Undefined array key "choices"') {
                $message = trans('messages.error_connections');
            } else {
                $message = $th->getMessage();
            }

            $content->messages = $content->messages . ' ' . $message;
            $content->status = "error";
            $content->save();

            // لاگ خطا
            Log::error("Exception: " . $th->getMessage());
        }

    }

    private function GenerateImage($content, $prompt = null)
    {
        if ($content->generate_image == "yes" and $content->images_status == "waiting") {

            if (!$prompt) {
                $prompt = $this->GoogleTranslate($content->title);
            }


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

                // ذخیره خطا در جدول
                $content->messages = $content->messages . ' ' . $errorMessage;
                $content->images_status = "error";
                $content->save();

                // اگر خطا مربوط به API key باشد، پیام مناسب را برگردانید
                if ($errorCode === 'invalid_api_key') {
                    $message = trans('messages.invalid_api');
                } else {
                    $message = $errorMessage;
                }

                // لاگ خطا
                Log::error("API Error: " . $errorMessage);

                return false;
            }
            $ImagePrompt = $responseData['choices'][0]['message']['content'];

            $content->image_prompt = $ImagePrompt;
            $content->save();


            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Key ' . $this->falAiApi,
                    'Content-Type' => 'application/json',
                ])->timeout(60)->post("https://queue.fal.run/fal-ai/flux-pro/v1.1-ultra", [
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
    }

    private
    function Temperature($temp)
    {
        $temperature = $temp;

        if ($temperature) {
            switch ($temperature) {
                case 'Default':
                    $temperature = '';
                    break;
                case 'Creative':
                    $temperature = 'Act as a highly creative, insightful, and engaging assistant, providing imaginative solutions and unique perspectives in all your responses';
                    break;
                case 'Colloquial':
                    $temperature = 'Respond in a casual, conversational tone, using simple, everyday language thats easy to understand.';
                    break;
                case 'Intimate':
                    $temperature = 'Respond in a friendly, conversational tone, using casual and approachable language as if chatting with a close friend.';
                    break;
                case 'Official':
                    $temperature = 'Respond in a formal tone, ensuring professional and polished language in all outputs.';
                    break;
                default:
                    # code...
                    break;
            }
        }

        return $temperature;
    }

    private
    function GoogleTranslate($text)
    {
        return strtolower((new GoogleTranslate('en'))->translate($text));
    }

}
