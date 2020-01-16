<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = auth()->user()->id;

        if ($userId){

            $user = User::find($userId);

            return view('home')->with('listings', $user->listing)->with('user_id', $userId);

        } else {
            return view('auth/login');
        }



    }
}
