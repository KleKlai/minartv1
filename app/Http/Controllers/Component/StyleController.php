<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;

use App\Model\Style as Model;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Model::all();
        return view('component.style.index', compact('data'));
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
            'name'          => ['required', 'string'],
            'description'   => ['nullable', 'string', 'max:255']
        ]);

        Model::create($request->all());

        \Session::flash('success', $request->name . ' created successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function show(Style $style)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit(Style $style)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Style $style)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $country)
    {
        $country->delete();

        \Session::flash('success', $country->name . ' has been remove successfully.');

        return back();
    }
}
