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
        <div class="col p-2">

            <div class="card">
                <div class="card-header">
                    Modify User
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.update', $user) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label font-weight-bold">Full Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label font-weight-bold">Email</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile" class="col-sm-2 col-form-label font-weight-bold">Mobile Number</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="mobile" max="12" value="{{ $user->mobile }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label font-weight-bold">Role</label>
                        <div class="col-sm-3">
                                <select name="role" id="role" class="form-control">
                                    <option value="">-</option>
                                    @foreach ($role as $role)
                                    <option value="{{ $role->id }}" {{ ($user->roles()->get()->pluck('name')->first() == $role->name) ? 'selected' : '' }} >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
