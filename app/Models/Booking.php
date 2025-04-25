<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'movie_id',
        'seat_number',
        'booking_date',
        'show_time',
        'total_amount',
        'booking_status',
        'ticket_number',
    ];

    protected $casts = [
        'booking_date' => 'date',
        'show_time' => 'datetime',
        'total_amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
} 