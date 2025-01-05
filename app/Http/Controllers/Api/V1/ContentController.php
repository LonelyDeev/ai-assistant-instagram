<?php

namespace App\Http\Controllers\Api\V1;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Content\ContentCollection;
use App\Http\Resources\Api\V1\Content\ContentResource;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        $contents=$request->user()->contents()->latest()->paginate(15);
        return $this->respondWithResourceCollection(new ContentCollection($contents));
    }

    public function show(Request $request, $id)
    {
        $content=$request->user()->contents()->where('id',$id)->first();
        if (isset($content) and $content->images_status=="generate" and $content->image_request_id=null) {
            helper::GetContentImage($content);
        }

        return $this->respondWithResource(new ContentResource($content));
    }
}
