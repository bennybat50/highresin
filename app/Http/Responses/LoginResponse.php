<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Fortify;
use App\Models\Role;
use App\Models\User;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        if($request['email']=="admin1@test.com"){
            //return  redirect('admin/dashboard');
            return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect('admin/dashboard');
        }else{
            //return  redirect('user/dashboard');
            return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect('user/dashboard');
        }

    }
}
