<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HolooAiController extends Controller
{

    public function index(Request $request)
    {
        // اعتبارسنجی درخواست
        $request->validate([
            'user_query' => 'required|string|max:500',
        ], [
            'user_query.required' => 'فیلد سوال الزامی است',
        ]);

        $response = null;
        $response = $this->generateText($request);



        if ($response) {
            return $response;
        } else {
            return response()->json(['message' => 'خطا در پردازش درخواست'], 500);
        }
    }

    private function generateText(Request $request)
    {
        $opAiKey = env('OPENAI_API_KEY');
        $assistant_id = "asst_csUG8UBzBusQ9fCp49BENpxv";

        $chatPots=Chat::where(['user_id'=>auth()->id(),'assistant_id'=>$assistant_id])->first();

        if (isset($chatPots) and $chatPots->thread_id) {
            $thread_id=$chatPots->thread_id;
        }else{
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $opAiKey,
                'OpenAI-Beta' => 'assistants=v2',
            ])->post('https://api.openai.com/v1/threads', []);

            if ($response->failed()) {
                return response()->json(['error' => 'خطا در ایجاد thread', 'details' => $response->body()], 500);
            }

            $thread_id = $response->json()['id'];
            User::where('id', auth()->user()->id)->update(['thread_id' => $thread_id]);

        }

        // ارسال درخواست به OpenAI
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $user_query = $request->input('user_query');
        //$user_query=$this->GoogleTranslate($request->user_query);

        $response = Http::withHeaders($headers)->withBody(json_encode([
            'user_query' => $user_query,
            'thread_id' => $thread_id,
            'assistant_id' => $assistant_id,
            'openai_apikey' => $opAiKey,
        ]), 'application/json')->post('https://openai.webcomapipy.ir/chat');

        if ($response->failed()) {
            return response()->json(['error' => 'خطا در پردازش درخواست', 'details' => $response->body()], 500);
        }

        $postContent = $response->json()['response'];
        $postContent = preg_replace('/[\x{1F600}-\x{1F64F}]/u', '', $postContent);
        $postContent = preg_replace('/[^\p{L}\p{N}\s]/u', '', $postContent);
        $wordCount = preg_match_all('/\p{L}+/u', $postContent);

        $newChat = new Chat();
        $newChat->user_id = auth()->id();
        $newChat->type = $request->input('type');
        $newChat->category = $request->input('category');
        $newChat->user_query = $request->input('user_query');
        $newChat->assistant_id = $assistant_id;
        $newChat->thread_id = $thread_id;
        $newChat->response = $response->json()['response'];
        $newChat->count = $wordCount;
        $newChat->save();


        return response()->json(['response' => $response->json()['response']]);
    }
}
