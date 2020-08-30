<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();

        return view('admin.usermanagement.index', compact('users'));
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

    }

    public function show(User $user)
    {
        $user       = User::find($user->id);
        $artwork    = $user->artwork()->get();

        return view('admin.usermanagement.show', compact('user', 'artwork'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = Role::all();

        return view('admin.usermanagement.edit', compact('user', 'role'));
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
        $request->validate([
            'name'      => 'required',
            'email'     => 'required:unique:users,email,'. $user->id,
            'mobile'    => 'required',
            'role'      => 'required'
        ]);

        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'mobile'    => $request->mobile,
        ]);

        $user->roles()->sync($request->role);

        \Session::flash('success', $request->name . ' updated Successfully.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        \Session::flash('success', 'User has been moved to trash!');

        return redirect()->route('user.index');
    }

    public function trash()
    {
        $data = User::onlyTrashed()->get();

        return view('admin.usermanagement.trash', compact('data'));
    }

    public function restore($id)
    {
        $data = User::onlyTrashed()->find($id);

        if (!is_null($data)) {

            $data->restore();

            \Session::flash('success', $data->name . ' successfully restored.');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
        return redirect()->back();
    }
}
