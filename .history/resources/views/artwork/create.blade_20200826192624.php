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
        <div class="col">

            <form action="{{ route('artwork.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="subject">Subject</label>
                    <select name="subject" class="form-control" value="{{ old('subject') }}" required>
                        <option value="">-</option>
                        @foreach($subject as $subject)
                            <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="city">City</label>
                    <input type="text" class="form-control" value="{{ old('city') }}" name="city" required>
                </div>


                <div class="form-group col-md-4">
                    <label for="category">Category</label>
                    <select name="category" class="form-control" value="{{ old('category') }}" required>
                        <option value="">-</option>
                        @foreach($category as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="style">Style</label>
                        <select name="style" class="form-control" value="{{ old('style') }}" required>
                            <option value="">-</option>
                            @foreach($style as $style)
                                <option value="{{ $style->name }}">{{ $style->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="medium">Medium</label>
                        <select name="medium" class="form-control" value="{{ old('medium') }}" required>
                            <option value="">-</option>
                            @foreach($medium as $medium)
                                <option value="{{ $medium->name }}">{{ $medium->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="material">Material</label>
                        <select name="material" class="form-control" value="{{ old('material') }}" required>
                            <option value="">-</option>
                            @foreach($material as $material)
                                <option value="{{ $material->name }}">{{ $material->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="size">Size <span class="text-muted">( Optional )</span></label>
                        <select name="size" class="form-control" value="{{ old('size') }}">
                            <option value="">-</option>
                            @foreach($size as $size)
                                <option value="{{ $size->name }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="height">Height</label>
                        <input type="number" class="form-control" name="height" placeholder="(in cm)" min="0" value="{{ old('height') }}" required>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="width">Width</label>
                        <input type="number" class="form-control" name="width" placeholder="(in cm)" min="0" value="{{ old('width') }}" required>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="depth">Depth</label>
                        <input type="number" class="form-control" name="depth" placeholder="(in cm)" min="0" value="{{ old('depth') }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="price">Price</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text">₱</div>
                            </div>
                            <input type="number" class="form-control" name="price" min="0" value="{{ old('price') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="attachment">Upload product photo</label>
                        <div class="custom-file">
                            <input type="file" class="form-control-file" name="file" onchange="readURL(this);"  aria-describedby="Product Image" value="{{ old('attachment') }}" required>
                            <!-- <label class="custom-file-label" for="attachment">Choose file</label> -->
                        </div>
                    </div>
                    <div class="col-md-8">
                        <img id="imageView" src="" style="max-width:300px; max-height: 500px;"/>
                    </div>
                
                </div>


                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/artwork" class="btn border-none">Cancel</a>
            </form>

        </div>
    </div>
  </form>
</div>
@endsection
