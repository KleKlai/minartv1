<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Auth;


class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('Admin.Usermanagement.password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password'                  => 'required|confirmed',

        ]);

        Auth::user()->update([
            'password'  =>  Hash::make($request->password)
        ]);

        \Session::flash('success', 'Password Change Successfully!');

        $details = [
            'header'    => 'System Administrator',
            'subject'   => 'System',
            'body'      => 'Your Password has been change successfully.',
        ];

        Auth::user()->notify(new \App\Notifications\notify($details));

        return redirect()->back();
    }
}
