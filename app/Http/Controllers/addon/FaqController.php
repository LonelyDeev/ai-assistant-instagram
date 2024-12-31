<?php

namespace App\Http\Controllers\addon;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $faqs = Faq::orderByDesc('id')->get();
        return view('admin.faq.index',compact('faqs'));
    }
    public function add(Request $request)
    {
        return view('admin.faq.add');
    }
    public function save(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ], [
            'question.required' => trans('messages.question_required'),
            'answer.required' => trans('messages.answer_required'),

        ]);
        $faqs = new Faq();
        $faqs->question = $request->question;
        $faqs->answer = $request->answer;
        $faqs->save();
        return redirect('/admin/faqs')->with('success', trans('messages.success'));
    }
    public function edit(Request $request)
    {
        $getfaq = Faq::where('id', $request->id)->first();
        return view('admin.faq.edit', compact('getfaq'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ], [
            'question.required' => trans('messages.question_required'),
            'answer.required' => trans('messages.answer_required'),

        ]);
        $getfaq = Faq::where('id', $request->id)->first();
        $getfaq->question = $request->question;
        $getfaq->answer = $request->answer;
        $getfaq->update();
        return redirect('/admin/faqs')->with('success', trans('messages.success'));
    }
    public function delete(Request $request)
    {
        $deletefaq = Faq::where('id',$request->id)->first();
        $deletefaq->delete();
        return redirect('/admin/faqs')->with('success', trans('messages.success'));
       
    }
    public function faqs_list(Request $request)
    {
        $getfaq = Faq::OrderByDesc('id')->get();
        return view('front.faq.index',compact('getfaq'));
       
    }
}
