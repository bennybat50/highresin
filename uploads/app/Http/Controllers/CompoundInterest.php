<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\UserInfo;
use App\Models\User;
use App\Models\Investment_Packages;
use App\Models\UsersInvestments;
use App\Models\Messages;
use GuzzleHttp\Client;
use App\Models\Activities;
use App\Models\Withdrawal_Methods;
use Carbon\Carbon;
use \Datetime;
use App\Models\Referrals;

class CompoundInterest extends Controller
{

     public function index()
    {
        // $message=new Messages;
        // $message->title="Cron Job";
        // $message->descp="Testing Cron Job";
        // $message->save();

        $investments= User::join('user_investments', 'user_investments.user_id', '=', 'users.id')
        ->join('investment_packages', 'investment_packages.id', '=', 'user_investments.investment_packages_id')
        ->orderBy('user_investments.id','DESC')
        ->where('user_investments.status','completed')
        
        ->get(['users.name as username','users.email', 'investment_packages.name as packagename', 'investment_packages.id as package_id','user_investments.date','user_investments.id as investment_id','user_investments.end_date','investment_packages.category_name','users.id as user_id',
        'user_investments.amount','user_investments.returns', 'user_investments.duration', 'user_investments.payout', 'user_investments.active','user_investments.status','user_investments.txn_id', ]);

        $usersInvestments=[];
        for ($i=0; $i < count($investments); $i++) {
            //$investments[$i]['end_date']

            $d1 = strtotime(Carbon::now()->toDayDateTimeString());
            $d2 = strtotime($investments[$i]['end_date']);
            $totalSecondsDiff = abs($d1-$d2);
            $totalDaysDiff  =intval(round($totalSecondsDiff/60/60/24)) ;
            if ($d1 < $d2) {
                $dayLeft=100;
                if ($totalDaysDiff < 100) {
                    $dayLeft=$totalDaysDiff;
                }
                $data= ['packagename'=>$investments[$i]['packagename'],'amount'=>$investments[$i]['amount'],'returns'=>$investments[$i]['returns'],'duration'=>$investments[$i]['duration'], 'active'=>$investments[$i]['active'],'investment_id'=>$investments[$i]['investment_id'],'user_id'=>$investments[$i]['user_id'],'package_id'=>$investments[$i]['package_id'],];
                array_push($usersInvestments, (object)$data);
            }
        }

        $day= date("D",strtotime(Carbon::now()->toDayDateTimeString()));
        if ($day=="Sat" || $day=="Sun") {
            return ["response"=>"No Earning today"];
        }else{
            foreach ($usersInvestments as $key => $userInvest) {
                //Calculate Percentage
                $package=Investment_Packages::findOrFail($userInvest->package_id);
                $percentage = $package->min_percent / 100;
                $creditAmount= $percentage *  $userInvest->amount;

                $user = DB::table('users')
                ->join('user_infos', 'users.id', "=", 'user_infos.user_id')
                ->where('users.id', $userInvest->user_id)
                ->get()->first();

                //Get Wallet Balance
                $currentAmount=0;
                if ($user->main_wallet==null) {
                    $currentAmount=0;
                } else {
                    $currentAmount=$user->main_wallet;
                }
                $balance=$currentAmount + $creditAmount;


                //Save Wallet
                $userInfo=UserInfo::where('user_id', $userInvest->user_id)->firstOrFail();
                $userInfo->main_wallet=$currentAmount + $creditAmount;
              // dd($userInfo);
                $userInfo->update();


                //Save Activity Wed, Nov 10, 2021 1:00 AM  Carbon::now()->toDayDateTimeString()
                $activity=new Activities;
                $activity->title="Daily Earning";
                $activity->user_id=$userInvest->user_id;
                $activity->user_investments_id=$userInvest->investment_id;
                $activity->investment_packages_id=$userInvest->package_id;
                $activity->category="earning";
                $activity->date=Carbon::now()->toDayDateTimeString();
                $activity->amount=$creditAmount;
                $activity->descp="Credited $$creditAmount interest of  $package->name";
                $activity->save();
            }

            return ["response"=>"Week earning Done"];
        }

    }
}
