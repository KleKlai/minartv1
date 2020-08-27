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
                    User Details
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label font-weight-bold">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="name" value="{{ $user->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label font-weight-bold">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="email" value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile" class="col-sm-2 col-form-label font-weight-bold">Mobile Number</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="mobile" value="{{ $user->mobile }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="categories" class="col-sm-2 col-form-label font-weight-bold">Categories</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="categories" value="{{ $user->categories }}">
                        </div>
                    </div>

                    @if($user->categories == 'Gallery')

                    <div class="form-group row">
                        <label for="categories" class="col-sm-2 col-form-label font-weight-bold">Gallery Type</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="categories" value="{{ $user->gallery }}">
                        </div>
                    </div>

                    @endif

                    <div class="form-group row">
                        <label for="categories" class="col-sm-2 col-form-label font-weight-bold">Register</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="categories" value="{{ $user->created_at->diffForHumans() }}">
                        </div>
                    </div>

                    
                    <a href="" class="btn btn-danger"  data-toggle="modal" data-target="#confirmDeleteModal">Delete</a>
                    <a class="btn btn-secondary" href="{{ route('user.edit', $user) }}">Edit</a>

                </div>
            </div>

            <!-- Delete Modal -->
            <div id="confirmDeleteModal" class="modal fade">
                <div class="modal-dialog modal-confirm modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header flex-column">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title w-100">Are you sure?</h4>	
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to delete these records? This process cannot be undone.</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" href="{{ route('user.destroy', $user) }}" data-dismiss="modal"></a>
                            <!-- <form action="{{ route('user.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" data-dismiss="modal">Delete</button>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
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
                                        <td>{{ $data->category }}</td>
                                        <td>{{ $data->subject }}</td>
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
    </div>
</div>
@endsection
