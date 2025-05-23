<?php

namespace App\Console\Commands;

use App\helper\helper;
use App\Jobs\GenerateContent;
use App\Jobs\GenerateImagePrompt;
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
        $this->openAiApi = env('OPENAI_API_KEY');
        $this->falAiApi = env('IMAGE_AI_API_KEY');
    }

    public function handle()
    {
        //Log::info('GenerateContentCommand is started');
        $contents_image_prompt = Content::whereNotNull('title')->Where('generate_image', 'yes')->where('images_status','waiting')->get();

        foreach ($contents_image_prompt as $content_image_prompt) {
            GenerateImagePrompt::dispatch($content_image_prompt)->onQueue('generate_image_prompt');
        }
        Artisan::call('queue:work --queue=generate_image_prompt --stop-when-empty  --timeout=60');

        $contents_get_image = Content::where(['images_status' => 'generate', 'generate_image' => 'yes'])->WhereNotNull('image_request_id')->get();
        if (count($contents_get_image)){
            foreach ($contents_get_image as $content_image) {
                helper::GetContentImage($content_image);
            }
        }

        Artisan::call('queue:work --queue=generate_content --stop-when-empty  --timeout=60');

        /*$logFilePath = storage_path('logs/laravel.log');

        if (file_exists($logFilePath)) {
            unlink($logFilePath); // حذف فایل
            return 'Log file cleared successfully!';
        }*/
    }

}
