<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;
use Illuminate\Support\Facades\Auth;
use App\helper\helper;
use App\Models\Settings;
use App\Models\Content;
use App\Models\User;
class OtherController extends Controller
{
    public function index()
    {
        return view('admin.contact.contact');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required',
        ], [
            'name.required' => trans('messages.name_required'),
            'email.required' => trans('messages.email_required'),
            'mobile.required' =>  trans('messages.mobile_required'),
            'message.required' =>  trans('messages.message_required'),
        ]);
        $contact = new Contacts();
        $contact->vendor_id = Auth::user()->id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }

    public function contacts()
    {
        $contacts = Contacts::orderBy('id', 'DESC')->get();
        return view('admin.contact.inquiry', compact('contacts'));
    }
    public function aboutus()
    {
        $getaboutus = helper::appdata(Auth::user()->id)->about_content;
        return view('admin.cmspages.aboutus', compact('getaboutus'));
    }
    public function update_aboutus(Request $request)
    {
        $request->validate([
            'aboutus' => 'required',
        ], [
            'aboutus.required' => trans('messages.content_required'),
        ]);
        $checkaboutus = Settings::where('vendor_id', Auth::user()->id)->first();
        if (!empty($checkaboutus)) {
            $checkaboutus->about_content = $request->aboutus;
            $checkaboutus->update();
        } else {
            $about = new Settings();
            $about->about_content = $request->aboutus;
            $about->save();
        }
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function privacypolicy(Request $request)
    {
        $getprivacypolicy = helper::appdata(Auth::user()->id)->privacy_content;
        return view('admin.cmspages.privacypolicy', compact('getprivacypolicy'));
    }
    public function update_privacypolicy(Request $request)
    {
        $request->validate([
            'privacypolicy' => 'required',
        ], [
            'privacypolicy.required' => trans('messages.content_required'),
        ]);
        $checkprivacy = Settings::where('vendor_id', Auth::user()->id)->first();
        if (!empty($checkprivacy)) {
            $checkprivacy->privacy_content = $request->privacypolicy;
            $checkprivacy->update();
        } else {
            $privacy = new Settings();
            $privacy->privacy_content = $request->privacypolicy;
            $privacy->save();
        }
        return redirect()->back()->with('success', trans('messages.success'));
    }

    public function termscondition()
    {
        $getterms = helper::appdata(Auth::user()->id)->terms_content;
        return view('admin.cmspages.termscondition', compact('getterms'));
    }
    public function update_terms(Request $request)
    {
        $request->validate([
            'termscondition' => 'required',
        ], [
            'termscondition.required' => trans('messages.content_required'),
        ]);
        $checkterms = Settings::where('vendor_id', Auth::user()->id)->first();
        if (!empty($checkterms)) {
            $checkterms->terms_content = $request->termscondition;
            $checkterms->update();
        } else {
            $terms = new Settings();
            $terms->terms_content = $request->termscondition;
            $terms->save();
        }
        return redirect()->back()->with('success', trans('messages.success'));
    }

    public function darkmode(Request $request)
    {
        session()->put('theme', $request->theme);
        return redirect()->back();
   
    }
    public function sharecontent(Request $request)
    {
        $getcontent = Content::with("tools_info")->where("id", $request->id)->first();
        if(empty($getcontent))
        {
            abort(404);
        }
        $getuser = User::where('id',$getcontent->vendor_id)->first();
        return view('front.share.index',compact('getcontent','getuser'));
    }
}
