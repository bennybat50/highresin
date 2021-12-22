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
use App\Models\Activities;
use \Datetime;
use Carbon\Carbon;

class InvestmentsHistory extends Controller
{
    public function index(){
        $id = auth()->id();

        //Change Payout
        function getPayout($data)
            {
                switch ($data) {
                    case 'daily_payout':
                        return "Daily Payout";
                        break;
                    case 'monthly_payout':
                        return "Monthly Payout";
                    break;
                    case '6_months_compounding':
                        return "6 Months Compounding";
                    break;
                    case '7_months_compounding':
                        return "7 Months Compounding";
                    break;
                    case '8_months_compounding':
                        return "8 Months Compounding";
                    break;
                    case '9_months_compounding':
                        return "9 Months Compounding";
                    break;
                    case '10_months_compounding':
                        return "10 Months Compounding";
                    break;


                }
            }

        $user = DB::table('users')
        ->join('user_infos','users.id',"=", 'user_infos.user_id')
        ->where('users.id',$id)
        ->get()->first();

        $activities = DB::table('users')
        ->join('activities','users.id',"=", 'activities.user_id')
        ->where('activities.user_id',$id)
        ->orderBy('activities.id','DESC')
        ->get();

        $investments= User::join('user_investments', 'user_investments.user_id', '=', 'users.id')
        ->join('investment_packages', 'investment_packages.id', '=', 'user_investments.investment_packages_id')
        ->where('users.id',$id)
        ->orderBy('user_investments.id','DESC')
        ->get(['users.name as username','users.email', 'investment_packages.name as packagename', 'investment_packages.id as package_id','user_investments.date','user_investments.id as investment_id','user_investments.end_date','investment_packages.category_name',
        'user_investments.amount','user_investments.returns', 'user_investments.duration', 'user_investments.payout', 'user_investments.active','user_investments.status','user_investments.txn_id', ]);

        $usersInvestments=[];
        for ($i=0; $i < count($investments); $i++) {
            //$investments[$i]['end_date']
            $startDate=date('Y-m-d',strtotime($investments[$i]['date']));
            $d1 = strtotime(Carbon::now()->toDayDateTimeString());
            $d2 = strtotime($investments[$i]['end_date']);
            $totalSecondsDiff = abs($d1-$d2);
            $totalDaysDiff  =intval(round($totalSecondsDiff/60/60/24)) ;
            if($d1 > $d2){
                $dayLeft=100;
                if($totalDaysDiff < 100){
                    $dayLeft=$totalDaysDiff;
                }
                $data= ['days'=>$totalDaysDiff,'daysLeft'=>$dayLeft,'username'=>$investments[$i]['username'],'email'=>$investments[$i]['email'],'packagename'=>$investments[$i]['packagename'],'date'=>$startDate,'end_date'=>$investments[$i]['end_date'],'amount'=>$investments[$i]['amount'],'returns'=>$investments[$i]['returns'],'duration'=>$investments[$i]['duration'],'payout'=>getPayout($investments[$i]['payout']),'active'=>$investments[$i]['active'],'investment_id'=>$investments[$i]['investment_id'],'category_name'=>$investments[$i]['category_name'] ];
                array_push($usersInvestments,(object)$data);

            };


        };

        return view('user.investment-history',[ 'user'=>$user,'user_id'=>$id,'activities'=>$activities, 'page_title'=>"All Investment History", 'investments'=>$usersInvestments,'username'=>$user->name]);
    }
}
