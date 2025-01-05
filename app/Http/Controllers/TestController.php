<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Key f2f2a457-148f-442f-9a53-fc96e4f3f649:80bd61ead1e974665da919df83e9042d',
                'Content-Type' => 'application/json',
            ])->timeout(60)->post("https://queue.fal.run/fal-ai/flux-pro/v1.1-ultra", [
                "prompt" => "cat in the car",
                "num_images" => 1,
                "enable_safety_checker" => true,
                "safety_tolerance" => "2",
                "output_format" => "jpeg",
                "aspect_ratio" => "16:9",
            ]);


            if ($response->successful()) {
                dd($response->json());
            }

        } catch (\Exception $e) {
            dd( $e->getMessage());
        }
    }
}
