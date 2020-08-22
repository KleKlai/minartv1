@extends('layouts.app')

@section('content')
<div class="flex my-4">
    <!-- <a class="nav-link navbar-toggler border-none
        flex items-center" href="{{ route('artwork.index') }}">
        Artwork
    </a> -->

    <a class="text-decoration-none" href="{{ route('artwork.create') }}">
        <p class="mb-0">Upload work</p>
    </a>
</div>

<h1>Gallery Here</h1>
@endsection
