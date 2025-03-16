<?php

namespace App\Http\Controllers\Api\V1;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Http\Resources\CustomResource;
use App\Models\Chat;
use App\Models\Content;
use App\Models\Transaction;
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

        $word_limit = Transaction::where('vendor_id', auth()->id())->sum('word_limit');

        $totalCount=(int)$totalgeneratedword + (int)$totalgeneratedChat;
        $totalContent=(int)$totalcontent + (int)$totalcontentChat;
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
            'totalCount' => $totalCount,
            'totalContent' => $totalContent,

            'limit'=> (int)$word_limit,
            'remaining'=> $word_limit - $totalCount,
        ];

        return $this->respondWithResource(new CustomResource($data));

    }
}
