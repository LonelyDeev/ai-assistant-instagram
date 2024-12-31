<?php

namespace App\Http\Controllers\Api\V1;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Plan\PlansCollection;
use App\Models\Payment;
use App\Models\PricingPlan;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;

class PlanController extends Controller
{
    public function index()
    {

        $plans = PricingPlan::where('is_available', 1)->get();
        return $this->respondWithResourceCollection(new PlansCollection($plans));
    }

    public function buyPlans(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'gateway' => 'nullable|in:zarinpal',
        ]);

        $plan = PricingPlan::where('id', $request->plan_id)->first();

        if ($plan->price > 0) {

            if ($plan->price < 1000){
                return $this->respondError('مبلغ نمی تواند کمتر از 1000 تومان باشد');
            }

            if ($request->gateway == "zarinpal") {
                $buyPlans=$this->buyPlanZarinpalApi($request);
            }


            if ($buyPlans['status']){
                return $this->respondSuccess($buyPlans['message'],[
                    'gateway' => 'zarinpal',
                    'amount' => $plan->price,
                    'payment_link'=>$buyPlans['payment_link']
                ]);
            }
            return $this->respondError($buyPlans['message']);

        } else {

            $transaction = new Transaction();

            $transaction->vendor_id = $request->user()->id;
            $transaction->plan_id = $plan->id;
            $transaction->plan_name = $plan->name;
            $transaction->payment_type = 'free';
            $transaction->payment_id = null;
            $transaction->amount = 0;
            $transaction->tools_limit = $plan->tools_limit;
            $transaction->word_limit = $plan->word_limit;
            $transaction->status = 1;
            $transaction->purchase_date = date("Y-m-d h:i:sa");
            $transaction->expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
            $transaction->duration = $plan->duration;
            $transaction->days = $plan->days;
            $transaction->save();

            $word_limit=User::find($request->user()->id)->word_limit;
            $word_limit=$word_limit+$plan->word_limit;
            User::where('id', $request->user()->id)->update(['payment_id' => $transaction->id,'plan_id' => $plan->id,'word_limit' => $word_limit, 'purchase_amount' => $plan->price, 'purchase_date' => Carbon::now()->toDateTimeString()]);


            return  $this->respondSuccess($plan->name.' با موفقیت برای شما فعال شد');


        }


        return $this->respondError('Invalid gateway');

    }

    private function buyPlanZarinpalApi(Request $request)
    {
        $plan = PricingPlan::where('id', $request->plan_id)->first();
        $payment = Payment::where('payment_name', 'ZarinPal')->first();

        if (!$plan || !$payment) {
            return  $this->respondError('طرح یا پیکربندی پرداخت نامعتبر است.');
        }
        try {
            // تنظیمات Callback
            $callbackUrl = route('zarinpal_verify'); // آدرس برای تأیید تراکنش

            // ایجاد اینویس برای پرداخت
            $invoice = (new Invoice)->amount(intval($plan->price));
            // ساخت تراکنش و دریافت لینک پرداخت
            $paymentRequest = \Shetabit\Payment\Facade\Payment::via('zarinpal')
                ->config(['merchantId' => $payment->public_key])
                ->callbackUrl($callbackUrl)
                ->purchase($invoice, function ($driver, $transactionId) use ($plan) {
                    // ذخیره اطلاعات تراکنش در دیتابیس
                    $transaction = new Transaction();
                    $transaction->vendor_id = Auth::id();
                    $transaction->plan_id = $plan->id;
                    $transaction->plan_name = $plan->name;
                    $transaction->payment_type = 'zarinpal';
                    $transaction->payment_id = $transactionId;
                    $transaction->amount = $plan->price;
                    $transaction->tools_limit = $plan->tools_limit;
                    $transaction->word_limit = $plan->word_limit;
                    $transaction->status = 1; // Pending
                    $transaction->purchase_date = now();
                    $transaction->expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
                    $transaction->duration = $plan->duration;
                    $transaction->days = $plan->days;
                    $transaction->save();
                });


            $paymentLink = $paymentRequest->pay()->getAction(); // دریافت لینک پرداخت
            return [
                'status' => true,
                'message' => 'لینک پرداخت با موفقیت ایجاد شد.',
                'payment_link' => $paymentLink,
            ];

        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }

    }

    public function zarinpalVerifyApi(Request $request)
    {
        $transaction = Transaction::where('payment_id', $request->Authority)->first();
        try {
            $receipt = \Shetabit\Payment\Facade\Payment::amount($transaction->amount)->transactionId($request->Authority)->verify();

            $plan = PricingPlan::where('id', $transaction->plan_id)->first();
            $user = User::find($transaction->vendor_id);

            $user->word_limit = $user->word_limit + $plan->word_limit;

            $user->plan_id = $transaction->plan_id;
            $user->purchase_amount = $transaction->amount;
            $user->purchase_date = date("Y-m-d h:i:sa");
            $user->save();

            $transaction->status = 2;
            $transaction->save();
            session()->forget(['amount', 'plan_id', 'payment_type', 'transactionId']);
            return $this->respondSuccess('پرداخت با موفقیت انجام شد.');
        } catch (InvalidPaymentException $exception) {
            $transaction->status = 3;
            $transaction->save();
            return $this->respondError($exception->getMessage());
        }


    }
}
