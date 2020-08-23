@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <a class="btn btn-link ml-1" href="{{ route('markAllAsRead') }}">
                Mark all as read
            </a>

            @forelse($data as $notification)
                <a class="nav-link" href="{{ route('artwork.show', $notification->data['subject']) }}">
                    <div class="card">
                        <div class="card-body">
                            {{ $notification->data['data'] }}
                        </div>
                            <div class="card-footer">
                                @if($notification->read_at == '')
                                    <a href="{{ route('markRead', $notification->id) }}">
                                        <span class="badge badge-primary">New</span>
                                    </a>
                                @endif
                                {{ $notification->data['title'] }} - {{ $notification->created_at->diffForHumans() }}
                            </div>
                    </div>
                </a>
            @empty
                <div class="container text-center text-muted">
                    <h3>No notifications for now</h3>
                    <img src="{{ asset('images/assets/rsz_gallery_empty.png') }}" alt="No Result Found" width="300" class="mb-4 mx-auto d-block">
                </div>
            @endforelse

        </div>
    </div>
</div>
@endsection
