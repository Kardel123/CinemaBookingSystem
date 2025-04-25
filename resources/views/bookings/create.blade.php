@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book Ticket') }}</div>

                <div class="card-body">
                    <div class="movie-details mb-4">
                        <h3>{{ $movie->title }}</h3>
                        <p>{{ $movie->description }}</p>
                    </div>

                    <form method="POST" action="{{ route('bookings.store') }}">
                        @csrf
                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">

                        <div class="form-group row mb-3">
                            <label for="booking_date" class="col-md-4 col-form-label text-md-right">{{ __('Booking Date') }}</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('booking_date') is-invalid @enderror" name="booking_date" value="{{ old('booking_date') }}" required>
                                @error('booking_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="show_time" class="col-md-4 col-form-label text-md-right">{{ __('Show Time') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('show_time') is-invalid @enderror" name="show_time" required>
                                    <option value="">Select Show Time</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="13:00">1:00 PM</option>
                                    <option value="16:00">4:00 PM</option>
                                    <option value="19:00">7:00 PM</option>
                                </select>
                                @error('show_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="seat_number" class="col-md-4 col-form-label text-md-right">{{ __('Seat Number') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('seat_number') is-invalid @enderror" name="seat_number" required>
                                    <option value="">Select Seat</option>
                                    @for($i = 1; $i <= 50; $i++)
                                        <option value="A{{ $i }}">A{{ $i }}</option>
                                        <option value="B{{ $i }}">B{{ $i }}</option>
                                        <option value="C{{ $i }}">C{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('seat_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="total_amount" class="col-md-4 col-form-label text-md-right">{{ __('Total Amount') }}</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('total_amount') is-invalid @enderror" name="total_amount" value="10.00" readonly>
                                @error('total_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Book Ticket') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 