@extends('layouts.app')

@section('content')
<div class="flex my-4">
    <!-- <a class="nav-link navbar-toggler border-none
        flex items-center" href="{{ route('artwork.index') }}">
        Artwork
    </a> -->

    <a class="text-decoration-none" href="{{ route('artwork.create') }}">
        <h1 class="mb-0">Artwork</h1>
    </a>
</div>

<h1>Gallery Here</h1>
@endsection
