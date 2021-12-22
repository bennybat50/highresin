<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use \Datetime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserInfo;
use App\Models\User;
use App\Models\Investment_Packages;
use App\Models\UsersInvestments;
use Carbon\Carbon;
use App\Models\Activities;
use App\Models\Payment_Orders;



class UserPayment extends Controller
{
    public function index(Request $req)
    {
        $req->session()->flash('success','Pending Purchase ... Awaiting payment confirmation, Please reload to confirm!');
        return  redirect('user/user-investments');

    //     if($req['status']=="completed" ||$req['status']=="mismatch" || $req['status']=="expired"   ){
    //         $order=Payment_Orders::findOrFail($req['order_number']);

    //         $user = DB::table('users')
    //         ->join('user_infos','users.id',"=", 'user_infos.user_id')
    //         ->where('users.id',$order->user_id)
    //         ->get()->first();

    //         $invest=new UsersInvestments;
    //         $invest->user_id=$order->user_id;
    //         $invest->investment_packages_id=$order->investment_packages_id;
    //         $invest->date=Carbon::now()->toDayDateTimeString();
    //         $invest->end_date= date('Y-m-d', strtotime("+9 months", strtotime(Carbon::now()->toDayDateTimeString())));
    //         $invest->amount=$order->amount;
    //         $invest->duration=9;
    //         $invest->returns=$order->returns ;
    //         $invest->payout= $order->payout;
    //         $invest->active=true;
    //         $invest->save();



    //    // return  ["res"=>"Investment made successful"];

    //     }



    }

    public function store(Request $req)
    {
        if($req['status']=="completed" ||$req['status']=="mismatch" || $req['status']=="expired"){
            $order=Payment_Orders::findOrFail($req['order_number']);

            $user = DB::table('users')
            ->join('user_infos','users.id',"=", 'user_infos.user_id')
            ->where('users.id',$order->user_id)
            ->get()->first();

            $invest=new UsersInvestments;
            $invest->user_id=$order->user_id;
            $invest->investment_packages_id=$order->investment_packages_id;
            $invest->date=Carbon::now()->toDayDateTimeString();
            $invest->end_date= date('Y-m-d', strtotime("+9 months", strtotime(Carbon::now()->toDayDateTimeString())));
            $invest->amount=$order->amount;
            $invest->duration=9;
            $invest->returns=$order->returns ;
            $invest->payout= $order->payout;
            $invest->active=true;
            $invest->save();

            //Save Activity
            $activity=new Activities;
            $activity->title="Investment initialised";
            $activity->user_id=$order->user_id;
            $activity->user_investments_id=$invest->id;
            $activity->investment_packages_id=$order->investment_packages_id;
            $activity->category="deposit";
            $activity->date=Carbon::now()->toDayDateTimeString();
            $activity->amount=$order->amount;
            $activity->descp="Deposit of {$order->amount} made for investment";
            $activity->save();

            //Send Mails
            //Send mail
        Mail::to( $user->email)->send(new UserRegisteredMail([
            'subject'=>'Congratulations on your Portfolio Purchase',
            'title' => "Congratulations {$user->name} {$user->last_name}",
            'url' => "{$req->getSchemeAndHttpHost()}/user/user-investments",
            'descp' => 'We are delighted to inform you that your portfolio purchase has been received successfully. Your Investor account will be activated shortly. This is the best step you could possibly take toward regaining control of your financial life. Our key Goal is providing efficient and reliable financial services to our clients. We very much admire your shrewdness in taking this decisive action now. There is every reason to believe you are on your way to the top!',
            'action-text'=>'Client Access',
            'img'=>'assets/images/emails/investment-banner.jpg'
        ]));

         //Send Admin Mail
         Mail::to("chizi.tech99@gmail.com")->send(new UserRegisteredMail([
            'subject'=>'Portfolio Payment',
            'title' => "Hi Admin",
            'url' => "{$request->getSchemeAndHttpHost()}/admin/users-investments",
            'descp' => "A user just successfully made payment on Palmalliance. These are the user details.... NAME: {$user->name} {$user->last_name}, EMAIL: {$user->email}, PHONE: {$user->phone}, AMOUNT: ${$order->amount}..... Please Login to view investments",
            'action-text'=>'Vew Investments',
            'img'=>'assets/images/emails/Palm-Alliance-Management-Building.jpg'
        ]));

        //return  ["res"=>"Investment made successful"];

    }
    //return  ["res"=>"An error occured'"];
    }
}
