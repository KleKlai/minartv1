@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 col-lg-auto">
            <img class="picture" src="/images/TBH_RWSX-55.jpg" alt="Artwork Picture">
            

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
                @can('administrator')
                    <a href="javascript:void()" class="btn btn-link" data-toggle="modal" data-target="#categoryModal">
                        Status
                    </a>
                @endcan
            </form>
            </div>
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
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                        <form method="POST" action="{{ route('artwork.update', $artwork) }}">
                            @csrf
                            @method('PATCH')

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Pending" {{ $artwork->status == 'Pending' ? 'selected' : ''  }}>Pending</option>
                                        <option value="Approve" {{ $artwork->status == 'Approve' ? 'selected' : ''  }}>Approve</option>
                                        <option value="Revise" {{ $artwork->status == 'Revise' ? 'selected' : ''  }}>Revise</option>
                                        <option value="Reject" {{ $artwork->status == 'Reject' ? 'selected' : ''  }}>Reject</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea class="form-control" name="remarks" name="remarks" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link text-decoration-none" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            @if (!empty($artwork->remarks))
                <div class="card mt-2">
                    <div class="card-header">
                        Remarks
                    </div>
                    <div class="card-body">
                        {{ $artwork->remarks }}
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
