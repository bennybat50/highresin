<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserInfo;
use App\Models\User;
use App\Models\Reinvest;
use App\Models\UsersInvestments;
use App\Models\Investment_Packages;
use Carbon\Carbon;
use App\Models\Activities;
use App\Mail\UserRegisteredMail;
use Mail;

class ReinvestContoller extends Controller
{
    public function store(Request $req){
        $id = auth()->id();

        $user = DB::table('users')
        ->join('user_infos','users.id',"=", 'user_infos.user_id')
        ->where('users.id',$id)
        ->get()->first();
        $userInfo=UserInfo::where("user_id",$id)->get()->first();


        $callBackUrl=$req->getSchemeAndHttpHost()."/payment";

        //Create Order


        $secretKey=env('PLISIO_SECRET_KEY');
        $paymentData = [
        'amount' => $req['amount'], // required Invoice amount in selected currency OR amount_usd can be used instead
        'amount_usd' => $req['amount'], // required Invoice amoint in USD
        'currency' =>   $req['currency'] , // required (ETH, BTC, LTC, TZEC, DOGE, BCH, ...)
        'order_number' => Carbon::now()->timestamp, // required Client's internal ID
        'order_name' => $user->name, // required Client's internal name
        'email'=>$user->email,
        'description' => "Wants to make payment", // optional any description
        'callback_url' => $callBackUrl,
        'success_url' => $callBackUrl, // optional Absolute URL of the final (success) invoice link
        ];
        $userInvestment=UsersInvestments::where("id", $req['investment_id'])->get()->first();

        $package=Investment_Packages::findOrFail($userInvestment->investment_packages_id);
        $percentage = $package->min_percent / 100;
        $reinvestmentAmount=$req['amount'] + $userInvestment->amount;
        $creditAmount= $percentage * $reinvestmentAmount;
        $userInvestment->status="pending_reinvest";


        if($req['payment_method']=="direct_deposit"){
            $plisio = new \Plisio\ClientAPI($secretKey);
            try {
            $invoice = $plisio->createTransaction($paymentData);
            if ($invoice && isset($invoice['status']) && $invoice['status'] == 'success') {
                $invest=new Reinvest;
                $invest->user_id=$id;
                $invest->user_investments_id=$req['investment_id'];
                $invest->date=Carbon::now()->toDayDateTimeString();
                $invest->amount=$reinvestmentAmount;
                $invest->topup_amount=$req['amount'];
                $invest->returns=$creditAmount;
                $invest->txn_id=$invoice['data']['txn_id'];
                $invest->active=false;
                $invest->status="pending";
                $invest->save();
                $userInvestment->update();

            return  view('user.payment',['invoice'=>$invoice['data'], 'amount'=>$req['amount'],'time_left'=>$invoice['data']['expire_utc']] );
            } else {
                $req->session()->flash('error','An error occured');
                return  redirect('user/user-investments');
            }
            } catch (\Exception $e) {
                $req->session()->flash('error','An error occured');
                return  redirect('user/user-investments');
            }
        }else if($req['payment_method']=="main_wallet"){
            if($userInfo-> main_wallet >=$req['amount'] ){
                $userInfo->main_wallet = $userInfo-> main_wallet-$req['amount'];
                $userInfo->update();
               $userInvestment->update();
               $invest=new Reinvest;
               $invest->user_id=$id;
               $invest->user_investments_id=$req['investment_id'];
               $invest->date=Carbon::now()->toDayDateTimeString();
               $invest->amount=$reinvestmentAmount;
               $invest->returns=$creditAmount;
               $invest->topup_amount=$req['amount'];
               $invest->txn_id=null;
               $invest->active=false;
               $invest->status="pending";
               $invest->save();


                $req->session()->flash('success','Pending Purchase ... Awaiting payment confirmation, Please reload to confirm!');
                return  redirect('user/user-investments');
            }else{
                $req->session()->flash('error','You dont not have enough funds in your Portfolio Balance to make this purchase ');
                return  redirect('user/user-investments');
            }


        }else if($req['payment_method']=="compound_wallet"){
            if($userInfo-> compound_wallet >=$req['amount'] ){
                $userInfo->compound_wallet = $userInfo-> compound_wallet-$req['amount'];
                $userInfo->update();
                $userInvestment->update();
                $invest=new Reinvest;
                $invest->user_id=$id;
                $invest->user_investments_id=$req['investment_id'];
                $invest->date=Carbon::now()->toDayDateTimeString();
                $invest->amount=$reinvestmentAmount;
                $invest->returns=$creditAmount;
                $invest->topup_amount=$req['amount'];
                $invest->txn_id=null;
                $invest->active=false;
                $invest->status="pending";
                $invest->save();


                $req->session()->flash('success','Pending Purchase ... Awaiting payment confirmation, Please reload to confirm!');
                return  redirect('user/user-investments');
            }else{
                $req->session()->flash('error','You dont not have enough funds in your Compound Dividend to make this purchase ');
                return  redirect('user/user-investments');
            }

        }



     }
}
