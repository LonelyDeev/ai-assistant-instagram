<?php

namespace App\Jobs;

use App\helper\helper;
use App\Models\Content;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Stichoza\GoogleTranslate\GoogleTranslate;

class GenerateImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 10;
    public $openAiApi;
    public $falAiApi;

    public function __construct()
    {
        // مقداردهی متغیرها
        $this->openAiApi = helper::appdata('')->aiApiKey;
        $this->falAiApi = helper::appdata('')->imageAiApiKey;
    }


    public function handle(): void
    {
        $contents = Content::where(['generate_image'=> 'yes','images_status'=>'waiting'])->get();
        foreach ($contents as $content) {
            $prompt = $this->GoogleTranslate($content->title);
            try {
                // درخواست به OpenAI برای ایجاد prompt تصویر
                $ImagePromptResponse = Http::withHeaders([
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

                $ImagePromptData = $ImagePromptResponse->json();

                // بررسی خطا در پاسخ OpenAI
                if (isset($ImagePromptData['error'])) {
                    $errorMessage = $ImagePromptData['error']['message'];
                    $errorCode = $ImagePromptData['error']['code'];

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
                    Log::error("OpenAI API Error: " . $errorMessage);

                    // ادامه ندهید و از تابع خارج شوید
                    return;
                }

                $ImagePrompt = $ImagePromptData['choices'][0]['message']['content'];

                // درخواست به Fal AI برای ایجاد تصویر
                $url = 'https://queue.fal.run/fal-ai/flux-pro/v1.1-ultra';

                $body = [
                    "prompt" => $ImagePrompt,
                    "num_images" => 1,
                    "enable_safety_checker" => true,
                    "safety_tolerance" => "2",
                    "output_format" => "jpeg",
                    "aspect_ratio" => "16:9",
                ];

                $response = Http::withHeaders([
                    'Authorization' => 'Key ' . $this->falAiApi,
                    'Content-Type' => 'application/json',
                ])->timeout(60)->post($url, $body);

                $responseData = $response->json();

                // بررسی خطا در پاسخ Fal AI
                if (isset($responseData['error'])) {
                    $errorMessage = $responseData['error']['message'];
                    $errorCode = $responseData['error']['code'];

                    // ذخیره خطا در جدول
                    $content->messages = $content->messages . ' ' . $errorMessage;
                    $content->images_status = "error";
                    $content->save();

                    // لاگ خطا
                    Log::error("Fal AI API Error: " . $errorMessage);

                    // ادامه ندهید و از تابع خارج شوید
                    return;
                }

                // اگر خطایی وجود نداشت، ادامه دهید
                if ($response->successful()) {
                    $content->image_prompt = $ImagePrompt;
                    $content->image_request_id = $responseData['request_id'];
                    $content->images_status = "generate";
                    $content->save();
                }

            } catch (\Exception $e) {
                // مدیریت سایر خطاها
                $content->messages = $content->messages . ' ' . $e->getMessage();
                $content->images_status = "error";
                $content->save();

                // لاگ خطا
                Log::error("Exception: " . $e->getMessage());
            }

        }
    }

    private function GoogleTranslate($text)
    {
        return strtolower((new GoogleTranslate('en'))->translate($text));
    }

}
