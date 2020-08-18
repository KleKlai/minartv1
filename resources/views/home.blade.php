@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">

            <a class="" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

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
                            {{--  @foreach ($products as $product)  --}}
                                {{--  <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->artist->name }}</td>
                                    <td>{{ $product->country->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->size->name ?? '' }}</td>
                                    <td>{{ $product->dimension_height }} x {{ $product->dimension_width }} {{ $product->dimension_depth ? 'x ' . $product->dimension_depth : '' }} cm</td>
                                    <td>{{ $product->subject->name }}</td>
                                    <td>{{ $product->style->name }}</td>
                                    <td>{{ $product->medium->name }}</td>
                                    <td>{{ $product->material->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td class="w-12">
                                        <div class="flex">
                                            <a class="nav-link navbar-toggler border-none flex items-center" href="{{ route('product.edit', $product->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>  --}}
                            {{--  @endforeach  --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
