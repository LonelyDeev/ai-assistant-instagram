<?php

namespace App\Http\Controllers\Api\V1;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Jobs\GenerateContent;
use App\Models\Content;
use App\Models\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenerateContentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string|max:255',
            'tool_id' => 'required|exists:tools,id',
            'createImage' => 'required|in:1,0',
        ], [
            'slug.required' => 'فیلد نامک الزامی است',
            'prompt.required' => 'فیلد درخواست الزامی است',
            'createImage.required' => 'فیلد درخواست تصویر الزامی است',
        ]);

        $checkplan = helper::checkplan($request->user()->id);
        $v = json_decode(json_encode($checkplan));

        if (@$v->original->status == 2) {
            return $this->respondError($v->original->message);
        }
        $gettoolingo = Tools::where('id', $request->tool_id)->first();
        $plan = [];
        if (@helper::plandetail($request->user()->plan_id)) {
            $plan = explode(',', @helper::plandetail($request->user()->plan_id)->tools_limit);
        }

        if (!in_array($gettoolingo->id, $plan)) {
            return $this->respondError(trans('messages.InactiveTools'));
        }

        $tools = Tools::where('id', $request->tool_id)->first();
        if (!$tools) {
            return $this->respondError(trans('messages.InactiveTools'));
        }

        $content = new Content();
        $content->title = $request->prompt;
        $content->slug = helper::make_slug($request->prompt);
        $content->tools_id = $tools->id;
        $content->vendor_id = $request->user()->id;
        $content->tools_slug = $tools->slug;
        $content->temperature = $request->temperature ?: 'Default';
        $content->language = $request->language ?: 'persian';
        $content->count = 0;
        $content->generate_image = $request->createImage == 1 ? 'yes' : 'no';
        $content->save();

        GenerateContent::dispatch($content)->onQueue('generate_content');

        return $this->respondError(trans('messages.success-create-content'));
    }
}
