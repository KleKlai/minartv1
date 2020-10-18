@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @can('artist')
            <a href="{{ route('artwork.create') }}" class="link mb-3">
                + Artworks
            </a>
            @endcan

            <table id="myTable" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <!-- <th scope="col">Description</th> -->
                        @can('administrator')
                        <th scope="col">Artist</th>
                        <!-- <th scope="col">Country</th> -->
                        <th scope="col">Group</th>
                        <th scope="col">Gallery</th>
                        <th scope="col">Art Category</th>
                        <!-- <th scope="col">Size</th>
                        <th scope="col">Dimension</th> -->
                        {{--  <th scope="col">Subject</th>  --}}
                        <!-- <th scope="col">Style</th>
                        {{--  <th scope="col">Medium</th>  --}}
                        <th scope="col">Material</th> -->
                        {{--  <th scope="col">Price</th>  --}}
                        @endcan
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                        @forelse($artwork as $data)
                            <tr>
                                <td>{{ $data->title }}</td>
                                @can('administrator')
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->user->category }}</td>
                                <td>{{ $data->user->subcategory }}</td>
                                <td>{{ $data->category }}</td>
                                {{--  <td>{{ $data->subject }}</td>  --}}
                                {{--  <td>₱ {{ $data->price }}</td>  --}}
                                @endcan
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
</div>

@endsection

@section('javascript')
@endsection
