<?php

namespace App\Http\Controllers\Api\V1;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Http\Resources\CustomResource;
use App\Models\Chat;
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
        $totalgeneratedword = Content::where('vendor_id', $request->user()->id)->sum('tokenCount') ?? 0;
        $totalcontent = Content::where('vendor_id', $request->user()->id)->count();

        $totalgeneratedChat = Chat::where('user_id', $request->user()->id)->sum('count') ?? 0;
        $totalcontentChat = Chat::where('user_id', $request->user()->id)->count();

        $original = optional(@helper::checkPlan($request->user()->id))->original;

        $data = [
            'content' => [
                'totalgeneratedCount' => (int)$totalgeneratedword,
                'totalcontent' => (int)$totalcontent,
            ],
            'chat' => [
                'totalgeneratedCount' => (int)$totalgeneratedChat,
                'totalcontent' => (int)$totalcontentChat,
            ],
            'original' => $original,
            'totalCount' => $totalgeneratedword + $totalgeneratedChat,
            'totalContent' => $totalcontent + $totalcontentChat,
        ];

        return $this->respondWithResource(new CustomResource($data));

    }
}
