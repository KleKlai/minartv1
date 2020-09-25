@extends('layouts.app')

@section('title', 'Change Password')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-5 mx-auto d-block">

            <p class="text-muted">{{ __("Enter your new account password below. Once confirmed, you'll be logged into your account and your new password will be active.") }}</p>

            <form method="POST" action="{{ route('password.change') }}">
                @csrf

                <div class="form-group">
                    <label for="name">New Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Confirm Password</label>
                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>

            </form>

        </div>
    </div>
</div>
@endsection
