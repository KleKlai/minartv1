<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;

use App\Model\Material as Model;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Model::all();
        return view('component.material.index', compact('data'));
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
     * @param  \App\Model\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $material)
    {
        $material->delete();

        \Session::flash('success', $material->name . ' has been remove successfully.');

        return back();
    }
}
