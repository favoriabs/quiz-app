<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Auth\AuthContract;
use App\User;

class AuthController extends Controller
{
    public $repo;

    public function __construct(AuthContract $authContract)
    {
        $this->repo = $authContract;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['status' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['status' => 'could_not_create_token'], 500);
        }

        return response()->json(['status' => 'success', 'token' => compact('token')]);

    }

    public function register(Request $request)
    {
        $this->validate($request, [
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required',
          'password' => 'required',
          'profile_picture' => 'required',
        ]);

        $user = $this->repo->create($request)

        try {
            if ($user){
              return response()->json([
                'code' => '100',
                'user' => $user,
                'msg' => 'user created successfully'
              ]);
            }
        } catch (Exception $e) {
            return response()->json([
              'code' => '-500',
              'msg' => $e
            ]);
        }

    }

    public function redirectToProvider($provider)
    {
        return Socialite::with($provider)->stateless()->redirect()->getTargetUrl();
    }

    public function handleProviderCallback($provider){

       $providerUser = Socialite::driver($provider)->stateless()->user();
       $authUser = $this->repo->createFromSocial($providerUser, $provider);
       $token = JWTAuth::fromUser($authUser);

       return response()->json([
         'code' => '100',
         'token' => $token
       ]);

  }
}
