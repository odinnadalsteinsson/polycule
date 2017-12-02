<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // $genders = Tag::getWithType('gender');
        // $gender = Tag::findOrCreate($genders[0]->name, 'gender');
        // $statuses = Tag::getWithType('relationship-status');
        // $status = Tag::findOrCreate($statuses[0]->name, 'relationship-status');
        // $user = Auth::user();
        // $user->attachTag($gender);
        // $user->attachTag($status);
        return view('home');
    }

    public function postPhoto()
    {
        $user = Auth::user();
        $user->addAllMediaFromRequest()->each(function ($fileAdder) {
            $fileAdder->toMediaCollection();
        });
    }
}
