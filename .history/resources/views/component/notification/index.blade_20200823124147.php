@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

                @forelse($data as $notification)
            <a class="nav-link" href="/artwork/5820a44f-61f3-45cd-a924-d50dc7f01a19">
                <div class="card">
                        <div class="card-body">
                            {{ $notification->data['data'] }}
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
