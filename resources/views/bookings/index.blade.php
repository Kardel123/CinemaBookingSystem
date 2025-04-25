@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2>My Bookings</h2>
        </div>
    </div>

    @if($bookings->isEmpty())
        <div class="alert alert-info">
            You haven't made any bookings yet. <a href="{{ route('movies') }}">Browse movies</a> to book your first ticket!
        </div>
    @else
        <div class="row">
            @foreach($bookings as $booking)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Ticket #{{ $booking->ticket_number }}</span>
                        <span class="badge bg-{{ $booking->booking_status === 'confirmed' ? 'success' : 'warning' }}">
                            {{ ucfirst($booking->booking_status) }}
                        </span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $booking->movie->title }}</h5>
                        <div class="row mb-2">
                            <div class="col-md-4 text-muted">Date:</div>
                            <div class="col-md-8">{{ $booking->booking_date->format('F d, Y') }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 text-muted">Show Time:</div>
                            <div class="col-md-8">{{ $booking->show_time }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 text-muted">Seat:</div>
                            <div class="col-md-8">{{ $booking->seat_number }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 text-muted">Amount:</div>
                            <div class="col-md-8">${{ number_format($booking->total_amount, 2) }}</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-primary">View Ticket</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection 