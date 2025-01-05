<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\helper\helper;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
  public function index(Request $request)
  {
    $vendors = User::whereNotIn('id', [1])->get();
    if (Auth::user()->type == "1") {

      $transaction = Transaction::with('vendor_info');
      if (!empty($request->vendor)) {
        $transaction = $transaction->where('vendor_id', $request->vendor);
      }
      if (!empty($request->startdate) && !empty($request->enddate)) {
        $transaction =  $transaction->whereBetween('purchase_date', [$request->startdate, $request->enddate]);
      }
      $transaction = $transaction->orderBy('id', 'DESC')->get();
    }
    if (Auth::user()->type == "2") {
      $transaction = Transaction::with("plan_info")->where('vendor_id', Auth::user()->id)->orderByDesc('id');
      if (!empty($request->startdate) && !empty($request->enddate)) {
        $transaction =  $transaction->whereBetween('purchase_date', [$request->startdate, $request->enddate]);
      }
      $transaction = $transaction->orderBy('id', 'DESC')->get();
    }
    return view('admin.transaction.transaction', compact('transaction', 'vendors'));
  }
  public function status(Request $request)
  {
    $transaction = Transaction::find($request->id);
    if (!empty($transaction)) {
      if ($request->status == 2) {
        $transaction->purchase_date = date("Y-m-d h:i:sa");
        $transaction->expire_date = helper::get_plan_exp_date($transaction->duration, $transaction->days);

          $word_limit=User::find($transaction->vendor_id)->word_limit;
          $word_limit=$word_limit+$transaction->word_limit;

          User::where('id',$transaction->vendor_id)->update(['word_limit'=>$word_limit]);
      }
      $transaction->status = $request->status;
      $transaction->save();



      return redirect('admin/transaction')->with('success', trans('messages.success'));
    }
    abort(404);
  }
}
