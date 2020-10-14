@extends('layouts.app')

@section('title', 'User Management')

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
                        <label for="categories" class="col-sm-2 col-form-label font-weight-bold">Group</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="categories" value="{{ $user->category }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="categories" class="col-sm-2 col-form-label font-weight-bold">Gallery</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="categories" value="{{ $user->subcategory }}">
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
                <div class="modal-dialog modal-dialog-centered">
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

                            <form action="{{ route('user.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if (empty($artwork))
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Subject</th>
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
            @endif

        </div>
    </div>
</div>
@endsection
