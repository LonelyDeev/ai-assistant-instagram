<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\helper\helper;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;
use OpenAI;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        session()->forget('theme');
        return view('admin.auth.login');
    }

    public function user_login()
    {
        session()->forget('theme');
        return view('admin.auth.userlogin');
    }

    public function checkLoginMobile(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
        ], [
            'mobile.required' =>  trans('messages.mobile_required'),
            'mobile.digits' =>  trans('messages.mobile_digits'),
            'mobile.regex' => trans('messages.mobile_regex'),
        ]);

        $user=User::where('mobile',$request->mobile)->first();
        if ($user) {

            $smsCode=rand(11111, 99999);
            $data=[
                'type'=>'verify-mobile',
                'mobile'=>$request->mobile,
                'code'=>$smsCode,
            ];
            helper::SendSms_ipPanel($data);

            $user->otp=$smsCode;
            $user->save();
            Session::put('UserMobileSession',$request->mobile);

            return redirect()->route('user.verifyCode');


        } else {

            $smsCode=rand(11111, 99999);
            $data=[
                'type'=>'verify-mobile',
                'mobile'=>$request->mobile,
                'code'=>$smsCode,
            ];
             helper::SendSms_ipPanel($data);

            $user=new User();
            $user->mobile=$request->mobile;
            $user->otp=$smsCode;
            $user->type=2;
            $user->is_available=1;
            $user->save();
            Session::put('UserMobileSession',$request->mobile);

            return redirect()->route('user.verifyCode');
        }
    }

    public function verifyCode(){
        if (session()->has('UserMobileSession')) {
            return view('admin.auth.verifyCode');
        }
        return redirect()->route('user.login');
    }

    public function checkVerifyCode(Request $request){
        if (session()->has('UserMobileSession')) {

            $request->validate([
                'verifyCode' => 'required|digits:5',
            ]);

            $user = User::where('mobile', session('UserMobileSession'))->first();

            if ($user && $user->otp == $request->verifyCode) {

                $user->is_verified = 1;
                $user->save();
                Auth::login($user);

                Session::forget('UserMobileSession');
                if ($user->type == 2) {
                    if ($user->is_available == 1) {
                        return redirect('/index');
                    } else {
                        Auth::logout();
                        return redirect()->back()->with('error', trans('messages.block'));
                    }
                } else {
                    return redirect()->back()->with('error', trans('messages.email_password_not_match'));
                }


            } else {
                return redirect()->back()->with('error', trans('messages.correct_otp'));
            }

        }
        return redirect()->route('user.login');
    }

    // google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function check_admin_login(Request $request)
    {

        try {

            if($request->type == "admin") {

                $request->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ], [
                    'email.required' => trans('messages.email_required'),
                    'email.email' =>  trans('messages.invalid_email'),
                    'password.required' => trans('messages.password_required'),
                ]);

                if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

                    if (!Auth::user()) {
                        return Redirect::to('/verify')->with('error', Session::get('from_message'));
                    }
                    if (Auth::user()->type == 1) {
                        return redirect('/admin/dashboard');
                    } else {
                        return redirect()->back()->with('error', trans('messages.email_password_not_match'));
                    }
                } else {
                    return redirect()->back()->with('error', trans('messages.email_password_not_match'));
                }
            }

            if($request->type == "user") {
                if ($request->logintype == "normal") {
                    $request->validate([
                        'email' => 'required|email',
                        'password' => 'required',
                    ], [
                        'email.required' => trans('messages.email_required'),
                        'email.email' =>  trans('messages.invalid_email'),
                        'password.required' => trans('messages.password_required'),
                    ]);

                    if (Auth::attempt($request->only('email', 'password'))) {
                        if (!Auth::user()) {
                            return Redirect::to('/verify')->with('error', Session::get('from_message'));
                        }
                        if (Auth::user()->type == 2) {
                            if (Auth::user()->is_available == 1) {
                                return redirect('/index');
                            } else {
                                Auth::logout();
                                return redirect()->back()->with('error', trans('messages.block'));
                            }
                        } else {
                            return redirect()->back()->with('error', trans('messages.email_password_not_match'));
                        }
                    } else {
                        return redirect()->back()->with('error', trans('messages.email_password_not_match'));
                    }
                }
            }

            if ($request->logintype == "google") {
                $googleuserdata = Socialite::driver('google')->user();
                $checkuser = User::where('email', '=', $googleuserdata->email)->where('login_type', '2')->where('google_id', $googleuserdata->id)->first();
                if (!empty($checkuser)) {
                    Auth::login($checkuser);
                    if (Auth::user()->is_available == 1) {
                        return redirect('/index');
                    } else {
                        Auth::logout();
                        return redirect('/admin')->with('error', trans('messages.block'));
                    }
                } else {
                    $user = new User();
                    $user->name = $googleuserdata->name;
                    $user->email = $googleuserdata->email;
                    $user->google_id = $googleuserdata->id;

                    $check_slug = User::where('slug', Str::slug($googleuserdata->name, '-'))->first();
                    if (!empty($check_slug)) {
                        $last_id = User::select('id')->orderByDesc('id')->first();
                        $slug = Str::slug($googleuserdata->name . ' ' . $last_id->id, '-');
                    } else {
                        $slug = Str::slug($googleuserdata->name, '-');
                    }
                    $user->slug = $slug;
                    $user->type = "2";
                    $user->is_verified = "1";
                    $user->is_available = "1";
                    $user->login_type = "2";
                    $user->image = "default.png";
                    $user->save();
                    session()->put('vendor_login', $user->name);
                    Auth::login($user);
                    return redirect('/index');
                }
            }
            if ($request->logintype == "facebook") {
                $facebookuserdata = Socialite::driver('facebook')->user();
                $checkuser = User::where('email', '=', $facebookuserdata->email)->where('login_type', '3')->where('facebook_id', $facebookuserdata->id)->first();
                if (!empty($checkuser)) {
                    Auth::login($checkuser);
                    if (Auth::user()->is_available == 1) {
                        return redirect('/index');
                    } else {
                        Auth::logout();
                        return redirect('/admin')->with('error', trans('messages.block'));
                    }
                } else {
                    $user = new User();
                    $user->name = $facebookuserdata->name;
                    $user->email = $facebookuserdata->email;
                    $user->google_id = $facebookuserdata->id;

                    $check_slug = User::where('slug', Str::slug($facebookuserdata->name, '-'))->first();
                    if (!empty($check_slug)) {
                        $last_id = User::select('id')->orderByDesc('id')->first();
                        $slug = Str::slug($facebookuserdata->name . ' ' . $last_id->id, '-');
                    } else {
                        $slug = Str::slug($facebookuserdata->name, '-');
                    }
                    $user->slug = $slug;
                    $user->type = "2";
                    $user->is_verified = "1";
                    $user->is_available = "1";
                    $user->login_type = "3";
                    $user->image = "default.png";
                    $user->save();
                    session()->put('vendor_login', $user->name);
                    Auth::login($user);
                    return redirect('/index');
                }
            }

        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function register()
    {
        return view('admin.auth.register');
    }

    public function vendor_register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'apiKey' => 'required',
            'mobile' => 'required|unique:users,mobile',
        ], [
            'name.required' => trans('messages.name_required'),
            'email.required' => trans('messages.email_required'),
            'email.email' =>  trans('messages.invalid_email'),
            'email.unique' => trans('messages.unique_email'),
            'password.required' => trans('messages.password_required'),
            'mobile.required' => trans('messages.mobile_required'),
            'mobile.unique' => trans('messages.unique_mobile'),
            'apiKey.required' => trans('messages.api_key_required'),
        ]);
        try {
            $client = OpenAi::client($request->apiKey);
            $client->completions()->create( [
                "model" => 'gpt-3.5-turbo-instruct',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->apiKey = $request->apiKey;
            $user->token_key = md5(rand(1, 10) . microtime());
            $user->password = hash::make($request->password);

            $check_slug = User::where('slug', Str::slug($request->name, '-'))->first();
            if (!empty($check_slug)) {
                $last_id = User::select('id')->orderByDesc('id')->first();
                $slug = Str::slug($request->name . ' ' . $last_id->id, '-');
            } else {
                $slug = Str::slug($request->name, '-');
            }
            $user->slug = $slug;
            $user->type = "2";
            $user->is_verified = "1";
            $user->is_available = "1";
            $user->image = "default.png";
            $user->save();
            session()->put('vendor_login', $user->name);
            Auth::login($user);
            return redirect('/index');

        }catch (\Throwable $ex){
            if ($ex->getMessage()=="Incorrect API key provided: ".$request->apiKey.". You can find your API key at https://platform.openai.com/account/api-keys."){
                return back()->withErrors(["apiKey" =>trans('messages.invalid_api')])->withInput();
            }
            elseif ($ex->getMessage()=="You exceeded your current quota, please check your plan and billing details."){
                return back()->withErrors(["apiKey" =>trans('messages.invalid_api_maximum')])->withInput();
            }else{
                return back()->withErrors(["apiKey" =>$ex->getMessage()])->withInput();
            }
        }


    }
    public function forgot_password()
    {
        return view('admin.auth.forgotpassword');
    }
    public function send_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => trans('messages.email_required'),
            'email.email' =>  trans('messages.invalid_email'),
        ]);

        $checkuser = User::where('email', $request->email)->where('is_available', 1)->first();
        if (!empty($checkuser)) {

            $password = substr(str_shuffle($checkuser->password), 1, 6);
            $check_send_mail = helper::send_mail_forpassword($request->email, $password, helper::appdata('')->logo);
            if ($check_send_mail == 1) {
                $checkuser->password = Hash::make($password);
                $checkuser->save();
                return redirect('/')->with('success', trans('messages.success'));
            } else {
                return redirect('/forgotpassword')->with('error', trans('messages.wrong'));
            }
        } else {
            return redirect()->back()->with('error', trans('messages.invalid_user'));
        }
    }

    public function systemverification(Request $request)
    {

        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', 'https://paponapps.co.in/api/getdata.php', [
            'form_params' => [
                'envato_username'=>$request->username,
                'email'=> $request->email,
                'purchase_key'=> $request->purchase_key,
                'domain'=> $request->domain,
                'purchase_type'=> 'Envato',
                'version'=> '1',
            ]
        ]);


        $obj = json_decode($res->getBody());
        if ($obj->status == '1') {
            return Redirect::to('/admin')->with('success', 'You have successfully verified your License. Please try to Login now');
        } else {
            return Redirect::back()->with('error', $obj->message);
        }
    }
}
