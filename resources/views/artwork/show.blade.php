@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mb-3">
            <img class="picture mb-1" src="{{ url('storage/artwork/'.$artwork->attachment) }}" alt="Artwork Picture">

            <form action="{{ route('artwork.destroy', $artwork) }}" method="POST">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                @can('administrator')
                    <a href="javascript:void()" class="btn btn-warning" data-toggle="modal" data-target="#categoryModal">
                        Update Status
                    </a>
                @endcan
                <a class="btn btn-light" href="{{ route('download.attachment', $artwork) }}">Download</a>
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
                             <label class="text-muted"for="name">Status:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->status }}" readonly>
                        </div>
                        <div class="form-group col-md-8">
                             <label class="text-muted"for="name">Name:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-4">
                         <label class="text-muted"for="subject">Subject:</label>
                        <input type="text" class="form-control-plaintext" value="{{ $artwork->subject }}" readonly>
                    </div>

                    <div class="form-group col-md-4">
                         <label class="text-muted"for="country">Country:</label>
                        <input type="text" class="form-control-plaintext" value="{{ $artwork->country }}" readonly>
                    </div>

                    <div class="form-group col-md-4">
                         <label class="text-muted"for="category">Category:</label>
                        <input type="text" class="form-control-plaintext" value="{{ $artwork->category }}" readonly>
                    </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                             <label class="text-muted"for="style">Style:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->style }}" readonly>
                        </div>

                        <div class="form-group col-md-4">
                             <label class="text-muted"for="medium">Medium:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->medium }}" readonly>
                        </div>

                        <div class="form-group col-md-4">
                             <label class="text-muted"for="material">Material:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->material }}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                             <label class="text-muted"for="size">Size:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->size }}" readonly>
                        </div>

                        <div class="form-group col-md-2">
                             <label class="text-muted"for="height">Height:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->height }} cm" readonly>
                        </div>

                        <div class="form-group col-md-2">
                             <label class="text-muted"for="country">Width:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->width }} cm" readonly>
                        </div>

                        <div class="form-group col-md-2">
                             <label class="text-muted"for="depth">Depth:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->depth }} cm" readonly>
                        </div>

                        <div class="form-group col-md-3">
                             <label class="text-muted"for="price">Price:</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control-plaintext" value="₱ {{ $artwork->price }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                     <label class="text-muted"for="description">Description:</span></label>
                    <textarea name="description" class="form-control-plaintext" rows="3" readonly>{{ $artwork->description }}</textarea>
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
                                     <label class="text-muted"for="name">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Pending" {{ $artwork->status == 'Pending' ? 'selected' : ''  }}>Pending</option>
                                        <option value="Approve" {{ $artwork->status == 'Approve' ? 'selected' : ''  }}>Approve</option>
                                        <option value="Revise" {{ $artwork->status == 'Revise' ? 'selected' : ''  }}>Revise</option>
                                        <option value="Reject" {{ $artwork->status == 'Reject' ? 'selected' : ''  }}>Reject</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                     <label class="text-muted"for="remarks">Remarks</label>
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
