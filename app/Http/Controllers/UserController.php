<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Newsletter;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->email != 'odinn@adalsteinsson.com') {
            return redirect('/');
        }

        View::share('jumbotron', false);
        $users = User::paginate(10);
        return view('users/index', [ 'users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function import()
    {
        $members = Newsletter::getMembers('subscribers', [ 'count' => 10000 ]);
        foreach ($members['members'] as $member) {
            $user = User::where('email', $member['email_address'])->first();
            if (!$user) {
                $user = new User;
                $user->email = $member['email_address'];
                $user->name = trim($member['merge_fields']['FNAME'] . ' ' . $member['merge_fields']['LNAME']);
                $user->password = bcrypt(str_random(64));
                $user->save();
            }
        }
        return redirect('users');
    }
}
