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
<div class="container">
    <div class="row">
        <div class="col-md-5 mb-3">
            <img class="picture mb-1" src="{{ url('storage/artwork/'.$artwork->attachment) }}" alt="Artwork Picture">

            <form action="{{ route('artwork.destroy', $artwork) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('administrator')
                    <button type="submit" class="btn btn-danger btn-xs m-1" style="display: {{ $artwork->status == 'Approve' ? 'none' : '' }};">Delete</button>
                    <a href="javascript:void()" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#categoryModal">Update Status</a>

                    <!-- <form action="#" method="POST">
                        <button class='btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete"><span class="fa fa-times"></span> delete</button>
                    </form>

                    <div id="confirm" class="modal">
                        <div class="modal-body">
                            Are you sure?
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
                            <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                        </div>
                    </div> -->
                @endcan
                <a href="{{ route('artwork.edit', $artwork) }}" class="btn btn-secondary m-1" style="display: {{ $artwork->status == 'Approve' ? 'none' : '' }};">
                    Edit
                </a>
                <a class="btn btn-light btn-sm" href="{{ route('download.attachment', $artwork) }}">Download</a>
            </form>
        </div>
        <div class="col">

            <div class="card">
                <div class="card-header">
                    Artwork Details
                    <span class="badge badge-primary float-right">{{ $artwork->status }}</span>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        @can('administrator')
                        <div class="form-group col-md-4">
                            <label class="text-muted"for="name">Artist:</label>
                            <a href="{{ route('user.show', $artwork->user) }}">
                                <input type="text" class="form-control-plaintext" value="{{ $artwork->user->name }}" readonly>
                            </a>
                        </div>
                        @endcan
                        <div class="form-group col-md-8">
                             <label class="text-muted" for="name">Name:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-4">
                         <label class="text-muted" for="subject">Subject:</label>
                        <input type="text" class="form-control-plaintext" value="{{ $artwork->subject }}" readonly>
                    </div>

                    <div class="form-group col-md-4">
                         <label class="text-muted" for="city">City:</label>
                        <input type="text" class="form-control-plaintext" value="{{ $artwork->city }}" readonly>
                    </div>

                    <div class="form-group col-md-4">
                         <label class="text-muted" for="category">Category:</label>
                        <input type="text" class="form-control-plaintext" value="{{ $artwork->category }}" readonly>
                    </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                             <label class="text-muted" for="style">Style:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->style }}" readonly>
                        </div>

                        <div class="form-group col-md-4">
                             <label class="text-muted" for="medium">Medium:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->medium }}" readonly>
                        </div>

                        <div class="form-group col-md-4">
                             <label class="text-muted" for="material">Material:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->material }}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                             <label class="text-muted" for="size">Size:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->size }}" readonly>
                        </div>

                        <div class="form-group col-md-2">
                             <label class="text-muted" for="height">Height:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->height }} cm" readonly>
                        </div>

                        <div class="form-group col-md-2">
                             <label class="text-muted" for="width">Width:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->width }} cm" readonly>
                        </div>

                        <div class="form-group col-md-2">
                             <label class="text-muted" for="depth">Depth:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->depth }} cm" readonly>
                        </div>

                        <div class="form-group col-md-3">
                             <label class="text-muted" for="price">Price:</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control-plaintext" value="₱ {{ $artwork->price }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                     <label class="text-muted" for="description">Description:</span></label>
                    <textarea name="description" class="form-control-plaintext" rows="3" readonly>{{ $artwork->description }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                        <form method="POST" action="{{ route('status.change', $artwork) }}">
                            @csrf
                            @method('PATCH')

                            <div class="modal-body">
                                <div class="form-group">
                                     <label class="text-muted" for="name">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Pending" {{ $artwork->status == 'Pending' ? 'selected' : ''  }}>Pending</option>
                                        <option value="Approve" {{ $artwork->status == 'Approve' ? 'selected' : ''  }}>Approve</option>
                                        <option value="Revise" {{ $artwork->status == 'Revise' ? 'selected' : ''  }}>Revise</option>
                                        <option value="Reject" {{ $artwork->status == 'Reject' ? 'selected' : ''  }}>Reject</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                     <label class="text-muted" for="remarks">Remarks</label>
                                    <textarea class="form-control" name="remarks" name="remarks" rows="2"></textarea>
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

            @if (!empty($artwork->remarks))
                <div class="card mt-2">
                    <div class="card-header">
                        Remarks
                    </div>
                    <div class="card-body">
                        {{ $artwork->remarks }}
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
