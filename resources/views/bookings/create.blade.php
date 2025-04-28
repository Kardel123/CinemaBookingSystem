@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Book Tickets for {{ $movie->title }}</h3>
                </div>
                <div class="card-body">
                    <!-- Movie Preview Section -->
                    <div class="movie-preview mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ $movie->image_url }}" alt="{{ $movie->title }}" class="img-fluid rounded">
                            </div>
                            <div class="col-md-8">
                                <h4>{{ $movie->title }}</h4>
                                <div class="movie-details">
                                    <p><strong>Genre:</strong> {{ $movie->genre }}</p>
                                    <p><strong>Duration:</strong> {{ $movie->duration }}</p>
                                    <p><strong>Price:</strong> ${{ number_format($movie->price, 2) }}</p>
                                </div>
                                <p class="mt-2">{{ $movie->description }}</p>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('bookings.store') }}">
                        @csrf
                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                        
                        <div class="mb-4">
                            <label class="form-label">Select Date</label>
                            <input type="date" name="booking_date" class="form-control" required min="{{ date('Y-m-d') }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Select Show Time</label>
                            <select name="show_time" class="form-control" required>
                                <option value="">Choose a time...</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="13:00">1:00 PM</option>
                                <option value="16:00">4:00 PM</option>
                                <option value="19:00">7:00 PM</option>
                                <option value="22:00">10:00 PM</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Select Seats</label>
                            <div class="screen-container mb-4">
                                <div class="screen">SCREEN</div>
                            </div>
                            <div class="seat-container">
                                <div class="seat-legend mb-3">
                                    <div class="d-flex justify-content-center gap-4">
                                        <div class="seat-option">
                                            <div class="seat available"></div>
                                            <span>Available</span>
                                        </div>
                                        <div class="seat-option">
                                            <div class="seat selected"></div>
                                            <span>Selected</span>
                                        </div>
                                        <div class="seat-option">
                                            <div class="seat occupied"></div>
                                            <span>Occupied</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="seats">
                                    @for($row = 'A'; $row <= 'E'; $row++)
                                        <div class="row">
                                            <div class="row-label">{{ $row }}</div>
                                            @for($col = 1; $col <= 8; $col++)
                                                <div class="seat" 
                                                     data-seat="{{ $row }}{{ $col }}"
                                                     onclick="toggleSeat(this)">
                                                    <div class="seat-back"></div>
                                                    <div class="seat-bottom"></div>
                                                    <div class="seat-number">{{ $row }}{{ $col }}</div>
                                                </div>
                                            @endfor
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            <input type="hidden" name="seat_number" id="selectedSeats" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Total Amount</label>
                            <input type="number" name="total_amount" class="form-control" id="totalAmount" readonly>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Confirm Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .movie-preview {
        background: rgba(0, 0, 0, 0.05);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
    }
    .movie-preview img {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    .movie-preview img:hover {
        transform: scale(1.02);
    }
    .movie-details {
        margin: 15px 0;
    }
    .movie-details p {
        margin-bottom: 8px;
        color: #666;
    }
    .movie-details strong {
        color: #333;
    }
    .screen-container {
        perspective: 1000px;
        margin-bottom: 30px;
    }
    .screen {
        background: #fff;
        height: 70px;
        width: 100%;
        margin: 15px 0;
        transform: rotateX(-45deg);
        box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        font-weight: bold;
    }
    .seat-container {
        margin: 20px 0;
    }
    .seats {
        display: flex;
        flex-direction: column;
        gap: 15px;
        align-items: center;
    }
    .row {
        display: flex;
        gap: 15px;
        align-items: center;
    }
    .row-label {
        width: 20px;
        text-align: center;
        font-weight: bold;
    }
    .seat {
        width: 40px;
        height: 45px;
        position: relative;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .seat-back {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 60%;
        background: #2ecc71; /* Available seat - Green */
        border-radius: 5px 5px 0 0;
        transition: all 0.3s ease;
    }
    .seat-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 40%;
        background: #27ae60; /* Available seat bottom - Darker Green */
        border-radius: 0 0 5px 5px;
        transition: all 0.3s ease;
    }
    .seat-number {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 12px;
        font-weight: bold;
        z-index: 1;
    }
    .seat:hover .seat-back {
        background: #27ae60; /* Hover state - Darker Green */
    }
    .seat:hover .seat-bottom {
        background: #219a52; /* Hover state bottom - Even Darker Green */
    }
    .seat.selected .seat-back {
        background: #3498db; /* Selected seat - Blue */
    }
    .seat.selected .seat-bottom {
        background: #2980b9; /* Selected seat bottom - Darker Blue */
    }
    .seat.occupied .seat-back {
        background: #e74c3c; /* Occupied seat - Red */
    }
    .seat.occupied .seat-bottom {
        background: #c0392b; /* Occupied seat bottom - Darker Red */
    }
    .seat-legend {
        margin-bottom: 20px;
    }
    .seat-option {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .seat-option .seat {
        width: 20px;
        height: 25px;
    }
    .seat-option .seat .seat-back {
        background: #2ecc71; /* Available seat - Green */
    }
    .seat-option .seat .seat-bottom {
        background: #27ae60; /* Available seat bottom - Darker Green */
    }
    .seat-option .seat.selected .seat-back {
        background: #3498db; /* Selected seat - Blue */
    }
    .seat-option .seat.selected .seat-bottom {
        background: #2980b9; /* Selected seat bottom - Darker Blue */
    }
    .seat-option .seat.occupied .seat-back {
        background: #e74c3c; /* Occupied seat - Red */
    }
    .seat-option .seat.occupied .seat-bottom {
        background: #c0392b; /* Occupied seat bottom - Darker Red */
    }
    .seat-option .seat .seat-number {
        display: none;
    }
    .seat-option span {
        color: #fff;
        font-size: 14px;
    }
</style>

<script>
    let selectedSeats = [];
    const seatPrice = {{ $movie->price }};

    function toggleSeat(seat) {
        if (seat.classList.contains('occupied')) return;
        
        const seatNumber = seat.dataset.seat;
        const index = selectedSeats.indexOf(seatNumber);
        
        if (index === -1) {
            selectedSeats.push(seatNumber);
            seat.classList.add('selected');
        } else {
            selectedSeats.splice(index, 1);
            seat.classList.remove('selected');
        }
        
        updateSelectedSeats();
        updateTotalAmount();
    }

    function updateSelectedSeats() {
        document.getElementById('selectedSeats').value = selectedSeats.join(',');
    }

    function updateTotalAmount() {
        const total = selectedSeats.length * seatPrice;
        document.getElementById('totalAmount').value = total.toFixed(2);
    }

    // Simulate some occupied seats (in a real app, this would come from the database)
    document.addEventListener('DOMContentLoaded', function() {
        const seats = document.querySelectorAll('.seat');
        seats.forEach(seat => {
            if (Math.random() < 0.2) { // 20% chance of being occupied
                seat.classList.add('occupied');
            }
        });
    });
</script>
@endsection 