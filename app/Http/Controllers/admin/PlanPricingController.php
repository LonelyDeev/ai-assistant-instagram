<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\PricingPlan;
use App\Models\User;
use App\Models\Transaction;
use App\helper\helper;
use App\Models\Tools;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Stripe;

use Validator;
class PlanPricingController extends Controller
{
    public function view_plan(Request $request)
    {
        $allplan = PricingPlan::orderBy('price');
        if (Auth::user()->type == 2) {
            $allplan = $allplan->where('is_available', '1');
        }
        $allplan = $allplan->get();

        return view('admin.plan.plan', compact("allplan"));
    }
    public function add_plan(Request $request)
    {
        $tools = Tools::all();
        return view('admin.plan.add_plan',compact('tools'));
    }
    public function save_plan(Request $request)
    {
        $request->validate([
            'plan_name' => 'required',
            'plan_price' => 'required',
            'plan_duration' => 'required_if:type,1',
            'plan_days' => 'required_if:type,2',
            'word_limit' =>'required',
        ], [
            'plan_name.required' => trans('messages.name_required'),
            'plan_price.required' => trans('messages.price_required'),
            'plan_duration.required_if' => trans('messages.duration_required'),
            'plan_description.required' => trans('messages.description_required'),
            'plan_features.required' => trans('messages.plan_features'),
            'plan_days.required_if' => trans('messages.days_required'),
            'word_limit.required' => trans('messages.word_limit_required')
        ]);
        $exitplan = PricingPlan::where('price', '0')->count();
        if ($exitplan > 0 && $request->plan_price == '0') {
            return redirect('admin/plan')->with('error', trans('messages.already_exist_plan'));
        } else {
            $saveplan = new PricingPlan();
            $saveplan->name = $request->plan_name;
            $saveplan->themes_id = "0";
            $saveplan->description = $request->plan_description;
            $saveplan->features = implode("|", $request->plan_features);
            $saveplan->tools_limit = implode(",", $request->tools_limit);
            $saveplan->price = $request->plan_price;
            $saveplan->plan_type = $request->type;
            if ($request->type == "1") {
                $saveplan->duration = $request->plan_duration;
                $saveplan->days = 0;
            }
            if ($request->type == "2") {
                $saveplan->duration = "";
                $saveplan->days = $request->plan_days;
            }
            $saveplan->word_limit = $request->word_limit;
            $saveplan->save();
            return redirect('admin/plan')->with('success', trans('messages.success'));
        }
    }
    public function edit_plan($id)
    {
        $editplan = PricingPlan::where('id', $id)->first();
        $tools = Tools::all();
        return view('admin.plan.edit_plan', compact("editplan",'tools'));
    }
    public function update_plan(Request $request, $id)
    {
        $request->validate([
            'plan_name' => 'required',
            'plan_price' => 'required',
            'plan_duration' => 'required_if:type,1',
            'plan_days' => 'required_if:type,2',
            'word_limit' =>'required',
        ], [
            'plan_name.required' => trans('messages.name_required'),
            'plan_price.required' => trans('messages.price_required'),
            'plan_duration.required_if' => trans('messages.duration_required'),
            'plan_description.required' => trans('messages.description_required'),
            'plan_features.required' => trans('messages.plan_features'),
            'plan_days.required_if' => trans('messages.days_required'),
            'word_limit.required' => trans('messages.word_limit_required')
        ]);$exitplan = PricingPlan::where('price', '0')->count();
        if ($exitplan > 1 && $request->plan_price == '0') {
            return redirect('admin/plan/edit-'.$id)->with('error', trans('messages.already_exist_plan'));
        }
        else
        {
            $editplan = PricingPlan::where('id', $id)->first();
            $editplan->name = $request->plan_name;
            $editplan->themes_id = "0";
            $editplan->description = $request->plan_description;
            $editplan->features = implode("|", $request->plan_features);
            $editplan->tools_limit = implode(",", $request->tools_limit);
            $editplan->price = $request->plan_price;
            $editplan->plan_type = $request->type;
            if ($request->type == "1") {
                $editplan->duration = $request->plan_duration;
                $editplan->days = 0;
            }
            if ($request->type == "2") {
                $editplan->duration = "";
                $editplan->days = $request->plan_days;
            }
            $editplan->word_limit = $request->word_limit;
            $editplan->update();
            return redirect('admin/plan')->with('success', trans('messages.success'));
        }

    }
    public function status_change($id, $status)
    {
        PricingPlan::where('id', $id)->update(['is_available' => $status]);
        return redirect('admin/plan')->with('success', trans('messages.success'));
    }
    public function select_plan($id)
    {

        $vendor_id = User::where('type',1)->first();
        $plan = PricingPlan::where('id', $id)->first();
        $tools_limit = explode(',', $plan->tools_limit);

        if ($plan->price > 0) {
            $paymentmethod = Payment::where('vendor_id',$vendor_id->id)->where('is_available', '1')->get();
            return view('admin.plan.plan_payment', compact('plan', 'paymentmethod'));
        } else {

            $transaction = new transaction();
            $transaction->vendor_id = Auth::user()->id;
            $transaction->plan_id = $id;
            $transaction->plan_name = $plan->name;
            $transaction->payment_type = "";
            $transaction->payment_id = "";
            $transaction->amount = $plan->price;
            $transaction->tools_limit =$plan->tools_limit;
            $transaction->word_limit = $plan->word_limit;
            $transaction->purchase_date = date("Y-m-d h:i:sa");
            $transaction->expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
            $transaction->duration = $plan->duration;
            $transaction->days = $plan->days;
            $transaction->save();

            $word_limit=User::find(Auth::user()->id)->word_limit;
            $word_limit=$word_limit+$plan->word_limit;
            User::where('id', Auth::user()->id)->update(['payment_id' => $transaction->id,'plan_id' => $id,'word_limit' => $word_limit, 'purchase_amount' => $plan->price, 'purchase_date' => Carbon::now()->toDateTimeString()]);
            return redirect()->back()->with('success', trans('messages.success'));
        }
    }

