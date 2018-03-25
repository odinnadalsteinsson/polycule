<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Carbon\Carbon;
use Bouncer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use NaviOcean\Laravel\NameParser as FullNameParser;
use Newsletter;

class UserController extends Controller
{
    // Tag groups hardcoded for demo
    private $data = [
        'body' => [ '165 cm', '70 kg' ],
        'sexuality' => [ 'hetero-fleksibel' ],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        View::share('jumbotron', false);
        $users = User::where('name', '!=', '')->paginate(9);
        return view('pages.users', [ 'users' => $users ]);
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
        $parser = new FullNameParser();
        $names = $parser->parse_name($user->name);
        return view('pages.user', [
            'user' => $user,
            'first' => $names['fname'],
            'last' => $names['lname'],
            'data' => $this->data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $parser = new FullNameParser();
        $names = $parser->parse_name($user->name);
        if (Auth::user()->id == $user->id || Auth::user()->isAn('admin')) {
            return view('pages.user-edit', [
                'user' => $user,
                'first' => $names['fname'],
                'last' => $names['lname'],
                'data' => $this->data,
            ]);
        }
        return view('pages.user', [
            'user' => $user,
            'first' => $names['fname'],
            'last' => $names['lname'],
            'data' => $this->data,
        ]);
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
        $user->about = trim($request->about);
        $user->save();
        return 200;
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
        if (Auth::user()->isAn('admin')) {
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
}
