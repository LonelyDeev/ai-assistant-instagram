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

class GenerateImagePrompt implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 10;
    public $openAiApi;
    public $falAiApi;

    public function __construct()
    {
        $this->openAiApi = env('OPENAI_API_KEY');
        $this->falAiApi = env('IMAGE_AI_API_KEY');
    }


    public function handle(): void
    {
        $contents = Content::whereNotNull('title')->Where('generate_image', 'yes')->where('images_status','waiting')->get();
        foreach ($contents as $content) {
            $prompt = $this->GoogleTranslate($content->title);
            $ImagePrompt = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->openAiApi,
            ])->timeout(60)->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'GPT-3.5-turbo',
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

                return;
            }
            $ImagePrompt = $responseData['choices'][0]['message']['content'];

            $promptTokens = $responseData['usage']['prompt_tokens'];
            $completionTokens = $responseData['usage']['completion_tokens'];
            $totalTokens = $responseData['usage']['total_tokens'];

            $content->image_prompt = $ImagePrompt;
            $content->tokenCount += $totalTokens;
            $content->save();

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
                    $content->tokenCount += 2500;
                    $content->save();
                }

            } catch (\Exception $e) {
                $content->messages = $content->messages . ' ' . $e->getMessage();
                $content->images_status = "error";
                $content->save();
            }
        }
    }

    private function GoogleTranslate($text)
    {
        return strtolower((new GoogleTranslate('en'))->translate($text));
    }
}
