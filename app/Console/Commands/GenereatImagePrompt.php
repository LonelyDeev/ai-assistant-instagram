<?php

namespace App\Console\Commands;

use App\helper\helper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GenereatImagePrompt extends Command
{
    public $openAiApi;
    public $falAiApi;

    protected $signature = 'generate:imagePrompt';
    protected $description = 'Dispatch GenerateContent Job to the queue';


    public function __construct()
    {
        parent::__construct();
        $this->openAiApi = helper::appdata('')->aiApiKey;
        $this->falAiApi = helper::appdata('')->imageAiApiKey;
    }

    public function handle()
    {
        Artisan::call('queue:work --queue=generate_imagePrompt --stop-when-empty');
    }
}
