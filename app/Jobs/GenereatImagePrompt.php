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

class GenereatImagePrompt implements ShouldQueue
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
            $ImagePrompt = $ImagePrompt->json()['choices'][0]['message']['content'];


            $url = 'https://queue.fal.run/fal-ai/flux-pro/v1.1-ultra';

            $body = [
                "prompt" => $ImagePrompt,
                "num_images" => 1,
                "enable_safety_checker" => true,
                "safety_tolerance" => "2",
                "output_format" => "jpeg",
                "aspect_ratio" => "16:9",
            ];

            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Key ' . $this->falAiApi,
                    'Content-Type' => 'application/json',
                ])->timeout(120)->post($url, $body);


                if ($response->successful()) {
                    $content->image_prompt = $ImagePrompt;
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

    private function GoogleTranslate($text)
    {
        return strtolower((new GoogleTranslate('en'))->translate($text));
    }
}
