@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container">

    <div class="row">
        <div class="col">
            <div class="text-right">
                <img src="{{ asset('images/assets/page_not_found.svg') }}" alt="No Result Found" width="300" class="text-right d-block">
            </div>
        </div>
        <div class="col">
            <h1>404</h1>
            <h3>Not Found.</h3>
        </div>   
    </div>

    <div class="row">
        <div class="col">


            <div id="columns">
                @forelse($data as $data)
                    <a href="{{ route('artwork.show', $data) }}">
                        <figure>
                            <img src="{{ url('storage/artwork/'.$data->attachment) }}" alt="{{ $data->name }}">
                            <figcaption>{{ $data->name }}, {{ $data->category }}, ₱{{ $data->price }}</figcaption>
                        </figure>
                    </a>
                @empty
                    <div class="container text-center text-muted">
                        <h1>Whoops!</h1>

                        @if(Auth::user()->roles()->get()->pluck('name')->first() == 'Administrator' || Auth::user()->roles()->get()->pluck('name')->first() == 'Curator')
                            <h3>No artist submitted artwork yet!</h3>
                        @else
                            <h3>Looks like your gallery is empty?</h3>
                        @endif

                        @can('artist')
                        <a href="{{ route('artwork.create') }}"><p>Would you like to add one?</p></a>
                        @endcan
                        <img src="{{ asset('images/assets/Gallery_Empty.png') }}" alt="No Result Found" width="300" class="mx-auto d-block">
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>

@endsection
