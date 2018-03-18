<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NaviOcean\Laravel\NameParser as FullNameParser;
use Spatie\Tags\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parser = new FullNameParser();
        $names = $parser->parse_name(Auth::user()->name);
        return view('pages.home', [ 'user' => Auth::user(), 'first' => $names['fname'], 'last' => $names['lname'] ]);
    }

    public function postPhoto(User $user)
    {
        $user->addAllMediaFromRequest()->each(function ($fileAdder) {
            $fileAdder->toMediaCollection();
        });
    }
}
