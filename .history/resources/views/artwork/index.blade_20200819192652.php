@extends('layouts.app')

@section('content')

<div class="flex my-4">
    <a class="text-decoration-none" href="{{ route('artwork.create') }}">
        <h1 class="mb-0">Artwork</h1>
    </a>

    <a href="{{ route('component.subject.index') }}" class="text-decoration-none">
        Subject
    </a>

    <a href="{{ route('component.country.index') }}" class="text-decoration-none">
        Country
    </a>

    <a href="{{ route('component.category.index') }}" class="text-decoration-none">
        Category
    </a>

    <a href="{{ route('component.style.index') }}" class="text-decoration-none">
        Style
    </a>

    <a href="{{ route('component.medium.index') }}" class="text-decoration-none">
        Medium
    </a>

    <a href="{{ route('component.material.index') }}" class="text-decoration-none">
        Material
    </a>

    <a href="{{ route('component.size.index') }}" class="text-decoration-none">
        Size
    </a>
</div>
{{--  <div class="row justify-content-center">
    <div class="col-md">  --}}

<a class="btn btn-primary" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    <strong>Success!</strong> {{ Session::get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

{{--  <a href="{{ route('user.index') }}" class="btn btn-link">Administrator</a>  --}}

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    {{-- <th scope="col">Description</th> --}}
                    <th scope="col">Artist</th>
                    <th scope="col">Country</th>
                    <th scope="col">Category</th>
                    <th scope="col">Size</th>
                    <th scope="col">Dimension</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Style</th>
                    <th scope="col">Medium</th>
                    <th scope="col">Material</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                    @forelse($artwork as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->artist }}</td>
                            <td>{{ $data->country }}</td>
                            <td>{{ $data->category }}</td>
                            <td>{{ $data->size ?? '-'}}</td>
                            <td>{{ $data->height }} x {{ $data->width }} cm</td>
                            <td>{{ $data->subject }}</td>
                            <td>{{ $data->style }}</td>
                            <td>{{ $data->medium }}</td>
                            <td>{{ $data->material }}</td>
                            <td>{{ $data->price }}</td>
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

@endsection
