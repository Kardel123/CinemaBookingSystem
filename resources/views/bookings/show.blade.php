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
        max-width: 900px;
        margin: 40px auto;
        background: #fff;
        border: 1px solid #bbb;
        border-radius: 6px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        overflow: hidden;
        font-family: 'Segoe UI', Arial, sans-serif;
    }
    .ticket-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 24px 32px 12px 32px;
        border-bottom: 1px solid #eee;
        background: #fafbfc;
    }
    .ticket-header h2 {
        font-size: 1.6rem;
        font-weight: 600;
        margin: 0;
    }
    .ticket-main {
        display: flex;
        flex-wrap: wrap;
        padding: 0;
        position: relative;
    }
    .ticket-details {
        flex: 2;
        padding: 32px 32px 24px 32px;
        min-width: 320px;
    }
    .ticket-details .ticket-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .ticket-details .ticket-location {
        font-size: 1rem;
        color: #222;
        margin-bottom: 8px;
    }
    .ticket-details .ticket-datetime {
        font-weight: 700;
        margin-bottom: 18px;
        font-size: 1.1rem;
    }
    .ticket-details .ticket-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        margin-top: 18px;
        font-size: 1rem;
    }
    .ticket-details .ticket-meta-label {
        color: #666;
        font-size: 0.95rem;
        font-weight: 500;
    }
    .ticket-details .ticket-meta-value {
        font-weight: 600;
        color: #222;
    }
    .ticket-qr-section {
        flex: 1;
        min-width: 220px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        background: #f7f7f7;
        padding: 32px 0;
    }
    .ticket-movie-poster {
        width: 150px;
        height: 220px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        margin-bottom: 18px;
        background: #eee;
    }
    .ticket-qr-inner {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        padding: 16px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .ticket-qr-inner img, .ticket-qr-inner svg {
        width: 150px;
        height: 150px;
        margin-bottom: 10px;
    }
    .ticket-footer {
        text-align: center;
        color: #888;
        font-size: 0.95rem;
        padding: 12px 0 10px 0;
        background: #fafbfc;
        border-top: 1px solid #eee;
    }
    /* Perforation (cutout) effect */
    .ticket-perforation {
        position: absolute;
        top: 32px;
        bottom: 32px;
        left: calc(66.66% - 16px); /* Adjust based on flex ratio */
        width: 0;
        border-left: 2px dashed #bbb;
        z-index: 2;
        pointer-events: none;
    }
    .ticket-perforation-dot {
        position: absolute;
        left: -8px;
        width: 16px;
        height: 16px;
        background: #fff;
        border-radius: 50%;
        border: 2px solid #bbb;
        z-index: 3;
    }
    .ticket-perforation-dot.top {
        top: -16px;
    }
    .ticket-perforation-dot.bottom {
        bottom: -16px;
    }
    @media (max-width: 700px) {
        .ticket-main {
            flex-direction: column;
        }
        .ticket-details {
            border-right: none;
            border-bottom: 1px solid #eee;
        }
        .ticket-qr-section {
            padding: 24px 0;
        }
        .ticket-perforation, .ticket-perforation-dot {
            display: none;
        }
    }
</style>

<div class="ticket-container">
    <div class="ticket-header">
        <h2>This is your ticket</h2>
    </div>
    <div class="ticket-main">
        <div class="ticket-details">
            <div class="ticket-title">{{ $booking->movie->title }}</div>
            <div class="ticket-location">Cinema Hall, {{ config('app.name') }}</div>
            <div class="ticket-datetime">
                {{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}, {{ $booking->show_time }}
            </div>
            <div class="ticket-meta">
                <div>
                    <div class="ticket-meta-label">ISSUED TO</div>
                    <div class="ticket-meta-value">{{ $booking->user->name }}</div>
                </div>
                <div>
                    <div class="ticket-meta-label">ORDER NUMBER</div>
                    <div class="ticket-meta-value">{{ $booking->ticket_number }}<br><span style="font-size:0.9em; color:#888;">Registered<br>{{ \Carbon\Carbon::parse($booking->created_at)->format('M d, Y') }}</span></div>
                </div>
                <div>
                    <div class="ticket-meta-label">TICKET</div>
                    <div class="ticket-meta-value">{{ $booking->movie->title }}<br>Seat: {{ $booking->seat_number }}</div>
                </div>
                <div>
                    <div class="ticket-meta-label">AMOUNT</div>
                    <div class="ticket-meta-value">${{ number_format($booking->total_amount, 2) }}</div>
                </div>
            </div>
        </div>
        <!-- Perforation (cutout) -->
        <div class="ticket-perforation">
            <div class="ticket-perforation-dot top"></div>
            <div class="ticket-perforation-dot bottom"></div>
        </div>
        <div class="ticket-qr-section">
            <img src="{{ $booking->movie->image_url }}" alt="{{ $booking->movie->title }}" class="ticket-movie-poster">
            <div class="ticket-qr-inner">
                {!! $qrCode->size(150)->generate($ticketData) !!}
            </div>
        </div>
    </div>
    <div class="ticket-footer">
        &copy; {{ date('Y') }} Cinema Booking System. All Rights Reserved.
    </div>
</div>
@endsection 