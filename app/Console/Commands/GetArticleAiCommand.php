<?php

namespace App\Console\Commands;

use App\Models\Content;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GetArticleAiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:article_ai';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $contents=Content::where(['tools_slug'=>'artical-generator-pro','status'=>'waiting'])->get();

        foreach ($contents as $content){

            $user=User::find($content->vendor_id);

            $response= Http::get(env('API_LINK').'/get-article', [
                'token_key'=>$user->token_key,
                'slug'=> $content->slug,
            ]);
            if ($response->body()!="{}" ){
                $data=json_decode($response->body());
                if ($data){
                    $content->content=$data->content;
                    $content->image=$data->image;
                    $content->images=$data->images;
                    $content->count=$data->count;
                    $content->meta_title=$data->meta_title;
                    $content->meta_description=$data->meta_description;
                    if ($data->status=="end"){
                        $content->status="end";
                    }
                    if ($data->status=="error"){
                        $content->status="error";
                        $content->messages=$data->messages;
                    }
                    $content->save();

                    $user->totalwordcount=$user->totalwordcount+$data->count;
                    $user->save();
                }

            }


        }

    }
}
