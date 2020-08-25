@extends('layouts.app')

@section('nav')

<nav class="navbar navbar-expand-lg navbar-light">
    <span class="navbar-brand mb-0 h1">Artworks</span>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('artwork.index') }}">Artwork</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('view.notification') }}">
                    Notifications<span class="badge badge-light">{{ auth()->user()->unreadNotifications()->count()  }}</span>
                </a>
            </li>
            @can('administrator')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Utility
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('component.subject.index') }}">Subject</a>
                    <a class="dropdown-item" href="{{ route('component.country.index') }}">Country</a>
                    <a class="dropdown-item" href="{{ route('component.category.index') }}">Category</a>
                    <a class="dropdown-item" href="{{ route('component.style.index') }}">Style</a>
                    <a class="dropdown-item" href="{{ route('component.medium.index') }}">Medium</a>
                    <a class="dropdown-item" href="{{ route('component.material.index') }}">Material</a>
                    <a class="dropdown-item" href="{{ route('component.size.index') }}">Size</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">User Management</a>
            </li>
            @endcan
        </ul>

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{--  {{ Auth::user()->roles()->get()->pluck('name')->first() }}  --}}
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#changepass" data-toggle="modal" data-target="#changePassword">
                        Change Password
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </div>
            </li>
        </ul>

    </div>
</nav>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
                
            <div id="columns">
                @forelse($data as $data)
                    <a href="{{ route('artwork.show', $data) }}">
                            <figure>
                                <img src="{{ url('storage/artwork/'.$data->attachment) }}" alt="{{ $data->name }}">
                                <figcaption>{{ $data->name }}, {{ $data->category }}, ₱{{ $data->price }}</figcaption>
                            </figure>
                    </a>
                @empty
                    <div class="container text-center text-muted">
                        <h1>Whoops!</h1>
                        <h3>Looks like your gallery is empty?</h3>
                        @can('artist')
                        <a href="{{ route('artwork.create') }}"><p>Would you like to add one?</p></a>
                        @endcan
                        <img src="{{ asset('images/assets/rsz_gallery_empty.png') }}" alt="No Result Found" width="300" class="mb-4 mx-auto d-block">
                    </div>
                @endforelse
            </div>


        </div>
    </div>
</div>

@endsection
