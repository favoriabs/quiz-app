<?php

namespace App\Repositories\Auht;

use App\Repositories\Auth\AuthContract;
use App\User;

class EloquentAuthRepository implements AuthContract
{
    public function create($request)
    {
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->profile_picture = $request->profile_picture;
        $user->save();
        return $user;
    }

    public function createFromSocial($request)
    {
        $authUser = User::where('provider_id', $user->id)->where('provider', $provider)->first();

         if ($authUser) {
             return $authUser;
         }else{
             $user = User::create([
                 'name'     => $user->name,
                 'email'    => $user->email,
                 'provider' => $provider,
                 'provider_id' => $user->id
             ]);
           }
           return $user;
         }
    }
}
