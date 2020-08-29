@extends('layouts.app')

@section('title', 'User Management')

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
