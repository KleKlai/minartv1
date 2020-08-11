@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">

            <div class="container">
                <div class="row">
                    <div class="col">

                        <table class="table mt-2">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Attachment</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)

                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>{{ $user->categories }}</td>
                                        <td>{{ $user->attachment }}</td>
                                        <td>
                                            <form action="{{ route('destroy', $user) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <a class="text" title="Edit" data-toggle="tooltip">View</a>

                                                <button type="submit" class="btn btn-danger btn-xs ml-2 delete-confirm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                          </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
