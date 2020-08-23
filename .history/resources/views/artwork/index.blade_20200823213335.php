@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @can('artist')
            <a href="{{ route('artwork.create') }}" class="link mb-3">
                + Artwork
            </a>
            @endcan

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        {{-- <th scope="col">Description</th> --}}
                        <!-- <th scope="col">Artist</th>
                        <th scope="col">Country</th> -->
                        <th scope="col">Category</th>
                        <!-- <th scope="col">Size</th>
                        <th scope="col">Dimension</th> -->
                        <th scope="col">Subject</th>
                        <!-- <th scope="col">Style</th>
                        <th scope="col">Medium</th>
                        <th scope="col">Material</th> -->
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                        @forelse($artwork as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <!-- <td>{{ $data->artist }}</td>
                                <td>{{ $data->country }}</td> -->
                                <td>{{ $data->category }}</td>
                                <!-- <td>{{ $data->size ?? '-'}}</td>
                                <td>{{ $data->height }} x {{ $data->width }} cm</td> -->
                                <td>{{ $data->subject }}</td>
                                <!-- <td>{{ $data->style }}</td>
                                <td>{{ $data->medium }}</td>
                                <td>{{ $data->material }}</td> -->
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
</div>

@endsection
