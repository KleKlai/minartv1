@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('artwork.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Title</label>
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
                        <label for="city">City</label>
                        <input type="text" class="form-control" value="{{ old('city') }}" name="city" required>
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
                        <label for="width">Width</label>
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
                <textarea name="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="attachment">Upload Artwork Photo</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="form-control-file" name="file" onchange="readURL(this);"  aria-describedby="Product Image" value="{{ old('attachment') }}">
                            <!-- <label class="custom-file-label" for="attachment">Choose file</label> -->
                        </div>

                        <div class="mt-2">
                            <a href="/artwork" class="btn border-none">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <img id="imageView" src="" style="max-width:300px; max-height: 500px;"/>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
