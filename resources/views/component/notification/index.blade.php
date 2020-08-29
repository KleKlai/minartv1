@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            @if(auth()->user()->unreadNotifications->count() != 0)
                <a class="btn btn-link ml-1" href="{{ route('notification.clear') }}">
                    Mark all as read
                </a>
            @endif

            @forelse($data as $notification)
                <a class="nav-link" href="{{ route('notification.view.read', $notification->id) }}">
                    <div class="card">
                        <div class="card-body">
                            @if($notification->read_at == '')
                                <span class="badge badge-primary">New</span>
                            @endif
                            {{ $notification->data['data'] }}
                            <span class="text-muted">- {{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="container text-center text-muted">
                    <h3>No notifications for now.</h3>
                    <img src="{{ asset('images/assets/No_Notifications.png') }}" alt="No Result Found" width="300" class="mb-4 mx-auto d-block">
                </div>
            @endforelse

        </div>
    </div>
</div>
@endsection
