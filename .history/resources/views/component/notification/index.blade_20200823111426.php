@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <div class="card">
                @forelse($data as $notification)
                    <div class="card-body">
                    <dd>$notification->data['data']</dd>
                        {{ $notification->data['data'] }}
                    </div>
                @empty
                    <div class="container text-center text-muted">
                        <h3>No notifications for now</h3>
                        <img src="{{ asset('images/assets/rsz_gallery_empty.png') }}" alt="No Result Found" width="300" class="mb-4 mx-auto d-block">
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
@endsection