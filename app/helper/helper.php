<?php

namespace App\helper;

use App\Models\Booking;
use App\Models\PricingPlan;
use App\Models\Settings;
use App\Models\User;
use App\Models\Content;
use App\Models\Transaction;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use OpenAI;

use Stripe;

class helper
{
    // admin
    public static function make_slug($string)
    {
        return preg_replace('/\s+/u', '-', trim($string));
    }

    public static function appdata($vendor_id)
    {
        $data = Settings::first();
        return $data;
    }

    public static function currency_formate($price, $vendor_id)
    {
        $price = floatval($price);
        if (@helper::appdata($vendor_id)->currency_position == "1") {
            return @helper::appdata($vendor_id)->currency . ' ' . number_format($price);
        }
        if (@helper::appdata($vendor_id)->currency_position == "2") {
            return number_format($price) . ' ' . @helper::appdata($vendor_id)->currency;
        }
        return $price;
    }

    public static function send_mail_forpassword($email, $password, $logo)
    {
        $data = ['title' => trans('lables.email_verification'), 'email' => $email, 'name' => $email, 'password' => $password, 'logo' => helper::image_path($logo)];
        try {
            Mail::send('email.sendpassword', $data, function ($message) use ($data) {
                $message->from(env('MAIL_USERNAME'))->subject($data['title']);
                $message->to($data['email']);
            });
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public static function date_formate($date)
    {
        return date("d M, Y", strtotime($date));
    }

    public static function image_path($image)
    {
        $url = url(env('ASSETPATHURL') . 'admin-assets/images/about/no-data.svg');
        if (Str::contains($image, 'profile')) {
            $url = url(env('ASSETPATHURL') . 'admin-assets/images/profile/' . $image);
        }
        if (Str::contains($image, 'category')) {
            $url = url(env('ASSETPATHURL') . 'admin-assets/images/categories/' . $image);
        }
        if (Str::contains($image, 'service')) {
            $url = url(env('ASSETPATHURL') . 'admin-assets/images/service/' . $image);
        }
        if (Str::contains($image, 'theme-')) {
            $url = url(env('ASSETPATHURL') . 'admin-assets/images/theme/' . $image);
        }
        if (Str::contains($image, 'payment') || Str::contains($image, 'cod') || Str::contains($image, 'stripe') || Str::contains($image, 'paystack') || Str::contains($image, 'razorpay') || Str::contains($image, 'wallet') || Str::contains($image, 'flutterwave') || Str::contains($image, 'bank') || Str::contains($image, 'mercado') || Str::contains($image, 'zarinpal')) {
            $url = url(env('ASSETPATHURL') . 'admin-assets/images/about/payment/' . $image);
        }
        if (Str::contains($image, 'screenshot')) {
            $url = url('storage/app/public/admin-assets/images/screenshot/' . $image);
        }
        if (Str::contains($image, 'profile')) {
            $url = url('storage/app/public/admin-assets/images/profile/' . $image);
        }
        if (Str::contains($image, 'logo')) {
            $url = url(env('ASSETPATHURL') . 'admin-assets/images/about/logo/' . $image);
        }
        if (Str::contains($image, 'favicon-')) {
            $url = url(env('ASSETPATHURL') . 'admin-assets/images/about/favicon/' . $image);
        }
        if (Str::contains($image, 'og_image')) {
            $url = url(env('ASSETPATHURL') . 'admin-assets/images/about/og_image/' . $image);
        }
        if (Str::contains($image, 'banner')) {
            $url = url(env('ASSETPATHURL') . 'admin-assets/images/banner/' . $image);
        }
        if (Str::contains($image, 'blog')) {
            $url = url(env('ASSETPATHURL') . 'admin-assets/images/blog/' . $image);
        }
        if (Str::contains($image, 'login') || Str::contains($image, 'default') || Str::contains($image, 'home')) {
            $url = url(env('ASSETPATHURL') . 'admin-assets/images/about/' . $image);
        }
        if (Str::contains($image, ['1.svg', '2.svg', '3.svg', '4.svg', '5.svg', '6.svg', '7.svg', '8.svg', '9.svg', '10.svg', '11.svg', '12.svg', '13.svg', '14.svg', '15.svg', '16.svg'])) {
            $url = url(env('ASSETPATHURL') . 'admin-assets/images/tools_icons/' . $image);
        }
        return $url;
    }

    public static function plandetail($plan_id)
    {
        $planinfo = PricingPlan::where('id', $plan_id)->first();
        return $planinfo;
    }

    public static function getlimit($id)
    {
        $limit = Transaction::where(['vendor_id' => $id, 'status' => 2])->orderbyDesc('id')->first();
        return $limit;
    }

    public static function checkplan($id)
    {
        date_default_timezone_set(helper::appdata('')->timezone);
        $vendordata = User::where('id', $id)->first();
        $checkplan = Transaction::where('vendor_id', $vendordata->id)->orderByDesc('id')->first();

        $totalwordcount = Content::select('count')->where('vendor_id', $vendordata->id)->sum('count');

        if ($vendordata->is_available == 2) {
            return response()->json(['status' => 2, 'message' => trans('messages.account_blocked_by_admin'), 'showclick' => "0", 'plan_message' => '', 'plan_date' => '', 'checklimit' => ''], 200);
        }

        if (!$checkplan) {
            return response()->json(['status' => 2, 'message' => 'هنوز هیچ پلنی خریداری نکرده اید', 'showclick' => "0", 'plan_message' => '', 'plan_date' => '', 'checklimit' => ''], 200);
        }

        // for banktransfer
        if ($checkplan->payment_type == 'banktransfer') {
            if ($checkplan->status == 1) {
                return response()->json(['status' => 2, 'message' => trans('messages.bank_request_pending'), 'showclick' => "0", 'plan_message' => trans('messages.bank_request_pending'), 'plan_date' => '', 'checklimit' => ''], 200);
            } elseif ($checkplan->status == 3) {
                return response()->json(['status' => 2, 'message' => trans('messages.bank_request_rejected'), 'showclick' => "1", 'plan_message' => trans('messages.bank_request_rejected'), 'plan_date' => '', 'checklimit' => ''], 200);
            }
        }

        // for plan expired
        if ($checkplan->expire_date != "") {
            if (date('Y-m-d') > $checkplan->expire_date) {
                return response()->json(['status' => 2, 'message' => trans('messages.plan_expired'), 'expdate' => $checkplan->expire_date, 'showclick' => "1", 'plan_message' => trans('messages.plan_expired'), 'plan_date' => $checkplan->expire_date, 'checklimit' => ''], 200);
            }
        }

        // word limit
        $wordcount = self::wordcount($id);
        if ($wordcount <= 0) {
            return response()->json(['status' => 2, 'message' => trans('messages.vendor_word_limit_message'), 'expdate' => $checkplan->expire_date, 'showclick' => "1", 'plan_message' => trans('messages.plan_expires'), 'plan_date' => $checkplan->expire_date, 'checklimit' => ''], 200);
        }

        // plan expires or lifetime
        if ($checkplan->expire_date != "") {
            return response()->json(['status' => 1, 'message' => trans('messages.plan_expires'), 'expdate' => $checkplan->expire_date, 'showclick' => "0", 'plan_message' => trans('messages.plan_expires'), 'plan_date' => $checkplan->expire_date, 'checklimit' => ''], 200);
        } else {
            return response()->json(['status' => 1, 'message' => trans('messages.lifetime_subscription'), 'expdate' => $checkplan->expire_date, 'showclick' => "0", 'plan_message' => trans('messages.lifetime_subscription'), 'plan_date' => $checkplan->expire_date, 'checklimit' => ''], 200);
        }

    }

    public static function get_plan_exp_date($duration, $days)
    {

        date_default_timezone_set(helper::appdata('')->timezone);
        $purchasedate = date("Y-m-d h:i:sa");
        $exdate = "";
        if (!empty($duration) && $duration != "") {
            if ($duration == "1") {
                $exdate = date('Y-m-d', strtotime($purchasedate . ' + 30 days'));
            }
            if ($duration == "2") {
                $exdate = date('Y-m-d', strtotime($purchasedate . ' + 90 days'));
            }
            if ($duration == "3") {
                $exdate = date('Y-m-d', strtotime($purchasedate . ' + 180 days'));
            }
            if ($duration == "4") {
                $exdate = date('Y-m-d', strtotime($purchasedate . ' + 365 days'));
            }
            if ($duration == "4") {
                $exdate = "";
            }
        }
        if (!empty($days) && $days != "") {
            $exdate = date('Y-m-d', strtotime($purchasedate . ' + ' . $days . 'days'));
        }
        return $exdate;
    }

    public static function wordcount($id)
    {
        $checkplan = Transaction::where('vendor_id', $id)->orderByDesc('id')->first();

        if (!empty($checkplan)) {
            //$wordlimit = $checkplan->word_limit;
            $wordlimit = User::find($id)->word_limit;

            $totalwordcount = Content::select('count')->where('vendor_id', $id)->sum('count');

            $count = $wordlimit - $totalwordcount;
            if ($count < 0) {
                $count = 0;
            }
            return $count;
        }
    }

    public static function multi_language()
    {
        $languages = array("persian", "English (US)", "English (UK)", "French", "Spanish", "German", "Italian", "Dutch", "Portuguese", "Portuguese (BR)", "Swedish", "Norwegian", "Danish", "Romanian", "Czech", "Slovak", "Slovenian", "Hungarian", "Croatian", "Polish", "Greek", "Turkish", "Russian", "Hindi", "Thai", "Japanese", "Chinese (Simplified)", "Korean");
        return $languages;
    }

    public static function callApi($client, $params, $maxRetries = 5)
    {
        $success = false;
        $response = null;
        $retries = 0;
        do {
            try {
                $response = $client->chat()->create($params);
                $success = true;
            } catch (OpenAI\Exceptions\ErrorException $e) {
                $retries++;
                if ($e->getErrorCode() == "insufficient_quota") {
                    return response([
                        'message' => 'api_error_maximum'
                    ]);
                }
                return response([
                    'message' => 'api_error'
                ]);

            }
        } while (!$success);
        return $response;
    }

    public static function Verta()
    {
        return Verta();
    }

    public static function SendSms_ipPanel($data)
    {

        $user = helper::appdata('')->SMS_PANEL_USERNAME;
        $pass = helper::appdata('')->SMS_PANEL_PASSWORD;
        $fromNum = helper::appdata('')->SMS_PANEL_FROM;

        $toNum = array($data['mobile']);
        if ($data['type'] == "verify-mobile") {
            $pattern_code = helper::appdata('')->ippanel_send_code_pattern;
            $input_data = array(
                'verification-code' => $data['code'],
            );
        }
        $url = 'https://ippanel.com/patterns/pattern?username=' . $user . '&password=' . urlencode($pass) . '&from=' . $fromNum . '&to=' . json_encode($toNum) . '&input_data=' . urlencode(json_encode($input_data)) . '&pattern_code=' . $pattern_code;
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);


    }


    public static function Temperature($temp)
    {
        $temperature = $temp;

        if ($temperature) {
            switch ($temperature) {
                case 'Default':
                    $temperature = 'پیشفرض';
                    break;
                case 'Creative':
                    $temperature = 'خلاق';
                    break;
                case 'Colloquial':
                    $temperature = 'عامیانه';
                    break;
                case 'Intimate':
                    $temperature = 'صمیمانه';
                    break;
                case 'Official':
                    $temperature = 'رسمی';
                    break;
                default:
                    # code...
                    break;
            }
        }

        return $temperature;
    }

    public static function GetContentImage($content)
    {
        $falAiApi = helper::appdata('')->imageAiApiKey;


        //flux-pro
        //$baseUrl = "https://queue.fal.run/fal-ai/flux-pro/requests/";

        //fast-sdxl
        $baseUrl = "https://queue.fal.run/fal-ai/fast-sdxl/requests/";

        //fast-turbo-diffusion
        //$baseUrl = "https://queue.fal.run/fal-ai/fast-turbo-diffusion/requests/";


        $statusUrl = $baseUrl . $content->image_request_id . "/status";
        $detailsUrl = $baseUrl . $content->image_request_id;

        // مرحله 1: بررسی وضعیت
        $response = Http::withHeaders([
            'Authorization' => 'Key ' . $falAiApi,
            'Content-Type' => 'application/json',
        ])->get($statusUrl);

        if (isset($response->json()['detail'])) {
            $content->messages .= ' ' . $response->json()['detail'];
            $content->images_status = "error";
            $content->save();
        }

        $statusData = $response->json();
        if (isset($statusData['status']) && $statusData['status'] === 'COMPLETED') {
            // مرحله 2: دریافت اطلاعات تصویر
            $imageResponse = Http::withHeaders([
                'Authorization' => 'Key ' . $falAiApi,
                'Content-Type' => 'application/json',
            ])->get($detailsUrl);


            if ($imageResponse->failed()) {
                $errorData = $imageResponse->json();
                $errorMessage = $errorData['message'] ?? json_encode($errorData); // اگر کلید message وجود نداشت، کل آرایه را به JSON تبدیل کنید
                $content->messages .= ' ' . $errorMessage;
                $content->images_status = 'error';
                $content->save();
            }

            $imageData = $imageResponse->json();
            $imageUrl = $imageData['images'][0]['url'] ?? null;

            if ($imageUrl) {
                // مرحله 3: ذخیره تصویر در پوشه‌های لاراول
                $imageContent = Http::get($imageUrl);

                if ($imageContent->failed()) {
                    $content->messages .= ' Failed to download image.';
                    $content->save();
                }

                $path = public_path('images/' . $content->vendor_id . '/generated');
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0775, true);  // Create directory recursively
                }

                $imageName = basename($imageUrl);
                $imagePath = 'images/' . $content->vendor_id . '/generated/' . $imageName;
                file_put_contents(public_path($imagePath), $imageContent->body());

                $content->gallery()->create([
                    'image_link' => $imageUrl,
                    'image' => $imagePath,
                ]);
                $content->count += 200;
                $content->images_status = 'end';
                $content->save();
            } else {
                // اگر URL تصویر موجود نباشد
                $content->messages .= ' No image URL found.';
                $content->save();
            }
        }

    }

    public static function Duration($duration)
    {

        if ($duration) {
            switch ($duration) {
                case '1':
                    $duration = '1 ماهه';
                    break;
                case '2':
                    $duration = '3 ماهه';
                    break;
                case '3':
                    $duration = '6 ماهه';
                    break;
                case '4':
                    $duration = '1 ساله';
                    break;
                case '5':
                    $duration = 'بدون انقضا';
                    break;
                default:
                    $duration = 'Invalid duration';
                    break;
            }
        }

        return $duration;
    }


}
