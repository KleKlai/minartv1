@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    Artwork Details
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Status</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->status }}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control-plaintext" value="{{ $artwork->subject }}" readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="country">Country</label>
                        <input type="text" class="form-control-plaintext" value="{{ $artwork->country }}" readonly>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="category">Category</label>
                        <input type="text" class="form-control-plaintext" value="{{ $artwork->category }}" readonly>
                    </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="style">Style</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->style }}" readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="medium">Medium</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->medium }}" readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="material">Material</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->material }}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="size">Size <span class="text-muted">( Optional )</span></label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->size }}" readonly>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="height">Height</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->height }}" readonly>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="country">Width</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->width }}" readonly>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="depth">Depth</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->depth }}" readonly>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="price">Price</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control-plaintext" value="{{ $artwork->price }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="description">Description <span class="text-muted">( Optional )</span></label>
                    <textarea name="description" class="form-control-plaintext" rows="3" readonly>{{ $artwork->price }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="attachment">Upload product photo <span class="text-muted">( Optional )</span></label>
                        <div class="custom-file">
                            <a href="#download">Download</a>
                        </div>
                    </div>

                    <form action="{{ route('artwork.destroy', $artwork) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-xs">Trash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
