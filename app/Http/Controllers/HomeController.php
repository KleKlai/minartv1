<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Artwork;
use Auth;

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

        if(Auth::user()->roles()->get()->pluck('name')->first() == 'Administrator') {
            $data = Artwork::all();
        } else {
            $data = Artwork::where('artist', Auth::user()->id)->get();
        }

        // $data = [];

        return view('home', compact('data'));
    }
}
