@extends('layouts.app')

@section('content')
@php
    $qrCode = new \SimpleSoftwareIO\QrCode\Generator();
    $ticketData = json_encode([
        'ticket_number' => $booking->ticket_number,
        'movie' => $booking->movie->title,
        'date' => $booking->booking_date->format('Y-m-d'),
        'time' => $booking->show_time,
        'seat' => $booking->seat_number
    ]);
@endphp

<style>
    .ticket-container {
        max-width: 800px;
        margin: 0 auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        position: relative;
        overflow: hidden;
    }
    .ticket-header {
        background: linear-gradient(45deg, #1a1a1a, #333);
        color: white;
        padding: 2rem;
        text-align: center;
        position: relative;
    }
    .ticket-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: repeating-linear-gradient(
            90deg,
            #fff,
            #fff 10px,
            transparent 10px,
            transparent 20px
        );
    }
    .ticket-body {
        padding: 2rem;
        position: relative;
    }
    .ticket-body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: repeating-linear-gradient(
            90deg,
            #fff,
            #fff 10px,
            transparent 10px,
            transparent 20px
        );
    }
    .ticket-details {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }
    .ticket-detail {
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 5px;
    }
    .ticket-detail-label {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 0.5rem;
    }
    .ticket-detail-value {
        font-size: 1.1rem;
        font-weight: 500;
    }
    .ticket-footer {
        background: #f8f9fa;
        padding: 1.5rem;
        text-align: center;
        border-top: 1px dashed #ddd;
    }
    .ticket-number {
        font-family: 'Courier New', monospace;
        font-size: 1.2rem;
        color: #e50914;
        margin-bottom: 1rem;
    }
    .ticket-qr {
        width: 150px;
        height: 150px;
        margin: 1rem auto;
        padding: 10px;
        background: white;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .ticket-qr img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    @media print {
        .ticket-container {
            box-shadow: none;
        }
        .ticket-header::after,
        .ticket-body::before {
            display: none;
        }
        .ticket-footer {
            border-top: 1px solid #ddd;
        }
    }
</style>

<div class="container py-5">
    <div class="ticket-container">
        <div class="ticket-header">
            <h2 class="mb-3">Movie Ticket</h2>
            <div class="ticket-number">Ticket #{{ $booking->ticket_number }}</div>
        </div>
        
        <div class="ticket-body">
            <div class="ticket-details">
                <div class="ticket-detail">
                    <div class="ticket-detail-label">Movie</div>
                    <div class="ticket-detail-value">{{ $booking->movie->title }}</div>
                </div>
                <div class="ticket-detail">
                    <div class="ticket-detail-label">Date</div>
                    <div class="ticket-detail-value">{{ $booking->booking_date->format('F d, Y') }}</div>
                </div>
                <div class="ticket-detail">
                    <div class="ticket-detail-label">Show Time</div>
                    <div class="ticket-detail-value">{{ $booking->show_time }}</div>
                </div>
                <div class="ticket-detail">
                    <div class="ticket-detail-label">Seat</div>
                    <div class="ticket-detail-value">{{ $booking->seat_number }}</div>
                </div>
                <div class="ticket-detail">
                    <div class="ticket-detail-label">Amount</div>
                    <div class="ticket-detail-value">${{ number_format($booking->total_amount, 2) }}</div>
                </div>
                <div class="ticket-detail">
                    <div class="ticket-detail-label">Status</div>
                    <div class="ticket-detail-value">
                        <span class="badge bg-success">{{ ucfirst($booking->booking_status) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="ticket-footer">
            <div class="ticket-qr">
                {!! $qrCode->size(150)->generate($ticketData) !!}
            </div>
            <p class="text-muted mb-3">Please present this ticket at the cinema</p>
            <button class="btn btn-primary" onclick="window.print()">Print Ticket</button>
        </div>
    </div>
</div>
@endsection 