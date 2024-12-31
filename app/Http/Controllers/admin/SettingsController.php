<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settingdata = Settings::where('vendor_id', Auth::user()->id)->first();
        return view('admin.settings.settings', compact('settingdata'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'currency' => 'required',
            'timezone' => 'required',
            'web_title' => 'required_if:Auth::user()->type(),2',
            'copyright' => 'required',
            'footer_description' => 'required_if:Auth::user()->type(),2',
            'address' => 'required_if:Auth::user()->type(),2',
            'slug' => 'required_if:Auth::user()->type(),2|unique:users,slug,' . Auth::user()->id,
            'interval_time' => 'required_if:Auth::user()->type,2',
        ], [
            "currency.required" => trans('messages.currency_required'),
            "timezone.required" => trans('messages.timezone_required'),
            "web_title.required_if" => trans('messages.web_title_required'),
            "copyright.required" => trans('messages.copyright_required'),
            "footer_description.required_if" => trans('messages.footer_description_required'),
            "address.required_if" => trans('messages.address_required'),
            'slug.required_if' => trans('messages.slug_required'),
            'slug.unique' => trans('messages.unique_slug'),
            'interval_time.required' => trans('message.interval_time_required'),
        ]);
        $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        $userslug = User::where('id', Auth::user()->id)->first();
        if ($request->hasfile('logo')) {
            $request->validate([
                'logo' => 'image',
            ], [
                "logo.image" => trans('messages.enter_image_file'),
            ]);
            if ($settingsdata->logo != "defaultlogo.png" && file_exists(storage_path('app/public/admin-assets/images/about/logo/' . $settingsdata->logo))) {
                @unlink(storage_path('app/public/admin-assets/images/about/logo/' . $settingsdata->logo));
            }
            $logo_name = 'logo-' . uniqid() . '.' . $request->logo->getClientOriginalExtension();
            $request->file('logo')->move(storage_path('app/public/admin-assets/images/about/logo/'), $logo_name);
            $settingsdata->logo = $logo_name;
        }
        if ($request->hasfile('favicon')) {
            $request->validate([
                'favicon' => 'image',
            ], [
                "favicon.image" => trans('messages.enter_image_file'),
            ]);
            if ($settingsdata->favicon != "defaultfavicon.png" && file_exists(storage_path('app/public/admin-assets/images/about/favicon/' . $settingsdata->favicon))) {
                @unlink(storage_path('app/public/admin-assets/images/about/favicon/' . $settingsdata->favicon));
            }
            $favicon_name = 'favicon-' . uniqid() . '.' . $request->favicon->getClientOriginalExtension();
            $request->favicon->move(storage_path('app/public/admin-assets/images/about/favicon/'), $favicon_name);
            $settingsdata->favicon = $favicon_name;
        }
        $settingsdata->footer_description = "";
        $settingsdata->address = $request->address;
        $settingsdata->currency = $request->currency;
        $settingsdata->currency_position = $request->currency_position;
        $settingsdata->web_layout = $request->web_layout;

        $settingsdata->timezone = $request->timezone;
        $settingsdata->web_title = $request->web_title;
        $settingsdata->copyright = $request->copyright;
        $settingsdata->maintenance_mode = isset($request->maintenance_mode) ? 1 : 2;
        $settingsdata->save();
        if(Auth::user()->type == 2)
        {
            $userslug->slug = $request->slug;
        }
        $userslug->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function save_seo(Request $request)
    {
        $request->validate([
            'meta_title' => 'required',
            'meta_description' => 'required',
        ], [
            "meta_title.required" => trans('messages.meta_title_required'),
            "meta_description.required" => trans('messages.meta_description_required'),
        ]);
        $settingsdata = Settings::where('vendor_id', Auth::user()->id)->first();
        $settingsdata->meta_title = $request->meta_title;
        $settingsdata->meta_description = $request->meta_description;
        if ($request->hasfile('og_image')) {
            $image = 'og_image-' . uniqid() . '.' . $request->og_image->getClientOriginalExtension();
            $request->og_image->move(storage_path('app/public/admin-assets/images/about/og_image/'), $image);
            $settingsdata->og_image = $image;
        }
        $settingsdata->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }
    public function trackinginfo(Request $request)
    {
        $request->validate([
            'tracking_id' => 'required',
            'view_id' => 'required',
        ], [
            'tracking_id.required' => trans('messages.tracking_id_required'),
            'view_id.required' => trans('messages.view_id_required'),
        ]);
        $settingsdata = Settings::where('id', Auth::user()->id)->first();
        $settingsdata->tracking_id = $request->tracking_id;
        $settingsdata->view_id = $request->view_id;
        $settingsdata->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }

    public function set_api_ai(Request $request)
    {
        $request->validate([
            'aiApiKey' => 'required',
            'imageAiApiKey' => 'required',
        ]);
        $settingsdata = Settings::where('id', Auth::user()->id)->first();
        $settingsdata->aiApiKey = $request->aiApiKey;
        $settingsdata->imageAiApiKey = $request->imageAiApiKey;
        $settingsdata->save();
        return redirect()->back()->with('success', trans('messages.success'));
    }

    public function sms_setting_panel(Request $request)
    {
        $request->validate([
            'SMS_PANEL_USERNAME' => 'required',
            'SMS_PANEL_PASSWORD' => 'required',
            'SMS_PANEL_FROM' => 'required',
            'ippanel_send_code_pattern' => 'required',
        ]);
        $settingsdata = Settings::where('id', Auth::user()->id)->first();
        $settingsdata->SMS_PANEL_USERNAME = $request->SMS_PANEL_USERNAME;
        $settingsdata->SMS_PANEL_PASSWORD = $request->SMS_PANEL_PASSWORD;
        $settingsdata->SMS_PANEL_FROM = $request->SMS_PANEL_FROM;
        $settingsdata->ippanel_send_code_pattern = $request->ippanel_send_code_pattern;
        $settingsdata->save();

        return redirect()->back()->with('success', trans('messages.success'));
    }
}
