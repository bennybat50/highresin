<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserInfo;
use App\Models\User;
use App\Models\Referrals;
use App\Models\Investment_Packages;
use App\Models\UsersInvestments;

class ReferredUsers extends Controller
{
    public function index(){
        $id = auth()->id();
        //Join user table and userinfos table together
        $user = DB::table('users')
        ->join('user_infos','users.id',"=", 'user_infos.user_id')
        ->where('users.id',$id)
        ->get()->first();


        $referrals = DB::table('users')->join('referrals','users.id',"=", 'referrals.user_id')->where('users.id',$id)->orderBy('referrals.id','DESC')->get();

        $sortedReferrals=[];
        foreach ($referrals as $key => $ref_user) {
            $aUser = DB::table('users')
            ->join('user_infos','users.id',"=", 'user_infos.user_id')
            ->where('users.id',$ref_user->referred_user_id)
            ->get()->first();
            if($aUser!=null){
                $investments= User::join('user_investments', 'user_investments.user_id', '=', 'users.id')
                ->join('investment_packages', 'investment_packages.id', '=', 'user_investments.investment_packages_id')
                ->where('users.id',$ref_user->referred_user_id)->get();

                if(count($investments)>0){
                    $aUser->invested=true;

                }else{
                    $aUser->invested=false;
                }
                array_push($sortedReferrals,(object)$aUser);
            }
        }
        return view('user.referred-users',['user'=>$user, 'referrals'=>$sortedReferrals, 'user_id'=>$id, 'page_title'=>" ", 'username'=>$user->name, 'referral_code'=>$user->referalcode,]);
    }
}
