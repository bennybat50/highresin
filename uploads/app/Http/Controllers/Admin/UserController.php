<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\UserInfo;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use App\Models\Role;
use App\Mail\UserRegisteredMail;
use Mail;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        function getReferredUser($id)
        {
            $user = DB::table('users')
            ->join('user_infos','users.id',"=", 'user_infos.user_id')
            ->where('users.id',$id)
            ->get()->first();
            if($user!=null){
                return  ["name"=>"$user->name $user->last_name", "email"=>$user->email];
            }
            return  ["name"=>"", "email"=>""];

        }
        if(Gate::denies('logged-in')){
            dd('no user allowed');
        };

        if(Gate::allows('is-admin')){
            $users=  DB::table('users')->join('user_infos','users.id',"=", 'user_infos.user_id')->orderBy('users.id','DESC')->get();

            foreach ($users as $key => $user) {
                $user->referred_user = getReferredUser($user->referred_by);
            }

            return view('admin.users.index',
            [
                'users'=>$users,
                'page_title'=>"All Users"
                ]);
            };
            dd('You need to be an admin');


    }

    public function paginate($items, $perPage = 10, $page = null )
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => url('admin/users')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['roles'=>Role::all(), 'page_title'=>"Create User"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreUserRequest $request)
    {
        //$validatedData=$request->validated();
        //$user=User::create($validatedData);

        $newUser=new CreateNewUser();
        $user=$newUser->create($request->all());
        //$user=$newUser->create($request->only(['name','email','password','password_confirmation']));

        $user->roles()->sync($request->roles);
       // Password::sendResetLink($request->only(['email']));
        $request->session()->flash('success','You have created this user');
        return redirect(route('admin.users.index'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {

        return view('admin.users.edit', [
            'roles'=>Role::all(),
            'page_title'=>"Update User",
            'user'=>User::find($id),

            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $userInfo=UserInfo::where('user_id', $id)->firstOrFail();
        $user=User::findOrFail($id);

        if($request['verify']){
            $user->email_verified_at=Carbon::now()->toDayDateTimeString();
            $user->update();
            $request->session()->flash('success','Account  Verified');
        }

        if($request['upline_update']){
            $userInfo->referred_by=$request['upline_id'];
            $userInfo->update();
            $request->session()->flash('success','Upline updated');
        }

        if($request['approve']){
            $userInfo->blocked="approved";
            $userInfo->update();
            Mail::to($user->email)->send(new UserRegisteredMail([
                'subject'=>'Welcome to Palm Alliance Management!',
                'title' => "Welcome {$user->name}",
                'url' => "{{ $request->getSchemeAndHttpHost() }}/user/dashboard",
                'descp' => 'We pride ourselves on serving our clients to the best of our potential and hope that this newfound relationship with you grows by the day.
                 We want to thank you for giving us the opportunity to be able to work with you. We believe that together we can achieve so much more and will continue to serve you.
                 In case of any concerns, feel free to contact us. Even if you’re not sure where to start, We’ll guide you every step of the way.  ',
                'action-text'=>'Client Access',
                'img'=>'assets/images/emails/welcome-banner.jpg'
            ]));

        }else if($request['open']){
            $userInfo->blocked="opened";
            $userInfo->update();

        }else if($request['block']){
            $userInfo->blocked="blocked";
            $userInfo->update();
        }else{
            $user=User::findOrFail($id);
            if(!$user){
                $request->session()->flash('error','Could not find user');
                return redirect(route('admin.users.index'));
            }
            $user->update($request->except(['_token', 'roles']));
            $user->roles()->sync($request->roles);
        }

        $request->session()->flash('success','You have updated this user');
        return redirect(route('admin.users.index'));

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        User::destroy($id);
        $request->session()->flash('success','You have deleted this user');
        return redirect(route('admin.users.index'));
    }
}
