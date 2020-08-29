@extends('layouts.app')

@section('title', 'User Management')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <p class="mb-0 "><b>Note: </b> {{ "All user's in this section will be deleted in 30 days"  }}</p>

            <table class="table mt-2">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Group</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $user)

                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>{{ $user->categories }}</td>
                            <td>
                                <form action="{{ route('user.restore', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" class="btn btn-secondary" title="View Details" data-toggle="tooltip">Restore</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
                </table>

        </div>
    </div>
</div>
@endsection
