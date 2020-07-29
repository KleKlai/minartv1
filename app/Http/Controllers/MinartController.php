<?php

namespace App\Http\Controllers;

use App\minart;
use Illuminate\Http\Request;

class MinartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $request->validate([
            'file' => 'required|max:2048',
        ]);

        $filenameWithExt = $request->file('file')->getClientOriginalName();

        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('file')->getClientOriginalExtension();
        // Filename to Store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload the file
        $path = $request->file('file')->storeAs('public/files', $fileNameToStore);

        minart::create([
            'user_id'   => \Auth::user()->id,
            'file'      => $fileNameToStore,
        ]);

        \Session::flash('success', 'Success');

        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\minart  $minart
     * @return \Illuminate\Http\Response
     */
    public function show(minart $minart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\minart  $minart
     * @return \Illuminate\Http\Response
     */
    public function edit(minart $minart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\minart  $minart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, minart $minart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\minart  $minart
     * @return \Illuminate\Http\Response
     */
    public function destroy(minart $minart)
    {
        //
    }
}
