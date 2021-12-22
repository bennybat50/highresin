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
use App\Models\Reinvest;
use App\Models\Messages;
use GuzzleHttp\Client;
use App\Models\Activities;
use App\Models\Withdrawal_Methods;
use Carbon\Carbon;
use \Datetime;
use App\Models\Referrals;
use App\Mail\UserRegisteredMail;
use Mail;

class ActivatePortfolios extends Controller
{

     public function index()
    {

   $investments= User::join('user_investments', 'user_investments.user_id', '=', 'users.id')
   ->join('investment_packages', 'investment_packages.id', '=', 'user_investments.investment_packages_id')
   ->where('user_investments.status','pending')
   ->get(['users.name as username','users.email','users.id as user_id', 'investment_packages.name as packagename',
   'investment_packages.id as package_id','user_investments.date',
   'user_investments.id as investment_id','user_investments.end_date','investment_packages.category_name',
   'user_investments.amount','user_investments.returns', 'investment_packages.duration', 'user_investments.payout',
   'user_investments.active','user_investments.status','user_investments.txn_id', ]);

   $usersInvestments=[];

   for ($i=0; $i < count($investments); $i++) {
       //$investments[$i]['end_date']

           $d1 = strtotime(Carbon::now()->toDayDateTimeString());
           $d2 = strtotime($investments[$i]['end_date']);
           $totalSecondsDiff = abs($d1-$d2);
           $totalDaysDiff  =intval(round($totalSecondsDiff/60/60/24));
           if ($d1 < $d2) {
               $dayLeft=100;
               if ($totalDaysDiff < 100) {
                   $dayLeft=$totalDaysDiff;
               }
               $data= ['days'=>$totalDaysDiff,'daysLeft'=>$dayLeft,'username'=>$investments[$i]['username'], 'user_id'=>$investments[$i]['user_id'],'email'=>$investments[$i]['email'],
               'packagename'=>$investments[$i]['packagename'],'category_name'=>$investments[$i]['category_name'],'date'=>$investments[$i]['date'],
               'amount'=>$investments[$i]['amount'],'returns'=>$investments[$i]['returns'],'duration'=>$investments[$i]['duration'],
               'payout'=>$investments[$i]['payout'],'active'=>$investments[$i]['active'],'investment_id'=>$investments[$i]['investment_id'],
               'package_id'=>$investments[$i]['package_id'],'status'=>$investments[$i]['status'],'txn_id'=>$investments[$i]['txn_id'], ];
               array_push($usersInvestments, (object)$data);
           }


           $user = DB::table('users')
           ->join('user_infos','users.id',"=", 'user_infos.user_id')
           ->where('users.id',$investments[$i]['user_id'])
           ->get()->first();

       //Check Payment Status
        $amount=$investments[$i]['amount'];
        $packagename=$investments[$i]['packagename'];
        $monthCount=$investments[$i]['duration'];
       $thisInvestment=UsersInvestments::findOrFail($investments[$i]['investment_id']);
       if($investments[$i]['status']=="pending"){
           $txn_id=$investments[$i]['txn_id'];
           $key=env('PLISIO_SECRET_KEY');
           try {
               $client=new Client(['verify' => false]);
               $request=$client->get("https://plisio.net/api/v1/operations/$txn_id?api_key=$key");
               $response = json_decode($request->getBody());
               //dd($response);
               if($response->status=="success" ){
                   $transact=$response->data;
                   if($transact->status=="pending" || $transact->status=="new"){
                       $investments[$i]['status']="pending";
                       $thisInvestment->status="pending";

                   } else if($transact->status=="completed" || $transact->status=="mismatch"){
                       $investments[$i]['status']="completed";
                       $thisInvestment->status="completed";
                       $thisInvestment->active=true;
                       $thisInvestment->duration=$monthCount;
                       $thisInvestment->date=Carbon::now()->toDayDateTimeString();
                       $thisInvestment->end_date= date('Y-m-d', strtotime("+$monthCount months", strtotime(Carbon::now()->toDayDateTimeString())));

                       //Save Investment
                       //Save Activity

                       $activity=new Activities;
                       $activity->title="Investment initialized";
                       $activity->user_id=$investments[$i]['user_id'];
                       $activity->user_investments_id=$investments[$i]['investment_id'];
                       $activity->investment_packages_id=$investments[$i]['package_id'];
                       $activity->category="deposit";
                       $activity->date=Carbon::now()->toDayDateTimeString();
                       $activity->amount=$amount;
                       $activity->descp="Deposit of $$amount made for $packagename";
                       //dd($activity);

                      $activity->save();
                       //dd("Enter Here");

                       //Send Mails $user->email
                       Mail::to($user->email)->send(new UserRegisteredMail([
                       'subject'=>'Congratulations on your Portfolio Purchase',
                       'title' => "Congratulations {$user->name} {$user->last_name}",
                       'url' => "https://palmalliance.com/user/user-investments",
                       'descp' => "We are delighted to inform you that your portfolio purchase of $packagename
                       has been received successfully. Your Investor account will be activated shortly.
                        This is the best step you could possibly take toward regaining control of your financial life.
                        Our key Goal is providing efficient and reliable financial services to our clients.
                         We very much admire your shrewdness in taking this decisive action now. There is every reason to believe you are on your way to the top!",
                       'action-text'=>'Client Access',
                       'img'=>'assets/images/emails/investment-banner.jpg'
                   ]));


                   //Send Admin Mail  chizi.tech99@gmail.com
                   Mail::to("chizi.tech99@gmail.com")->send(new UserRegisteredMail([
                       'subject'=>'Portfolio Payment',
                       'title' => "Hi Admin",
                       'url' => "https://palmalliance.com/admin/users-investments",
                       'descp' => "A user just successfully made payment $packagename on Palmalliance.
                        These are the user details.... NAME: $user->name $user->last_name, EMAIL: $user->email, PHONE: $user->phone, AMOUNT: $$amount.....
                        Please Login to view investments",
                       'action-text'=>'Vew Investments',
                       'img'=>'assets/images/emails/Palm-Alliance-Management-Building.jpg'
                   ]));
                  //dd($user);


                  //Check Referal
                  if($user->referred_by!=null && $user->referred_by!=""){
                       //Save Activity
                       $referredUser = DB::table('users')
                       ->join('user_infos','users.id',"=", 'user_infos.user_id')
                       ->where('users.id',$user->referred_by)
                       ->get()->first();
                       //dd($referredUser);
                       if($referredUser!=null){
                           $bonusAmount=$amount*0.10;

                        //Get Wallet Balance
                        $currentAmount=0;
                        if ($referredUser->main_wallet==null) {
                            $currentAmount=0;
                        } else {
                            $currentAmount=$referredUser->main_wallet;
                        }

                        //Save Wallet
                        $userInfo=UserInfo::where('user_id', $user->referred_by)->firstOrFail();
                        $userInfo->main_wallet=$currentAmount + $bonusAmount;
                        // dd($userInfo);
                        $userInfo->update();

                       //Save Activity
                       $activity=new Activities;
                       $activity->title="Referral Bonus";
                       $activity->user_id=$referredUser->user_id;
                       $activity->category="bonus";
                       $activity->date=Carbon::now()->toDayDateTimeString();
                       $activity->amount=$bonusAmount;
                       $activity->descp="Credited 10% - $$bonusAmount as referral bonus";
                       $activity->save();

                       // $referredUser->email

                       Mail::to($referredUser->email)->send(new UserRegisteredMail([
                           'subject'=>'Members Benefit Commissions',
                           'title' => "Hi $referredUser->name $referredUser->last_name ",
                           'url' => "https://palmalliance.com/user/referred-users",
                           'descp' => "We are delighted to inform you that your partner in your members benefit programme has Purchased a portfolio successfully. Their transaction will be processed and are certainly in order. They will have their account functioning in no time! Thank you for participating in our MEMBER'S BENEFIT Programme and building your team with us!!........For more information, visit our online support page or leave us a message—support@palmalliance.com",
                           'action-text'=>'Client Access',
                           'img'=>'assets/images/emails/first-referal-banner.jpg'
                       ]));
                       }
                  }

                   }else if($transact->status=="expired"){
                       $investments[$i]['status']="expired";
                       $thisInvestment->status="expired";

                       //Save Activity
                       $activity=new Activities;
                       $activity->title="Transaction expired";
                       $activity->user_id=$investments[$i]['user_id'];
                       $activity->user_investments_id=$investments[$i]['investment_id'];
                       $activity->investment_packages_id=$investments[$i]['package_id'];
                       $activity->category="expired";
                       $activity->date=Carbon::now()->toDayDateTimeString();
                       $activity->amount=$amount;
                       $activity->descp="Deposit of $$amount made for $packagename has expired";
                       $activity->save();

                   }else if($transact->status=="error"){
                       $investments[$i]['status']="error";
                       $thisInvestment->status="error";

                       //Save Activity
                       $activity=new Activities;
                       $activity->title="Transaction Error";
                       $activity->user_id=$investments[$i]['user_id'];
                       $activity->user_investments_id=$investments[$i]['investment_id'];
                       $activity->investment_packages_id=$investments[$i]['package_id'];
                       $activity->category="error";
                       $activity->date=Carbon::now()->toDayDateTimeString();
                       $activity->amount=$amount;
                       $activity->descp="Deposit of $$amount made for $packagename encountered an error";
                       $activity->save();

                   }else if($transact->status=="cancelled"){
                       $investments[$i]['status']="cancelled";
                       $thisInvestment->status="cancelled";
                       //Save Activity
                       $activity=new Activities;
                       $activity->title="Transaction cancelled";
                       $activity->user_id=$investments[$i]['user_id'];
                       $activity->user_investments_id=$investments[$i]['investment_id'];
                       $activity->investment_packages_id=$investments[$i]['package_id'];
                       $activity->category="cancelled";
                       $activity->date=Carbon::now()->toDayDateTimeString();
                       $activity->amount=$amount;
                       $activity->descp="Deposit of $$amount made for $packagename was cancelled";
                       $activity->save();
                   }
                   //Update Investment
                   $thisInvestment->update();

               }else if($response->status=="error"){
                   $transact=$response->data;

               }


           } catch (\Exception $e) {

           }
       }

   }
    //For reinvestments

    $thisReinvestment=Reinvest::all()->where('status','pending');
    foreach ($thisReinvestment as $key => $thisReinvest) {
        $singleReinvest= Reinvest::findOrFail($thisReinvest->id);
        $thisInvestment=UsersInvestments::findOrFail($singleReinvest->user_investments_id);
        $package=Investment_Packages::findOrFail($thisInvestment->investment_packages_id);
        $packagename=$package->name;


        $user = DB::table('users')
           ->join('user_infos','users.id',"=", 'user_infos.user_id')
           ->where('users.id',$singleReinvest->user_id)
           ->get()->first();


        $transactionCompleted=false;
        $secretKey=env('PLISIO_SECRET_KEY');

        if( $thisReinvest->txn_id!=null){

            $client=new Client(['verify' => false]);
            $request=$client->get("https://plisio.net/api/v1/operations/$thisReinvest->txn_id?api_key=$secretKey");
            $response = json_decode($request->getBody());
            if($response->status=="success" ){

                $transact=$response->data;

                 if($transact->status=="completed" || $transact->status=="mismatch"){

                    $thisInvestment->amount=$singleReinvest->amount;
                    $thisInvestment->returns=$singleReinvest->returns;
                    $thisInvestment->status="completed";
                    $singleReinvest->status="completed";
                    $transactionCompleted=true;
                }
            }

        }else{
            $thisInvestment->amount=$singleReinvest->amount;
            $thisInvestment->returns=$singleReinvest->returns;
            $thisInvestment->status="completed";
            $singleReinvest->status="completed";
            $transactionCompleted=true;
        }


        if($transactionCompleted){
             //Save Activity
             $activity=new Activities;
             $activity->title="Reinvestment Successful";
             $activity->user_id=$singleReinvest->user_id;
             $activity->user_investments_id=$singleReinvest->user_investments_id;
             $activity->investment_packages_id=$thisInvestment->investment_packages_id;
             $activity->category="deposit";
             $activity->date=Carbon::now()->toDayDateTimeString();
             $activity->amount=$singleReinvest->amount;
             $activity->descp="Reinvestment of $$singleReinvest->amount on $packagename is successful";

            $activity->save();
             $thisInvestment->update();
             $singleReinvest->update();

             //$user->email
             Mail::to($user->email)->send(new UserRegisteredMail([
                'subject'=>'Reinvestment Successful',
                'title' => "Congratulations {$user->name} {$user->last_name}",
                'url' => "https://palmalliance.com/user/user-investments",
                'descp' => "We are delighted to inform you that your reinvestment into  $packagename portfolio
                has been received successfully.",
                'action-text'=>'Client Access',
                'img'=>'assets/images/emails/investment-banner.jpg'
            ]));


            //Send Admin Mail   chizi.tech99@gmail.com
            Mail::to("chizi.tech99@gmail.com")->send(new UserRegisteredMail([
                'subject'=>'Portfolio Payment',
                'title' => "Hi Admin",
                'url' => "https://palmalliance.com/admin/users-investments",
                'descp' => "A user just successfully reinvested in $packagename on Palmalliance.
                 These are the user details.... NAME: $user->name $user->last_name, EMAIL: $user->email, PHONE: $user->phone, AMOUNT: $$singleReinvest->amount .....
                 Please Login to view investments",
                'action-text'=>'Vew Investments',
                'img'=>'assets/images/emails/Palm-Alliance-Management-Building.jpg'
            ]));

        }else{

            $activity=new Activities;
            $activity->title="Reinvestment unsuccessful";
            $activity->user_id=$singleReinvest->user_id;
            $activity->user_investments_id=$singleReinvest->user_investments_id;
            $activity->investment_packages_id=$thisInvestment->investment_packages_id;
            $activity->category="error";
            $activity->date=Carbon::now()->toDayDateTimeString();
            $activity->amount=0;
            $activity->descp="Reinvestment of $$singleReinvest->amount encountered an error, please make reinvest again.";
            $thisInvestment->status="completed";
            $thisInvestment->update();
        }



    }

        return ["response"=>"Activation Successful"];

    }
}
