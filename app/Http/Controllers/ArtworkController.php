<?php

namespace App\Http\Controllers;

use App\Artwork;
use Auth;
use Illuminate\Http\Request;

// Components
use App\Model\Subject;
use App\Model\Country;
use App\Model\Category;
use App\Model\Style;
use App\Model\Medium;
use App\Model\Material;
use App\Model\Size;

class ArtworkController extends Controller
{

    public function index()
    {
        if(Auth::user()->roles()->get()->pluck('name')->first() == 'Administrator') {
            $artwork = Artwork::all();
        } else {
            $artwork = Artwork::where('artist', Auth::user()->id)->get();
        }

        return view('artwork.index', compact('artwork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: Return here all necessary drop down DATA

        $subject    = Subject::all();
        $country    = Country::all();
        $category   = Category::all();
        $style      = Style::all();
        $medium     = Medium::all();
        $material   = Material::all();
        $size       = Size::all();

        return view('artwork.create', compact(
            'subject',
            'country',
            'category',
            'style',
            'medium',
            'material',
            'size'
        ));
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
            'subject'       => ['required', 'string'],
            'country'       => ['required', 'string'],
            'category'      => ['required', 'string'],
            'style'         => ['required', 'string'],
            'medium'        => ['required', 'string'],
            'material'      => ['required', 'string'],
            'size'          => ['nullable', 'string'],
            'height'        => ['required', 'integer', 'min:0'],
            'width'         => ['required', 'integer', 'min:0'],
            'depth'         => ['nullable', 'integer', 'min:0'],
            'price'         => ['required', 'integer', 'min:0'],
            'description'   => ['nullable', 'string'],
            'attachment'    => ['nullable', 'mimes:jpg,png,jpeg'],
        ]);

        if($request->hasFile('profile')){
            // Upload File
            $file_extention = $request['attachment']->getClientOriginalExtension();
            // File Name Structure: TimeUploaded_UserWhoUpload.FileExtension
            $file_name = time().rand(99,999).'_'.\Auth::user()->name.'.'.$file_extention;
            $file_path = $request['attachment']->storeAs('public/files', $file_name);

            //Modify attachment data from File to File Name
            $request->merge(['attachment' => $file_name]);
        }

        //Add Artist Request
        $request->request->add(['artist' => \Auth::user()->id]);
        $request->request->add(['status' => 'Pending']);

        Artwork::create($request->all());

        //Notify Admin for submission
        $user = \App\User::find(1);

        $details = [
            'header' => Auth::user()->name,
            'body' => Auth::user()->name . ' submitted art',
        ];

        $user->notify(new \App\Notifications\notify($details));

        \Session::flash('success', 'Artwork ' . $request->name . ' successfully saved.');

        return redirect()->route('artwork.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function show(artwork $artwork)
    {
        return view('artwork.show', compact('artwork'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function edit(artwork $artwork)
    {
        dd($artwork);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, artwork $artwork)
    {
        //Check if the current login user has admin previlege
        if(\Gate::denies('administrator')){
            return back();
        }

        $request->validate([
            'status'        => 'required',
            'remarks'   => 'nullable',
        ]);

        $artwork->update($request->all());

        //Notify Admin for submission
        $user = \App\User::find($artwork->artist);

        $details = [
            'header' => Auth::user()->name,
            'body' => 'Your artwork ' . $artwork->name . ' has been ' . $request->status . '.',
        ];

        $user->notify(new \App\Notifications\notify($details));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(artwork $artwork)
    {
        $artwork->delete();

        \Session::flash('success', $artwork->name . ' deleted successfully!');

        return view('artwork.index');
    }
}
