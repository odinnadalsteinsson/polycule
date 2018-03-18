<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Bouncer;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Spatie\Tags\Tag;
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
            $user = new User();
            $user->name = $facebook_user->getName();
            $user->email = $facebook_user->getEmail();
            $user->avatar = $facebook_user->avatar_original;
            $user->password = bcrypt(str_random());
            $user->save();
        }

        // Login and go to the profile home page
        Auth::login($user, true);
        if ($user->email == 'odinn@adalsteinsson.com') {
            Bouncer::assign('admin')->to($user);
            $gender = Tag::findOrCreate('Mand', 'gender');
            $user->attachTag($gender);
            $status = Tag::findOrCreate('I ét forhold', 'relationship-status');
            $user->attachTag($status);

        }
        return redirect('users/' . $user->id);
    }
}
