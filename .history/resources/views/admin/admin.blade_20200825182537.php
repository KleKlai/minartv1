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
                <a class="nav-link" href="{{ route('artwork.index') }}">Artwork</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('view.notification') }}">
                    Notifications
                    @if(auth()->user()->unreadNotifications->count() != 0)
                        <span class="badge badge-success">{{ auth()->user()->unreadNotifications->count() }}</span>
                    @endif
                </a>
            </li>
            @can('administrator')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Utility
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('component.subject.index') }}">Subject</a>
                    <!-- <a class="dropdown-item" href="{{ route('component.city.index') }}">City</a> -->
                    <a class="dropdown-item" href="{{ route('component.category.index') }}">Category</a>
                    <a class="dropdown-item" href="{{ route('component.style.index') }}">Style</a>
                    <a class="dropdown-item" href="{{ route('component.medium.index') }}">Medium</a>
                    <a class="dropdown-item" href="{{ route('component.material.index') }}">Material</a>
                    <a class="dropdown-item" href="{{ route('component.size.index') }}">Size</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="userManagementDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    User Management
                </a>
                <div class="dropdown-menu" aria-labelledby="userManagementDropDown">
                    <a class="dropdown-item" href="{{ route('user.index') }}">{{ "User's" }}</a>
                    <a class="dropdown-item" href="{{ route('users.trash') }}">Trash</a>
                </div>
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

            <table class="table mt-2">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Group</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)

                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>{{ $user->categories }}</td>
                            <td>
                                {{--  <form action="{{ route('user.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')  --}}

                                    @if($user->deleted_at == null)
                                        <a class="btn btn-info" href="{{ route('user.show', $user->uuid) }}" title="View Details" data-toggle="tooltip">View</a>
                                    @else
                                        <a class="btn btn-secondary" href="#restore" title="View Details" data-toggle="tooltip">Restore</a>
                                    @endif
                                    {{--  <button type="submit" class="btn btn-link">Delete</button>
                                </form>  --}}
                            </td>
                        </tr>

                    @endforeach
                </tbody>
                </table>

        </div>
    </div>
</div>
@endsection
