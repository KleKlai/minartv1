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
                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('artwork.index') }}">Artwork</a>
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
            @can('artist')
            <a href="{{ route('artwork.create') }}" class="link mb-3">
                +
            </a>
            @endcan
            <a href="" class="link mb-3">Artworks</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        {{-- <th scope="col">Description</th> --}}
                        <!-- <th scope="col">Artist</th>
                        <th scope="col">Country</th> -->
                        <th scope="col">Category</th>
                        <!-- <th scope="col">Size</th>
                        <th scope="col">Dimension</th> -->
                        <th scope="col">Subject</th>
                        <!-- <th scope="col">Style</th>
                        <th scope="col">Medium</th>
                        <th scope="col">Material</th> -->
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                        @forelse($artwork as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <!-- <td>{{ $data->artist }}</td>
                                <td>{{ $data->country }}</td> -->
                                <td>{{ $data->category }}</td>
                                <!-- <td>{{ $data->size ?? '-'}}</td>
                                <td>{{ $data->height }} x {{ $data->width }} cm</td> -->
                                <td>{{ $data->subject }}</td>
                                <!-- <td>{{ $data->style }}</td>
                                <td>{{ $data->medium }}</td>
                                <td>{{ $data->material }}</td> -->
                                <td>₱ {{ $data->price }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('artwork.show', $data) }}">view</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">No Data</td>
                            </tr>
                        @endforelse
                </tbody>
            </table>

            
        </div>
    </div>
</div>

@endsection