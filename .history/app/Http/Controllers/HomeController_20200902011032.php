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
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $currentUserRole = Auth::user()->roles()->get()->pluck('name')->first();
        if($currentUserRole == 'Administrator' || $currentUserRole == 'Curator') {
            $data = Artwork::all();
        } else {
            $data = Artwork::where('user_id', Auth::user()->id)->get();
        }

        // $data = [];

        return view('home', compact('data'));
    }
}
