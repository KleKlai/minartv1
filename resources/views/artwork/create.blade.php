@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">

            <form action="{{ route('artwork.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="subject">Subject</label>
                    <select name="subject" class="form-control" value="{{ old('subject') }}" required>
                        <option value="">-</option>
                        @foreach($subject as $subject)
                            <option value="{{ $subject->name }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="country">Country</label>
                    <select name="country" class="form-control" value="{{ old('country') }}" required>
                        <option value="">-</option>
                        @foreach($country as $country)
                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="category">Category</label>
                    <select name="category" class="form-control" value="{{ old('category') }}" required>
                        <option value="">-</option>
                        @foreach($category as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="style">Style</label>
                        <select name="style" class="form-control" value="{{ old('style') }}" required>
                            <option value="">-</option>
                            @foreach($style as $style)
                                <option value="{{ $style->name }}">{{ $style->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="medium">Medium</label>
                        <select name="medium" class="form-control" value="{{ old('medium') }}" required>
                            <option value="">-</option>
                            @foreach($medium as $medium)
                                <option value="{{ $medium->name }}">{{ $medium->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="material">Material</label>
                        <select name="material" class="form-control" value="{{ old('material') }}" required>
                            <option value="">-</option>
                            @foreach($material as $material)
                                <option value="{{ $material->name }}">{{ $material->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="size">Size <span class="text-muted">( Optional )</span></label>
                        <select name="size" class="form-control" value="{{ old('size') }}">
                            <option value="">-</option>
                            @foreach($size as $size)
                                <option value="{{ $size->name }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="height">Height</label>
                        <input type="number" class="form-control" name="height" placeholder="(in cm)" min="0" value="{{ old('height') }}" required>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="country">Width</label>
                        <input type="number" class="form-control" name="width" placeholder="(in cm)" min="0" value="{{ old('width') }}" required>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="depth">Depth</label>
                        <input type="number" class="form-control" name="depth" placeholder="(in cm)" min="0" value="{{ old('depth') }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="price">Price</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text">₱</div>
                            </div>
                            <input type="number" class="form-control" name="price" min="0" value="{{ old('price') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="attachment">Upload product photo</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="attachment" aria-describedby="Product Image" value="{{ old('attachment') }}">
                        <label class="custom-file-label" for="attachment">Choose file</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="#cancel" class="btn border-none">Cancel</a>
            </form>

        </div>
    </div>
</div>
@endsection
