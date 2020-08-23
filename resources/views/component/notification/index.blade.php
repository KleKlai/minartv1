@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <div class="card">
                @forelse($data as $notification)
                    <div class="card-body">
                        {{ $notification->data['data'] }}
                    </div>
                @empty
                    Empty
                @endforelse
            </div>

        </div>
    </div>
</div>
@endsection
