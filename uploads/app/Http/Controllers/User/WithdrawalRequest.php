<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserInfo;
use App\Models\User;
use App\Models\Investment_Packages;
use App\Models\Withdrawal_Methods;
use App\Models\WithdrawalRequests;
use App\Mail\UserRegisteredMail;
use Mail;
use Carbon\Carbon;
use App\Models\Activities;



class WithdrawalRequest extends Controller
{
    public function index(){
        $methods = Withdrawal_Methods::all();
        $id = auth()->id();

        $user = DB::table('users')
        ->join('user_infos','users.id',"=", 'user_infos.user_id')
        ->where('users.id',$id)
        ->get()->first();


        return view('user.withdrawal-request',['user'=>$user, 'user_id'=>$id, 'page_title'=>" ", 'methods'=>$methods,'username'=>$user->name]);
    }

    public function store(Request $req){

        function getWalletType($data)
            {
                switch ($data) {
                    case 'main_wallet':
                        return "Portfolio Balance";
                        break;
                    case 'compound_wallet':
                        return "Compounding Dividends";
                    break;

                }
            }

            $wallet_type=getWalletType($req['wallet_type']);

        $id = auth()->id();
        $user = DB::table('users')
        ->join('user_infos','users.id',"=", 'user_infos.user_id')
        ->where('users.id',$id)
        ->get()->first();


        $percentage = $req['charge'] / 100;

        $charges=   $req['amount_paid'] * $percentage;
        $credited=$req['amount_paid'] - $charges;

        $request=new WithdrawalRequests;
        $request->user_id=$req['user_id'];
        $request->withdrawal_methods_id=$req['withdrawal_methods_id'];
        $request->amount_paid=$req['amount_paid'];
        $request->charge=$req['charge'];
        $request->wallet_type=$req['wallet_type'];
        $request->created_at=Carbon::now();
        $request->wallet_address=$req['wallet_address'];
        $request->amount_credited= $credited;
        $request->approved=false;
        $request->save();


        //Save Activity
        $activity=new Activities;
        $activity->title="Withdrawal Request";
        $activity->user_id=$req['user_id'];
        $activity->category="withdrawals";
        $activity->date=Carbon::now()->toDayDateTimeString();
        $activity->amount=$credited;
        $activity->descp="Awaiting approval of {$credited} made from $wallet_type";
        $activity->save();


        //Send Mail
        $date=Carbon::now()->toDayDateTimeString();
        Mail::to($user->email)->send(new UserRegisteredMail([
            'subject'=>'Withdrawal Notification',
            'title' => "Hello {$user->name}",
            'url' => "{$req->getSchemeAndHttpHost()}/user/withdrawal-history",
            'descp' => "A recent withdrawal of {$req['amount_paid']} made on {$date} to the Wallet Address:...... {$req['wallet_address']} ......
            has been initiated from your account. Your withdrawal request will be processed automatically in less than 5 minutes.
            If you didn’t make this withdrawal and believe this is unauthorised, Kindly log into your account and cancel it or contact the customer fulfilment centre.",
            'action-text'=>'Client Access',
            'img'=>'assets/images/emails/withdrawal-banner.jpg'
        ]));

          //Send Admin Mail
          Mail::to("chizi.tech99@gmail.com")->send(new UserRegisteredMail([
            'subject'=>'Withdrawal Request',
            'title' => "Hi Admin",
            'url' => "{$req->getSchemeAndHttpHost()}/admin/withdrawal-request",
            'descp' => "A user just requested for withdrawal on Palm-Alliance. These are the user details.... NAME: {$user->name} {$user->last_name},
             EMAIL: {$user->email}, PHONE: {$user->phone}, AMOUNT: $$credited,  WALLET-ADDRESS:...... {$req['wallet_address']} ...... Please Login to approve the transaction",
            'action-text'=>'Approve Withdrawal',
            'img'=>'assets/images/emails/Palm-Alliance-Management-Building.jpg'
        ]));

        $req->session()->flash('success','Withdrawal request made, ... Please wait for approval');


        return  redirect('user/withdrawal-history');

     }
}
