<?php

namespace App\Http\Controllers\Api\V1;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\PlanResource;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
        ], [
            'mobile.required' => trans('messages.mobile_required'),
            'mobile.digits' => trans('messages.mobile_digits'),
            'mobile.regex' => trans('messages.mobile_regex'),
        ]);

        $user = User::where('mobile', $request->mobile)->first();
        if ($user) {

            $smsCode = rand(11111, 99999);
            $data = [
                'type' => 'verify-mobile',
                'mobile' => $request->mobile,
                'code' => $smsCode,
            ];
            helper::SendSms_ipPanel($data);

            $user->otp = $smsCode;
            $user->save();

        } else {

            $smsCode = rand(11111, 99999);
            $data = [
                'type' => 'verify-mobile',
                'mobile' => $request->mobile,
                'code' => $smsCode,
            ];
            helper::SendSms_ipPanel($data);

            $user = new User();
            $user->mobile = $request->mobile;
            $user->otp = $smsCode;
            $user->type = 2;
            $user->is_available = 1;
            $user->save();
        }

        return $this->respondSuccess('کد تائید با موفقیت ارسال شد');
    }

    public function verifyMobile(Request $request)
    {
        $request->validate([
            'verifyCode' => 'required|digits:5',
            'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
        ], [
            'mobile.required' => trans('messages.mobile_required'),
            'mobile.digits' => trans('messages.mobile_digits'),
            'mobile.regex' => trans('messages.mobile_regex'),
            'verifyCode.required' => 'کد تائیدالزامی است',
            'verifyCode.digits' => 'کد تائید صحیح نمی باشد',
        ]);

        $user = User::where('mobile', $request->mobile)->first();

        if (!$user) {
            return $this->respondError('کاربر یافت نشد');
        }

        if ($user->otp == $request->verifyCode) {

            $user->is_verified = 1;
            $user->otp =null;
            $user->save();
            Auth::login($user);
            $token = $user->createToken('auth_token')->plainTextToken;
            if ($user->is_available == 1) {
                return $this->respondSuccess('با موفقیت تائید شدید', [
                    'token' => $token,
                ]);
            } else {
                Auth::logout();
                return $this->respondError('شما اجازه دسترسی به پنل را ندارید');
            }


        } else {
            return $this->respondError(trans('messages.correct_otp'));
        }

    }


    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();

            return $this->respondSuccess('خارج شدید');
        }
        return $this->respondError('کاربر پیدا نشد');
    }


    private function returnLoginResponse(User $user, Request $request)
    {
        $data = [
            'result' => [
                'token' => $user->createToken($request->device_name ?: 'unknown')->plainTextToken,
                'user' => new UserResource($user)
            ],
        ];

        return $this->apiResponse($data);
    }


}
