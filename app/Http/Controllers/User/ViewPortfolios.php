<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserInfo;
use App\Models\User;
use App\Models\Investment_Packages;
use App\Models\UsersInvestments;
use App\Models\Payment_Orders;
use Carbon\Carbon;
use App\Models\Activities;
use App\Mail\UserRegisteredMail;
use Mail;

class ViewPortfolios extends Controller
{
    public function index(){
        $packages = Investment_Packages::all();
        $id = auth()->id();

        $user = DB::table('users')
        ->join('user_infos','users.id',"=", 'user_infos.user_id')
        ->where('users.id',$id)
        ->get()->first();

        return view('user.view-portfolio',['user'=>$user, 'user_id'=>$id, 'page_title'=>" ", 'packages'=>$packages,'username'=>$user->name]);
    }


    public function store(Request $req){
        $id = auth()->id();

        $user = DB::table('users')
        ->join('user_infos','users.id',"=", 'user_infos.user_id')
        ->where('users.id',$id)
        ->get()->first();


        $callBackUrl=$req->getSchemeAndHttpHost()."/payment";

        //Create Order
        $package=Investment_Packages::findOrFail($req['investment_packages_id']);
        $percentage = $package->min_percent / 100;
        $creditAmount= $percentage * $req['amount'];
        $order_name="$package->name-".Carbon::now()->timestamp;


        $secretKey=env('PLISIO_SECRET_KEY');
        $paymentData = [
        'amount' => $req['amount'], // required Invoice amount in selected currency OR amount_usd can be used instead
        'amount_usd' => $req['amount'], // required Invoice amoint in USD
        'currency' =>   $req['currency'] , // required (ETH, BTC, LTC, TZEC, DOGE, BCH, ...)
        'order_number' => $order_name, // required Client's internal ID
        'order_name' => $order_name, // required Client's internal name
        'email'=>$user->email,
        'description' => "Wants to make payment", // optional any description
        'callback_url' => $callBackUrl,
        'success_url' => $callBackUrl, // optional Absolute URL of the final (success) invoice link
        ];


        $plisio = new \Plisio\ClientAPI($secretKey);
        try {
        $invoice = $plisio->createTransaction($paymentData);
        if ($invoice && isset($invoice['status']) && $invoice['status'] == 'success') {

            $invest=new UsersInvestments;
            $invest->user_id=$user->user_id;
            $invest->investment_packages_id=$req['investment_packages_id'];
            $invest->date=Carbon::now()->toDayDateTimeString();
            $invest->end_date= date('Y-m-d', strtotime("+{$req['duration']} months", strtotime(Carbon::now()->toDayDateTimeString())));
            $invest->amount=$req['amount'];
            $invest->duration=$req['duration'];
            $invest->returns=$creditAmount;
            $invest->txn_id=$invoice['data']['txn_id'];
            $invest->payout= $req['payout'];
            $invest->active=false;
            $invest->status="pending";
            $invest->save();

         return  view('user.payment',['invoice'=>$invoice['data'], 'amount'=>$req['amount'],'time_left'=>$invoice['data']['expire_utc']] );
        } else {
            $req->session()->flash('error',$invoice['data']['message']);
            return  redirect('user/view-investments-portfolio');
        }
        } catch (\Exception $e) {
            $req->session()->flash('error','An error occured');
            return  redirect('user/view-investments-portfolio');
        }

     }
}


