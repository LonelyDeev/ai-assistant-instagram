<?php

namespace App\Http\Controllers\Api\V1;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Http\Resources\CustomResource;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return $this->respondWithResource(new UserResource($request->user()));
    }

    public function checkPlan(Request $request)
    {
        $totalgeneratedword = Content::select('count')->where('vendor_id', $request->user()->id)->sum('count');
        $totalcontent = Content::where('vendor_id', $request->user()->id)->get()->count();
        $original=@helper::checkPlan($request->user()->id)->original;
        $data = [
            'totalgeneratedword' => $totalgeneratedword,
            'totalcontent' => $totalcontent,
            'original' => $original,
        ];

        return $this->respondWithResource(new CustomResource($data));

    }
}
