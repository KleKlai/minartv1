@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mb-3">
            <img class="picture mb-1 mx-auto d-block" src="{{ url('storage/artwork/'.$artwork->attachment) }}" alt="Artwork Picture" style="max-width:400px; max-height: 800px;">

            <form action="{{ route('artwork.destroy', $artwork) }}" method="POST">
                @csrf
                @method('DELETE')

                @canany(['curator', 'administrator'])
                <a href="javascript:void()" class="btn btn-warning btn-sm mb-2" data-toggle="modal" data-target="#categoryModal">Update Status</a>
                @endcanany

                <a href="" class="btn btn-danger btn-sm mb-2"  data-toggle="modal" data-target="#confirmDeleteModal" style="display: {{ $artwork->status == 'Approve' ? 'none' : '' }};">Delete</a>

                <a href="{{ route('artwork.edit', $artwork) }}" class="btn btn-secondary btn-sm mb-2" style="display: {{ $artwork->status == 'Approve' ? 'none' : '' }};">
                    Edit
                </a>

            </form>
        </div>
        <div class="col">

            <div class="card">
                <div class="card-header">
                    Artwork Details
                    <span class="badge badge-primary float-right">{{ $artwork->status }}</span>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        @can('administrator')
                        <div class="form-group col-md-4">
                             <label class="text-muted" for="name">Group:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->category }}" readonly>
                        </div>
                        <div class="form-group col-md-8">
                            <label class="text-muted"for="name">Gallery:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->user->subcategory }}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="text-muted"for="name">Artist:</label>
                            <a href="{{ route('user.show', $artwork->user) }}">
                                <input type="text" class="form-control-plaintext" value="{{ $artwork->user->name }}" readonly>
                            </a>
                        </div>
                        @endcan
                        <div class="form-group col-md-8">
                             <label class="text-muted" for="name">Title:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->title }}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-4">
                         <label class="text-muted" for="subject">Subject:</label>
                        <input type="text" class="form-control-plaintext" value="{{ $artwork->subject }}" readonly>
                    </div>

                    <div class="form-group col-md-4">
                         <label class="text-muted" for="city">City:</label>
                        <input type="text" class="form-control-plaintext" value="{{ $artwork->city }}" readonly>
                    </div>

                    <div class="form-group col-md-4">
                         <label class="text-muted" for="category">Category:</label>
                        <input type="text" class="form-control-plaintext" value="{{ $artwork->category }}" readonly>
                    </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                             <label class="text-muted" for="style">Style:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->style }}" readonly>
                        </div>

                        <div class="form-group col-md-4">
                             <label class="text-muted" for="medium">Medium:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->medium }}" readonly>
                        </div>

                        <div class="form-group col-md-4">
                             <label class="text-muted" for="material">Material:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->material }}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                             <label class="text-muted" for="size">Size:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->size }}" readonly>
                        </div>

                        <div class="form-group col-md-2">
                             <label class="text-muted" for="height">Height:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->height }} cm" readonly>
                        </div>

                        <div class="form-group col-md-2">
                             <label class="text-muted" for="width">Width:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->width }} cm" readonly>
                        </div>

                        <div class="form-group col-md-2">
                             <label class="text-muted" for="depth">Depth:</label>
                            <input type="text" class="form-control-plaintext" value="{{ $artwork->depth }} cm" readonly>
                        </div>

                        <div class="form-group col-md-3">
                             <label class="text-muted" for="price">Price:</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control-plaintext" value="₱ {{ $artwork->price }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                     <label class="text-muted" for="description">Description:</span></label>
                    <textarea name="description" class="form-control-plaintext" rows="3" style="height: 200px; font-style: italic;" readonly>{{ $artwork->description }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Update Modal -->
            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="{{ route('status.change', $artwork) }}">
                            @csrf
                            @method('PATCH')

                            <div class="modal-body">
                                <div class="form-group">
                                     <label class="text-muted" for="name">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Pending" {{ $artwork->status == 'Pending' ? 'selected' : ''  }}>Pending</option>
                                        <option value="Approve" {{ $artwork->status == 'Approve' ? 'selected' : ''  }}>Approve</option>
                                        <option value="Revise" {{ $artwork->status == 'Revise' ? 'selected' : ''  }}>Revise</option>
                                        <option value="Reject" {{ $artwork->status == 'Reject' ? 'selected' : ''  }}>Reject</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                     <label class="text-muted" for="remarks">Remarks</label>
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

            <!-- Delete Modal -->
            <div id="confirmDeleteModal" class="modal fade">
                <div class="modal-dialog modal-confirm modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header flex-column">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h4 class="modal-title w-100">Are you sure?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to delete these records? This process cannot be undone.</p>
                        </div>
                        <form action="{{ route('artwork.destroy', $artwork) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
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
