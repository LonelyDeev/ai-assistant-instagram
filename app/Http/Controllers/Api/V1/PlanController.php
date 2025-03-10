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
            'gateway' => 'nullable|in:zarinpal,banktransfer',
        ]);

        $plan = PricingPlan::where('id', $request->plan_id)->first();

        if ($plan->price > 0) {

            if ($plan->price < 1000){
                return $this->respondError('مبلغ نمی تواند کمتر از 1000 تومان باشد');
            }
            $expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
            if (Transaction::where(['vendor_id'=> $request->user()->id,'plan_id'=>$plan->id])->where('expire_date','<=',$expire_date)->where('status','!=','3')->exists()) {
                return $this->respondError('این پلن در لیست شما وجود دارد');
            }

            if ($request->gateway == "zarinpal") {
                $buyPlans=$this->buyPlanZarinpalApi($request);

                if ($buyPlans['status']){
                    return $this->respondSuccess($buyPlans['message'],[
                        'gateway' => 'zarinpal',
                        'amount' => $plan->price,
                        'payment_link'=>$buyPlans['payment_link']
                    ]);
                }
            }

            if ($request->gateway == "banktransfer") {
                $request->validate([
                    'screenshot'=> 'required|file|mimes:jpg,jpeg,png|max:2048',
                ]);

                $buyPlans=$this->buyPlanBankTransferApi($request);

                if ($buyPlans['status']){
                    return $this->respondSuccess($buyPlans['message']);
                }
            }



            return $this->respondError($buyPlans['message']);

        } else {

            if (Transaction::where('vendor_id', $request->user()->id)->exists()) {
                return $this->respondError('فقط برای اولین بار میتوانید از پلن رایگان استفاده کنید');
            }

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

    private function buyPlanBankTransferApi(Request $request)
    {

        try {
            $plan = PricingPlan::where('id', $request->plan_id)->first();

            $screenshot="";
            if ($request->hasFile('screenshot')) {
                $imagePath = $this->uploadImage($request,'screenshot');
                $screenshot = $imagePath;
            }

            $transaction = new Transaction();

            $transaction->vendor_id = Auth::user()->id;
            $transaction->plan_id = $request->plan_id;
            $transaction->plan_name = $plan->name;
            $transaction->payment_type = "banktransfer";
            $transaction->payment_id = null;
            $transaction->amount = $plan->price;
            $transaction->tools_limit =$plan->tools_limit;
            $transaction->word_limit = $plan->word_limit;
            $transaction->status = 1;
            $transaction->purchase_date = date("Y-m-d h:i:sa");
            $transaction->expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
            $transaction->duration = $plan->duration;
            $transaction->days = $plan->days;
            $transaction->screenshot = $screenshot;
            $transaction->save();

            $checkuser = User::find(Auth::user()->id);
            $checkuser->plan_id = $plan->id;
            $checkuser->purchase_amount = $plan->price;
            $checkuser->purchase_date = date("Y-m-d h:i:sa");
            $checkuser->save();

            return [
                'status' => true,
                'message' => 'با موفقیت ثبت شد و پس از برسی، پلن شما فعال می شود.',
            ];

        } catch (\Throwable $th) {
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }

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


    private function uploadImage(Request $request, $inputName = 'featured_image')
    {
        try {
            if (!$request->hasFile($inputName)) {
                return null;
            }

            $file = $request->file($inputName);

            $validated = $request->validate([
                $inputName => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            /*$fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('uploads/images', $fileName, 'public');
            return '/storage/' . $filePath;*/

            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // ذخیره فایل در مسیر public/uploads/images
            $filePath = 'storage/uploads/images/' . $fileName;
            $file->move(public_path('storage/uploads/images'), $fileName);

            // بازگشت مسیر فایل ذخیره شده
            return '/storage/uploads/images/' . $fileName;
        } catch (\Exception $e) {
            throw new \Exception('آپلود تصویر با شکست مواجه شد: ' . $e->getMessage());
        }
    }

    public function getBankInfo()
    {
        $paymentmethod = Payment::where(['is_available'=> '1','payment_name'=>'BankTransfer'])->first();
        return json_encode([
            'bankName' => $paymentmethod->bank_name,
            'accountName' => $paymentmethod->account_holder_name,
            'accountNumber' => $paymentmethod->account_number,
        ]);
    }
}
