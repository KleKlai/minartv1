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
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link dropdown-toggle" href="#" id="userManagementDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
<!-- <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">
        <a href="/artwork">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            </svg>
        </a>
        Subject
    </span>
        <form class="form-inline">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categorySubject">
            Create
        </button>
        </form>
</nav> -->

<div class="container">
    <div class="row">
        <div class="col">

            <a href="javascript:void()" class="link mb-3" data-toggle="modal" data-target="#categorySubject">
                + Subject
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $data)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->description }}</td>
                            <td>
                                <form action="{{ route('component.subject.destroy', $data) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="categorySubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <form method="POST" action="{{ route('component.subject.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" name="description" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link text-decoration-none" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>
@endsection
