<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')
            ->with(['redirect_uri' => url('register/facebook/callback')])
            ->redirect();
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
        // Get the user if we have them already
        $user = User::whereEmail($facebook_user->getEmail())->first();
        if ($user) {
            // Login the user
            Auth::login($user, true);
            return redirect('home');
        }

        // Otherwise create them now with a random password
        return $created = User::create([
            'name' => $facebook_user->getName(),
            'email' => $facebook_user->getEmail(),
            'avatar' => $facebook_user->avatar_original,
            'password' => bcrypt($data['password']),
        ]);
    }
}
