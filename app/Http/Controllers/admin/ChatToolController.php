<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tools;
use Illuminate\Http\Request;

class ChatToolController extends Controller
{
    public function index ()
    {
        $tools=Tools::where('type','chat')->get();
        return view('admin.ChatTool.index',compact('tools'));
    }

    public function create()
    {
        return view('admin.ChatTool.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'assistant_id' => 'required|max:255',
            'slug' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:tools,slug',
            'description' => 'nullable|max:1000',
            'active' => 'required|in:0,1',
        ], [
            'name.required' =>  'نام الزامی است',
            'assistant_id.required' =>  'assistant id الزامی است',
            'slug.required' =>  'slug الزامی است',
            'slug.regex' =>  'فقط کلمات انگلیسی برای slug وارد کنید',
        ]);

        $tool=new Tools();
        $tool->name=$request->name;
        $tool->slug=$request->slug;
        $tool->assistant_id=$request->assistant_id;
        $tool->description=$request->description;
        $tool->active=$request->active;
        $tool->type='chat';
        $tool->save();
        return redirect()->route('admin.chatTool.create')->with('success',  'با موفقیت ایجاد شد');
    }
    public function edit(Request $request,$id)
    {
        $tool=Tools::Findorfail($id);
        return view('admin.ChatTool.edit',compact('tool'));
    }

    public function update(Request $request,$id)
    {
        $tool=Tools::Findorfail($id);
        $request->validate([
            'name' => 'required|max:255',
            'assistant_id' => 'required|max:255',
            'slug' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:tools,slug,'.$tool->id,
            'description' => 'nullable|max:1000',
            'active' => 'required|in:0,1',
        ], [
            'name.required' =>  'نام الزامی است',
            'assistant_id.required' =>  'assistant id الزامی است',
            'slug.required' =>  'slug الزامی است',
            'slug.regex' =>  'فقط کلمات انگلیسی برای slug وارد کنید',
        ]);


        $tool->name=$request->name;
        $tool->slug=$request->slug;
        $tool->assistant_id=$request->assistant_id;
        $tool->description=$request->description;
        $tool->active=$request->active;
        $tool->type='chat';
        $tool->save();
        return redirect()->route('admin.chatTool.index')->with('success',  'با موفقیت ویرایش شد');
    }
}
