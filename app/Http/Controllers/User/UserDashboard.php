<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
class UserDashboard extends Controller
{


    public function index(Request $main_request){


        $news=null;
        try {
            $client=new Client(['verify' => false]);
            //$request=$client->get('https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=15a89f301f0145f8bca1b3241d320faa');
            $articles = json_decode($request->getBody());
            $news=$articles->articles;

          } catch (\Exception $e) {
            $path=public_path('news.json');
            // $news = Storage::get($path);
            $news = json_decode(file_get_contents($path));
            $news=$news->articles;
          }


          $id = auth()->id();
          //Join user table and userinfos table together
          $user = DB::table('users')
          ->join('user_infos','users.id',"=", 'user_infos.user_id')
          ->where('users.id',$id)
          ->get()->first();


          $investments= User::join('user_investments', 'user_investments.user_id', '=', 'users.id')
          ->join('investment_packages', 'investment_packages.id', '=', 'user_investments.investment_packages_id')
          ->where('users.id',$id)
          ->where('user_investments.status',"completed")
          ->orderBy('user_investments.id','DESC')
          ->get(['users.name as username','users.email', 'investment_packages.name as packagename', 'investment_packages.id as package_id','user_investments.date','user_investments.id as user_investments_id','user_investments.end_date','investment_packages.category_name',
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
                  $data= ['days'=>$totalDaysDiff,'daysLeft'=>$dayLeft,'username'=>$investments[$i]['username'],'email'=>$investments[$i]['email'],'packagename'=>$investments[$i]['packagename'],'category_name'=>$investments[$i]['category_name'],'date'=>$investments[$i]['date'],'amount'=>$investments[$i]['amount'],'returns'=>$investments[$i]['returns'],'duration'=>$investments[$i]['duration'],'active'=>$investments[$i]['active'],'user_investments_id'=>$investments[$i]['user_investments_id'],'package_id'=>$investments[$i]['package_id'],'status'=>$investments[$i]['status'],'txn_id'=>$investments[$i]['txn_id'], ];
                  array_push($usersInvestments, (object)$data);
              }
          }

        $totalCapital=0;
            foreach($usersInvestments as $invest){
                $totalCapital= $totalCapital+$invest->amount;
            }
        $messages = Messages::where('owner',"0")->orWhere('user_id',$id)-> orderBy('id','DESC')->get();

        $activities = DB::table('users')
        ->join('activities','users.id',"=", 'activities.user_id')
        ->where('activities.user_id',$id)
        ->orderBy('activities.id','DESC')
        ->get();

        // Recent Messages
        $recentMessages=[];
        if(count($messages)<=3){
            for ($i=0; $i < count($messages); $i++) {
                array_push($recentMessages,(object)$messages[$i]);
            }
        }else if(count($messages)>3){
            for ($i=0; $i < 3; $i++) {
                array_push($recentMessages,(object)$messages[$i]);
            }
        }

        // Recent Investments
        $recentInvestments=[];
        if(count($usersInvestments)<=4){
            for ($i=0; $i < count($usersInvestments); $i++) {
                array_push($recentInvestments,(object)$usersInvestments[$i]);
            }
        }else if(count($usersInvestments)>4){
            for ($i=0; $i < 4; $i++) {
                array_push($recentInvestments,(object)$usersInvestments[$i]);
            }
        }

        // Recent Activities
        $recentActivities=[];
        if(count($activities)<=5){
            for ($i=0; $i < count($activities); $i++) {
                array_push($recentActivities,(object)$activities[$i]);
            }
        }else if(count($activities)>5){
            for ($i=0; $i < 5; $i++) {
                array_push($recentActivities,(object)$activities[$i]);
            }
        }


        //Get Accumulated Dividends
        $userEarnings = DB::table('users')
        ->join('activities','users.id',"=", 'activities.user_id')
        ->where('activities.user_id',$id)
        ->where('category', 'LIKE', '%earning%')
        ->get();

        $userBonus = DB::table('users')
        ->join('activities','users.id',"=", 'activities.user_id')
        ->where('activities.user_id',$id)
        ->where('category', 'LIKE', '%bonus%')
        ->get();

        $accumulatedDevidends=0;

        foreach ($userEarnings as $key => $earned) {
            $accumulatedDevidends= $accumulatedDevidends + $earned->amount;
        }

        $accumulatedBonus=0;
        foreach ($userBonus as $key => $bonus) {
            $accumulatedBonus= $accumulatedBonus + $bonus->amount;
            $accumulatedDevidends=$accumulatedDevidends+$accumulatedBonus;
        }


        $withdrawMethods = Withdrawal_Methods::all();
        $referrals= Referrals::all()->where('user_id',$id);

        $dailyCredited =null;

       $day= date("D",strtotime(Carbon::now()->toDayDateTimeString()));

        switch ($day) {
            case 'Mon':
                $dailyCredited = [];
                foreach ($recentInvestments as $key => $recInv) {
                    array_push($dailyCredited,(object)[ 'invest_id'=>$recInv->user_investments_id,'invest_name'=>"$recInv->packagename ($$recInv->amount)",
                        "dailys"=> [
                        ['day'=>"Monday",  'amount'=>$recInv->returns,'status'=>true, ],
                    ]]);
                }

                break;
            case 'Tue':
                $dailyCredited = [];
                foreach ($recentInvestments as $key => $recInv) {
                    array_push($dailyCredited,(object)[ 'invest_id'=>$recInv->user_investments_id,'invest_name'=>"$recInv->packagename ($$recInv->amount)",
                        "dailys"=> [
                        ['day'=>"Monday",  'amount'=>$recInv->returns,'status'=>true, ],
                        [ 'day'=>"Tuesday", 'amount'=>$recInv->returns,'status'=>true,],
                    ]]);
                }
                break;
            case 'Wed':
                $dailyCredited = [];
                foreach ($recentInvestments as $key => $recInv) {
                    array_push($dailyCredited,(object)[ 'invest_id'=>$recInv->user_investments_id,'invest_name'=>"$recInv->packagename ($$recInv->amount)",
                        "dailys"=> [
                        ['day'=>"Monday",  'amount'=>$recInv->returns,'status'=>true, ],
                        [ 'day'=>"Tuesday", 'amount'=>$recInv->returns,'status'=>true,],
                        [ 'day'=>"Wednesday", 'amount'=>$recInv->returns,'status'=>true,],
                    ]]);
                }
                break;
            case 'Thu':
                $dailyCredited = [];
                foreach ($recentInvestments as $key => $recInv) {
                    array_push($dailyCredited,(object)[ 'invest_id'=>$recInv->user_investments_id,'invest_name'=>"$recInv->packagename ($$recInv->amount)",
                        "dailys"=> [
                        ['day'=>"Monday",  'amount'=>$recInv->returns,'status'=>true, ],
                        [ 'day'=>"Tuesday", 'amount'=>$recInv->returns,'status'=>true,],
                        [ 'day'=>"Wednesday", 'amount'=>$recInv->returns,'status'=>true,],
                        [ 'day'=>"Thursday",'amount'=>$recInv->returns,'status'=>true,],
                    ]]);
                }
                break;
            case 'Fri':
                $dailyCredited = [];
                foreach ($recentInvestments as $key => $recInv) {
                    array_push($dailyCredited,(object)[ 'invest_id'=>$recInv->user_investments_id,'invest_name'=>"$recInv->packagename ($$recInv->amount)",
                        "dailys"=> [
                        ['day'=>"Monday",  'amount'=>$recInv->returns,'status'=>true, ],
                        [ 'day'=>"Tuesday", 'amount'=>$recInv->returns,'status'=>true,],
                        [ 'day'=>"Wednesday", 'amount'=>$recInv->returns,'status'=>true,],
                        [ 'day'=>"Thursday",'amount'=>$recInv->returns,'status'=>true,],
                        ['day'=>"Friday",  'amount'=>$recInv->returns,'status'=>true,],
                    ]]);
                }
                break;
            default:
            $dailyCredited = [];
            foreach ($recentInvestments as $key => $recInv) {
                array_push($dailyCredited,(object)[ 'invest_id'=>$recInv->user_investments_id,'invest_name'=>"$recInv->packagename ($$recInv->amount)",
                    "dailys"=> [
                    ['day'=>"Monday",  'amount'=>$recInv->returns,'status'=>false, ],
                    [ 'day'=>"Tuesday", 'amount'=>$recInv->returns,'status'=>false,],
                    [ 'day'=>"Wednesday", 'amount'=>$recInv->returns,'status'=>false,],
                    [ 'day'=>"Thursday",'amount'=>$recInv->returns,'status'=>false,],
                    ['day'=>"Friday",  'amount'=>$recInv->returns,'status'=>false,],
                ]]);
            }
                break;
        }
        //dd($recentInvestments);

          return view('user.dashboard',[
              'page_title'=>"Dashboard",
              'user'=>$user,
              'user_id'=>$id,
              'activities'=>$recentActivities,
              'accumulatedDevidends'=>$accumulatedDevidends,
              'wallet_balance'=>$user->main_wallet,
              'messages'=>$recentMessages,
              'main_wallet'=>$user->main_wallet,
              'compound_wallet'=>$user->compound_wallet,
              'username'=>$user->name,
              'accumulatedBonus'=>$accumulatedBonus,
              'withdrawMethods'=>$withdrawMethods,
              'invested_capital'=>$totalCapital,
              'investment_count'=>count($usersInvestments),
              'recent_investments'=>$recentInvestments,
              'all_investments'=>$usersInvestments,
              'dailyCredited'=>$dailyCredited,
              'referrals'=>$referrals,
              
              'news'=>$news ]);

    }
}
