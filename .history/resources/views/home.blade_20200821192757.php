@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">My Artworks</span>
    <a class="text-decoration-none" href="{{ route('artwork.create') }}">
        <p class="mb-0">Upload work</p>
    </a>
    
    <a class="text-decoration-none" href="{{ route('artwork.create') }}">
        <p class="mb-0">Notifications</p>
    </a>
</nav>

@endsection
