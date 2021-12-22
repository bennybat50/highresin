<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Investment_Packages;
use App\Models\UsersInvestments;
class UserInvestmentsController extends Controller
{
    public function index(Request $request){
        function getReferredUser($id)
        {
            $user = DB::table('users')
            ->join('user_infos','users.id',"=", 'user_infos.user_id')
            ->where('users.id',$id)
            ->get()->first();
            if($user!=null){
                return  "$user->name $user->last_name";
            }
            return  "";

        }

        $investments=null;
        $pageName="Investment History";
        if ($request['user_id']==null) {
            $investments = User::join('user_investments', 'user_investments.user_id', '=', 'users.id')
        ->join('investment_packages', 'investment_packages.id', '=', 'user_investments.investment_packages_id')
        ->orderBy('user_investments.id', 'DESC')
        ->get(['user_investments.id','users.name as username','users.email', 'investment_packages.name as packagename','user_investments.date',
                'user_investments.amount','user_investments.returns', 'user_investments.duration', 'user_investments.payout','user_investments.status', 'user_investments.active', ]);
        }else{
            $investments = User::join('user_investments', 'user_investments.user_id', '=', 'users.id')
        ->join('investment_packages', 'investment_packages.id', '=', 'user_investments.investment_packages_id')
        ->where('users.id',$request['user_id'])
        ->orderBy('user_investments.id', 'DESC')
        ->get(['user_investments.id','users.name as username','users.email', 'investment_packages.name as packagename','user_investments.date',
                'user_investments.amount','user_investments.returns', 'user_investments.duration', 'user_investments.payout','user_investments.status', 'user_investments.active', ]);
                $userName=getReferredUser($request['user_id']);
                $pageName="$userName Investments";
        }


        return view('admin.invest.user-investments',
        [
        'investments'=>$investments,
        'page_title'=>$pageName
    ]);
    }

}
