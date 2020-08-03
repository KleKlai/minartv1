@extends('layouts.app')

@section('content')
<h2>
    <a class="back" href="/">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
        </svg>
    </a>
    Register
</h2>

<div class="container">
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
                <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" placeholder="Fullname" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group row">
                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group row">
                <input id="mobile" type="number" class=" @error('mobile') is-invalid @enderror" name="mobile" placeholder="Mobile Number" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group row">
                <select name="categories" id="categories" onchange="showGallery()" class=" @error('categories') is-invalid @enderror">
                    <option selected>Categories</option>
                    <option value="Gallery">Gallery</option>
                    <option value="Regional Group">Regional Group</option>
                    <option value="Art Spaces">Art Spaces</option>
                    <option value="Special Projects">Special Projects</option>
                </select>

                @error('categories')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group row d-none" id="gallery">
                <select name="gallery" class="@error('gallery') is-invalid @enderror">
                    <option selected>Choose Gallery...</option>
                    <option value="Gall Down South">Gall Down South</option>
                    <option value="The BauHaus">The BauHaus</option>
                    <option value="Sinemata">Sinemata</option>
                    <option value="Datu Bago">Datu Bago</option>
                    <option value="Art Spaces">Art Spaces</option>
                    <option value="Special Projects">Special Projects</option>
                </select>

                @error('gallery')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group row">
                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group row">
                <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
        </div>

        <div class="row files">
            <div class="col-7 files">
                <input type="file" name="file" multiple class="@error('file') is-invalid @enderror">

                @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{--  <div class="col">
                <button type="submit" class="mt-2 btn btn-primary">Upload Files</button>
            </div>  --}}
        </div>

        <button type="submit">{{ __('SUBMIT >>>') }}</button>
    </form>
</div>
@endsection
