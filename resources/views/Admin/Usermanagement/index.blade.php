@extends('layouts.app')

@section('title', 'User Management')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <table id="myTable" class="table mt-2">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <!-- <th scope="col">Mobile</th> -->
                    <th scope="col">Group</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)

                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <!-- <td>{{ $user->mobile }}</td> -->
                            <td>{{ $user->categories }}</td>
                            <td>{{ $user->roles()->get()->pluck('name')->first() }}</td>
                            <td>
                                {{--  <form action="{{ route('user.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')  --}}

                                    @if($user->deleted_at == null)
                                        <a class="btn btn-info" href="{{ route('user.show', $user->uuid) }}" title="View Details" data-toggle="tooltip">View</a>
                                    @else
                                        <a class="btn btn-secondary" href="#restore" title="View Details" data-toggle="tooltip">Restore</a>
                                    @endif
                                    {{--  <button type="submit" class="btn btn-link">Delete</button>
                                </form>  --}}
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

{{-- sleep nata  --}}
