@extends('layouts.app')

@section('content')


    <div class="col-md">

        <h2>
            <a class="back" href="/">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
            </a>
            Login
        </h2>

        <div class="container">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group row">
                        <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <button type="submit">{{ __('SUBMIT >>>') }}
                </button>

                {{--  @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif  --}}
            </form>
        </div>
    </div>

    <div class="col-md d-none d-lg-block">
        <img class="picture" src="/images/image2.png" alt="Image2">
    </div>
@endsection