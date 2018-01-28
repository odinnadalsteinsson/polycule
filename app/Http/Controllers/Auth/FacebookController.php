<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Socialite;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        // Deal with user not accepting facebook login
        if (Input::get('error') == 'access_denied') {
            return redirect('login');
        }

        // Get facebook user details
        $facebook_user = Socialite::driver('facebook')->user();

        // Get or create the user
        $user = User::whereEmail($facebook_user->getEmail())->first();
        if ($user) {
            $user->avatar = $facebook_user->avatar_original;
            $user->save();
        } else {
            User::create([
                'name' => $facebook_user->getName(),
                'email' => $facebook_user->getEmail(),
                'avatar' => $facebook_user->avatar_original,
                'password' => bcrypt(str_random()),
            ]);
        }

        // Login and go to the profile home page
        Auth::login($user, true);
        return redirect('home');
    }
}