    public function mercadorequest(Request $request)
    {
        $gettoken = Payment::where('payment_name', 'MercadoPago')->where('vendor_id', 1)->first();
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
            CURLOPT_URL => 'https://api.mercadopago.com/checkout/preferences',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "items": [
                {
                    "title": "' . trans('labels.plan') . ' : ' . $request->plan_name . '",
                    "description": "' . $request->plan_description . '",
                    "quantity": 1,
                    "unit_price": '.$request->amount.',
                }
            ],
            "payer": {
                "name": "' . Auth::user()->name . '",
                "email": "' . Auth::user()->email . '",
            },
            "payment_methods": {
                "installments": 1
            },
            "back_urls": {
                "success": "' . $request->successurl . '",
                "failure": "' . $request->failureurl . '",
                "pending": "' . $request->failureurl . '",
            },
            "auto_return" : "approved",
        }',
            CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $gettoken->secret_key . '',
                    'Content-Type: application/json'
                ),
            )
        );
        $response = curl_exec($curl);
        curl_close($curl);
        $responseurl = json_decode($response);

        if($gettoken->environment == 1) {
            $redirecturl = $responseurl->sandbox_init_point;
        }
        if($gettoken->environment == 2) {
            $redirecturl = $responseurl->init_point;
        }
        session()->put('plan_id', $request->plan_id);
        session()->put('payment_type', $request->payment_type);
        session()->put('amount', $request->amount);
        return response()->json(['status' => 1, 'message' => trans('messages.success'), 'redirecturl' => $redirecturl], 200);
    }

    public function success(Request $request)
    {
        try {
            $plan = PricingPlan::where('id', session()->get('plan_id'))->first();
            $checkuser = User::find(Auth::user()->id);
            $checkuser->plan_id = session()->get('plan_id');
            $checkuser->purchase_amount = session()->get('amount');
            $checkuser->purchase_date = date("Y-m-d h:i:sa");
            $checkuser->save();
            $transaction = new Transaction;
            $transaction->vendor_id = Auth::user()->id;
            $transaction->plan_id = session()->get('plan_id');
            $transaction->plan_name = $plan->name;
            $transaction->payment_type = session()->get('payment_type');
            $transaction->amount = session()->get('amount');
            $transaction->tools_limit =$plan->tools_limit;
            $transaction->payment_id = @$request->payment_id;
            $transaction->service_limit = $plan->order_limit;
            $transaction->appoinment_limit = $plan->appointment_limit;
            $transaction->expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
            $transaction->duration = $plan->duration;
            $transaction->days = $plan->days;

            $transaction->custom_domain = $plan->custom_domain;
            $transaction->zoom = $plan->zoom;
            $transaction->calendar = $plan->calendar;
            $transaction->status = "2";
            $transaction->purchase_date = date("Y-m-d h:i:sa");
            $transaction->save();
            session()->forget(['amount', 'plan_id', 'payment_type']);
            return redirect('admin/plan')->with('success', trans('messages.success'));
        } catch (\Throwable $th) {
            abort(404);
        }
    }
    public function buyplan(Request $request)
    {


        try {
            $plan = PricingPlan::where('id', $request->plan_id)->first();

            $expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
            if (Transaction::where(['vendor_id'=> $request->user()->id,'plan_id'=>$plan->id])->where('expire_date','<=',$expire_date)->where('status','!=','3')->exists()) {
                return redirect('/plan')->with('error',  'این پلن در لیست شما وجود دارد');
            }


            $checkuser = User::find(Auth::user()->id);
            $checkuser->plan_id = $plan->id;
            $checkuser->purchase_amount = $plan->price;
            $checkuser->purchase_date = date("Y-m-d h:i:sa");
            $checkuser->save();

            $transaction = new Transaction();

            $transaction->vendor_id = Auth::user()->id;
            $transaction->plan_id = $request->plan_id;
            $transaction->plan_name = $plan->name;
            $transaction->payment_type = $request->payment_type;
            $transaction->payment_id = null;
            $transaction->amount = $request->amount;
            $transaction->tools_limit =$plan->tools_limit;
            $transaction->word_limit = $plan->word_limit;
            $transaction->status = 1;
            $transaction->purchase_date = date("Y-m-d h:i:sa");
            $transaction->expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
            $transaction->duration = $plan->duration;
            $transaction->days = $plan->days;
            $transaction->save();
            if ($request->payment_type) {
                return redirect('/plan')->with('success', trans('messages.success'));
            } else {
                return response()->json(['status' => 1, 'message' => trans('messages.success')], 200);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => trans('messages.wrong')], 200);
        }
    }

    public function buyplanZarinpal(Request $request)
    {
        $plan = PricingPlan::where('id', $request->plan_id)->first();
        $payment = Payment::where('payment_name', 'ZarinPal')->first();


       return \Shetabit\Payment\Facade\Payment::via('zarinpal')->config(['merchantId'=>$payment->public_key])->callbackUrl(URL::to('/plan/buyplan/zarinpal-verify'))->purchase(
                (new Invoice)->amount(intval($plan->price)),
                function ($driver, $transactionId) use ($request, $plan) {
                    $transaction = new Transaction();

                    $transaction->vendor_id = Auth::user()->id;
                    $transaction->plan_id = $plan->id;
                    $transaction->plan_name = $plan->name;
                    $transaction->payment_type = 'zarinpal';
                    $transaction->payment_id = $transactionId;
                    $transaction->amount = $plan->price;
                    $transaction->tools_limit = $plan->tools_limit;
                    $transaction->word_limit = $plan->word_limit;
                    $transaction->status = 1;
                    $transaction->purchase_date = date("Y-m-d h:i:sa");
                    $transaction->expire_date = helper::get_plan_exp_date($plan->duration, $plan->days);
                    $transaction->duration = $plan->duration;
                    $transaction->days = $plan->days;
                    $transaction->save();

                    session()->put('transactionId', (string) $transactionId);
                    session()->put('amount', $plan->price);
                }
            )->pay()->render();

    }

    public function zarinpal_verify(Request $request)
    {
        $transaction=Transaction::where('payment_id',$request->Authority)->first();
        try {
            $receipt = \Shetabit\Payment\Facade\Payment::amount($transaction->amount)->transactionId($request->Authority)->verify();

            $plan = PricingPlan::where('id', $transaction->plan_id)->first();
            $user = User::find($transaction->vendor_id);

            $user->word_limit=$user->word_limit+$plan->word_limit;

            $user->plan_id = $transaction->plan_id;
            $user->purchase_amount = $transaction->amount;
            $user->purchase_date = date("Y-m-d h:i:sa");
            $user->save();

            $transaction->status=2;
            $transaction->save();
            session()->forget(['amount', 'plan_id', 'payment_type','transactionId']);
            session()->put('getSuccessMessage','پرداخت با موفقیت انجام شد.');
            return redirect('/index')->with('success', 'پرداخت با موفقیت انجام شد.');
        } catch (InvalidPaymentException $exception) {
            $transaction->status=3;
            $transaction->save();
            session()->put('getErrorMessage', $exception->getMessage());
            return redirect('/plan/selectplan-'.$transaction->plan_id)->with('error', $exception->getMessage());
        }


    }
    public function delete(Request $request)
    {
        $deleteplan = PricingPlan::where('id',$request->id)->first();
        $deleteplan->delete();
        return redirect('admin/plan')->with('success', trans('messages.success'));
    }
}
