<?php

namespace App\Console\Commands;

use App\helper\helper;
use App\Jobs\GenerateContent;
use App\Jobs\GetImageGenerated;
use App\Models\Content;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class GenerateContentCommand extends Command
{
    public $openAiApi;
    public $falAiApi;

    protected $signature = 'generate:content';
    protected $description = 'Dispatch GenerateContent Job to the queue';


    public function __construct()
    {
        parent::__construct();
        $this->openAiApi = helper::appdata('')->aiApiKey;
        $this->falAiApi = helper::appdata('')->imageAiApiKey;
    }

    public function handle()
    {
        Artisan::call('queue:work --queue=generate_content --stop-when-empty');

        $contents = Content::where(['images_status' => 'generate', 'generate_image' => 'yes'])->WhereNotNull('image_request_id')->get();

        foreach ($contents as $content) {
            $statusUrl = "https://queue.fal.run/fal-ai/flux-pro/requests/" . $content->image_request_id . "/status";
            $detailsUrl = "https://queue.fal.run/fal-ai/flux-pro/requests/" . $content->image_request_id;

            // مرحله 1: بررسی وضعیت
            $response = Http::withHeaders([
                'Authorization' => 'Key ' . $this->falAiApi,
                'Content-Type' => 'application/json',
            ])->get($statusUrl);
            if (isset($response->json()['detail'])) {

                $content->messages .= ' ' . $response->json()['detail'];
                $content->images_status="error";
                $content->save();
                continue;  // Move to next content if status request fails
            }

            $statusData = $response->json();

            if ($statusData['status'] === 'COMPLETED') {
                // مرحله 2: دریافت اطلاعات تصویر
                $imageResponse = Http::withHeaders([
                    'Authorization' => 'Key ' . $this->falAiApi,
                    'Content-Type' => 'application/json',
                ])->get($detailsUrl);

                if ($imageResponse->failed()) {
                    $content->messages .= ' ' . $imageResponse->json()['message'];
                    $content->save();
                    continue;  // Move to next content if image request fails
                }

                $imageData = $imageResponse->json();
                $imageUrl = $imageData['images'][0]['url'] ?? null;

                if ($imageUrl) {
                    // مرحله 3: ذخیره تصویر در پوشه‌های لاراول
                    $imageContent = Http::get($imageUrl);

                    if ($imageContent->failed()) {
                        $content->messages .= ' Failed to download image.';
                        $content->save();
                        continue;  // Move to next content if image download fails
                    }

                    // ساخت پوشه‌ها در صورت عدم وجود
                    $path = public_path('storage/images/' . $content->vendor_id . '/generated');
                    if (!File::exists($path)) {
                        File::makeDirectory($path, 0775, true);  // Create directory recursively
                    }

                    // ذخیره تصویر
                    $imagePath = 'images/generated/' . $content->vendor_id . '/' . basename($imageUrl);
                    Storage::disk('public')->put($imagePath, $imageContent->body());

                    // ذخیره رکورد گالری
                    $content->gallery()->create([
                        'image_link' => $imageUrl,
                        'image' => $imagePath,
                    ]);

                    $content->images_status = 'end';
                    $content->save();
                } else {
                    // اگر URL تصویر موجود نباشد
                    $content->messages .= ' No image URL found.';
                    $content->save();
                }
            }
        }

    }

}
