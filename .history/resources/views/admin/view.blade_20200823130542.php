@extends('layouts.app')

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

                    <form action="{{ route('user.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        <a class="btn btn-secondary" href="{{ route('user.edit', $user) }}" class="btn btn-link">Edit</a>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
