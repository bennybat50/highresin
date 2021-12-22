<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use App\Models\Referrals;
use Carbon\Carbon;
use App\Models\Activities;
use Laravel\Fortify\Fortify;
use App\Models\UserInfo;
use File;
use App\Mail\UserRegisteredMail;
use Mail;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function toResponse($request)
    {

        $userInfo=UserInfo::where('user_id',auth()->id())->firstOrFail();
        $userInfo->last_name=$request->lastName;
        $userInfo->phone=$request->phone;
        $userInfo->main_wallet=0;
        $userInfo->compound_wallet=0;


        if($request->file('image')!=null){
            //dd($request);
            $imageName=time().'.'.$request->image->extension();
            $path = $request->image->move(public_path('uploads'), $imageName);
            $userInfo->kyc=$imageName;
        }


        $refere=new Referrals;
        if($request->referral_id!=null){
            $refere->user_id=$request->referral_id;
            $refere->referred_user_id=auth()->id();
            $refere->date=Carbon::now()->toDayDateTimeString();
            $refere->invested=false;
            $refere->save();

            $referredUser = DB::table('users')
            ->join('user_infos','users.id',"=", 'user_infos.user_id')
            ->where('users.id',$request->referral_id)
            ->get()->first();

            $userInfo->referred_by=$request->referral_id;

            Mail::to($referredUser->email)->send(new UserRegisteredMail([
                'subject'=>'Members Benefit Programme',
                'title' => "Hi $referredUser->name $referredUser->last_name ",
                'url' => "{$request->getSchemeAndHttpHost()}/user/referred-users",
                'descp' => 'We are pleased to inform you that your referral has successfully registered through your members benefit programme. All commissions and referral bonuses will be processed accordingly. Our different levels are as follows; ( 10%- 1ST LEVEL, 5%- 2ND LEVEL, 2.5%- 3RD LEVEL ). All registered partners must have an active investment portfolio before commissions are disbursed to the various referee respectively.
                Kindly confirm all wallet address before transactions are being carried out. Thank your for choosing Palm Alliance Management. For more information visit our Customer fulfilment Centre or leave us a message at support@palmalliance.com',
                'action-text'=>'Client Access',
                'img'=>'assets/images/emails/first-referal-banner.jpg'
            ]));

        }
        $userInfo->update();

        //Send Admin Mail
        Mail::to("chizi.tech99@gmail.com")->send(new UserRegisteredMail([
            'subject'=>'New user registration',
            'title' => "Hi Admin",
            'url' => "{$request->getSchemeAndHttpHost()}/admin/users",
            'descp' => "A new user just registered on Palmalliance. These are the few information about the user.... NAME: {$request->name} {$request->lastName}, EMAIL: {$request->email}, PHONE: {$request->phone}..... Please Login to approve the account",
            'action-text'=>'Login Here',
            'img'=>'assets/images/emails/Palm-Alliance-Management-Building.jpg'
        ]));

        return $request->wantsJson()
        ? new JsonResponse('', 201)
        : redirect('user/dashboard');

    }
}
