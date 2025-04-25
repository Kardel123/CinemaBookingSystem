<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function showBookingForm($movieId)
    {
        $movie = Movie::findOrFail($movieId);
        return view('bookings.create', compact('movie'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'seat_number' => 'required|string',
            'booking_date' => 'required|date',
            'show_time' => 'required',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'movie_id' => $request->movie_id,
            'seat_number' => $request->seat_number,
            'booking_date' => $request->booking_date,
            'show_time' => $request->show_time,
            'total_amount' => $request->total_amount,
            'ticket_number' => 'TKT-' . Str::random(8),
            'booking_status' => 'confirmed',
        ]);

        return redirect()->route('bookings.show', $booking->id)
            ->with('success', 'Ticket booked successfully!');
    }

    public function show($id)
    {
        $booking = Booking::with(['movie', 'user'])->findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    public function index()
    {
        $bookings = auth()->user()->bookings()->with('movie')->latest()->get();
        return view('bookings.index', compact('bookings'));
    }
} 