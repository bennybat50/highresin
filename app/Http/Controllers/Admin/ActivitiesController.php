<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserInfo;
use App\Models\User;
use App\Models\Investment_Packages;
use App\Models\UsersInvestments;
use App\Models\Activities;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ActivitiesController extends Controller
{
    public function index(Request $request)
    {
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
        $activities=null;
        $pageName="System Activites";


        if($request['user_id']==null){
            $activities = Activities::orderBy('activities.id','DESC')->get();
            foreach ($activities as $key => $activity) {
                $activity->name = getReferredUser($activity->user_id);
            }
        }else{

            $activities =DB::table('users')
            ->join('activities','users.id',"=", 'activities.user_id')
            ->where('activities.user_id',$request['user_id'])
            ->orderBy('activities.id','DESC')
            ->get();

            $userName=getReferredUser($request['user_id']);
            $pageName="$userName Activites";

        }

        return view('admin.activities',['activities'=>$activities,'page_title'=>$pageName]
        );
    }
}
