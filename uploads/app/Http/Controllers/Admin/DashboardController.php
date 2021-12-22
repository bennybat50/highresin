<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\UserInfo;
use App\Models\WithdrawalRequests;
use App\Models\Payment_Method;
use App\Models\Investment_Packages;
use App\Models\UsersInvestments;

class DashboardController extends Controller
{
    public function index(){
        $users=  DB::table('users')->join('user_infos','users.id',"=", 'user_infos.user_id')->get();
        $request=WithdrawalRequests::all();
        $payment_methods= Payment_Method::all();
        $packages = Investment_Packages::all();
        $userInvestments=UsersInvestments::all();

        $blockedUsers=0;

        foreach ($users as $key => $user) {
            if($user->blocked=="blocked"){
                $blockedUsers=$blockedUsers+1;
            }
        }

        $totalInvested=0;
        foreach ($userInvestments as $key => $invest) {
            $totalInvested=$totalInvested+$invest->amount;
        }

        $totalWithdrawn=0;
        foreach ($request as $key => $req) {
            $totalWithdrawn=$totalWithdrawn+$req->amount_credited;
        }


        return view('admin.dashboard',
        [
        'users'=>count($users),
        'withdrawals'=>count($request),
        'payment_methods'=>count($payment_methods),
        'packages'=>count($packages),
        'totalInvested'=>$totalInvested,
        'blockedUsers'=>$blockedUsers,
        'totalWithdrawn'=>$totalWithdrawn,
        'page_title'=>"Dashboard"
    ]);
    }
}
