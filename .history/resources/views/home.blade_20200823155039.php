@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">

                @forelse($data as $data)
                    <div id="columns">
                        <figure>
                            <img src="{{ url('storage/artwork/'.$data->attachment) }}" alt="{{ $data->name }}">
                            <figcaption>{{ $data->name }}, {{ $data->category }}, ₱{{ $data->price }}</figcaption>
                        </figure>
                    </div>
                @empty
                    <div class="container text-center text-muted">
                        <h1>Whoops!</h1>
                        <h3>Looks like your gallery is empty?</h3>
                        @can('artist')
                        <a href="{{ route('artwork.create') }}"><p>Would you like to add one?</p></a>
                        @endcan
                        <img src="{{ asset('images/assets/rsz_gallery_empty.png') }}" alt="No Result Found" width="300" class="mb-4 mx-auto d-block">
                    </div>
                @endforelse


        </div>
    </div>
</div>

@endsection
