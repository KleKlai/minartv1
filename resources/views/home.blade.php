@extends('layouts.app')

@section('content')
<div class="flex my-4">
    <a class="nav-link navbar-toggler border-none
        flex items-center" href="{{ route('artwork.index') }}">
        Artwork
    </a>
</div>

<p>{{ Auth::user()->roles()->get()->pluck('name')->first() }}</p>
<h1>Gallery Here</h1>
@endsection
