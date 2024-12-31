<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Dotenv;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{
    public function index(){

        $id = User::select('id')->where('type',1)->first();
        $getpayment = Payment::where('vendor_id',$id->id)->get();
        return view('admin.payment.payment',compact("getpayment"));
    }
    public function update(Request $request)
    {

        foreach($request->transaction_type as $key => $no){
            $data = Payment::find($no);
            if(!empty($request->is_available)){
                if(isset($request->is_available[strtolower($data->payment_name)])){
                    $data->is_available = $request->is_available[strtolower($data->payment_name)];
                }else{
                    $data->is_available = 2;
                }
            }else{
                $data->is_available = 2;
            }

            if(strtolower($data->payment_name) == 'zarinpal'){
                $data->environment = $request->environment;
                file_put_contents(base_path('.env'), str_replace('Environment='.env('Environment'), 'Environment='.$request->environment,file_get_contents(base_path('.env'))));
                $data->public_key = $request->public_key;
            }
            if(strtolower($data->payment_name) == "banktransfer")
            {
                if (Auth::user()->type == 1) {
                    $data->bank_name = $request->bank_name;
                    $data->account_holder_name = $request->account_holder_name;
                    $data->account_number = $request->account_number;
                    $data->bank_ifsc_code = $request->bank_ifsc_code;
                }
            }
            $data->save();
        }
        if($request->hasFile('banktransfer_image')){

            if (Auth::user()->type == 2) {
                $pay_data = Payment::where('payment_name', 'BankTransfer')->where('vendor_id',Auth::user()->id)->first();
            } else {
                $pay_data = Payment::where('payment_name', 'BankTransfer')->where('vendor_id',0)->first();
            }
            if($pay_data->image != "bank.png" && file_exists('storage/app/public/admin-assets/images/about/payment/'.$pay_data->image)){
                unlink('storage/app/public/admin-assets/images/about/payment/'.$pay_data->image);
            }
            $image = 'payment-' . uniqid() . '.' . $request->file('banktransfer_image')->getClientOriginalExtension();
            $request->file('banktransfer_image')->move('storage/app/public/admin-assets/images/about/payment/', $image);
            $pay_data->image = $image;
            $pay_data->save();
        }
        if($request->hasFile('zarinpal_image')){
            if (Auth::user()->type == 2) {
                $pay_data = Payment::where('payment_name', 'ZarinPal')->where('vendor_id',Auth::user()->id)->first();
            } else {
                $pay_data = Payment::where('payment_name', 'ZarinPal')->where('vendor_id',0)->first();
            }
            if($pay_data->image != "zarinpal.png" && file_exists('storage/app/public/admin-assets/images/about/payment/'.$pay_data->image)){
                unlink('storage/app/public/admin-assets/images/about/payment/'.$pay_data->image);
            }
            $image = 'payment-' . uniqid() . '.' . $request->file('zarinpal_image')->getClientOriginalExtension();
            $request->file('zarinpal_image')->move('storage/app/public/admin-assets/images/about/payment/', $image);
            $pay_data->image = $image;
            $pay_data->save();
        }

        return redirect()->back()->with('success', trans('messages.success'));
    }
}
