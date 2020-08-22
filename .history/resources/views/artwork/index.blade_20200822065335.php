@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">Artworks</span>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="{{ route('component.subject.index') }}" class="text-decoration-none">
                Subject
            </a>
        </li>
        <li>
            <a href="{{ route('component.country.index') }}" class="text-decoration-none">
                Country
            </a>
        </li>
        <li>
            <a href="{{ route('component.category.index') }}" class="text-decoration-none">
                Category
            </a>
        </li>
        <li>
            <a href="{{ route('component.style.index') }}" class="text-decoration-none">
                Style
            </a>
        </li>
        <li>
            <a href="{{ route('component.medium.index') }}" class="text-decoration-none">
                Medium
            </a>
        </li>
        <li>
            <a href="{{ route('component.material.index') }}" class="text-decoration-none">
                Material
            </a>
        </li>
        <li>
            <a href="{{ route('component.size.index') }}" class="text-decoration-none">
                Size
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <!-- <a class="btn btn-primary dropdown-menu" aria-labelledby="navbarDropdown" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a> -->
            </div>
        </li>
    </ul>
  </div>
</nav>


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
