<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();
            if ($isUser) {
                \Auth::login($isUser);

                return redirect('/home');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123'),
                ]);

                \Auth::login($createUser);

                return redirect('/dashboard');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
