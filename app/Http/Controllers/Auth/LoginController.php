<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        // Get facebook user details
        $facebook_user = Socialite::driver('facebook')->fields([
            'name', 'first_name', 'last_name', 'email', 'gender', 'age_range', 'locale', 'cover',
        ])->scopes([
            'email', 'public_profile', 'user_friends',
        ])->user();
        dd($facebook_user);
        $user = User::whereEmail($facebook_user->getEmail())->first();

        // Login the user and remember
        if ($user) {
            $user->avatar = $facebook_user->avatar_original;
            $user->save();
            Auth::login($user, true);
            return redirect('home');
        }
        return redirect('login');
    }
}
