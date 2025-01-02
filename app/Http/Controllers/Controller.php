<?php

namespace App\Http\Controllers;

use App\helper\helper;
use App\Http\Traits\Helpers\ApiResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,ApiResponseTrait;

    public function index()
    {
        $falAiApi=helper::appdata('')->imageAiApiKey;
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Key ' . $falAiApi,
                'Content-Type' => 'application/json',
            ])->timeout(60)->post("https://queue.fal.run/fal-ai/flux-pro/v1.1-ultra", [
                "prompt" => "Create an image depicting a humanoid robot planting trees in a lush, verdant forest. The robot, sleek and metallic with a gleaming silver finish, gently places a young sapling into the earth. Morning sunlight filters through the canopy, casting dappled light. The viewpoint is at ground level, looking up slightly at the robot to emphasize its role in nurturing nature. Use a realistic style with vibrant shades of green and soft, golden sunlight illuminating the scene",
                "num_images" => 1,
                "enable_safety_checker" => true,
                "safety_tolerance" => "2",
                "output_format" => "jpeg",
                "aspect_ratio" => "16:9",
            ]);

dd($response->json());
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
