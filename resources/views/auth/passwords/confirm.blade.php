@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 mx-auto d-block">

            {{ __('Please confirm your password before continuing.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="form-group">
                    <input id="password" type="password" class=" mt-2 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{-- <strong>{{ $message }}</strong> --}}
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Confirm Password') }}
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection
