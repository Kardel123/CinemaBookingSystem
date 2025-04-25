@extends('layouts.app')

@section('content')
<style>
    .welcome-section {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                    url('https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1925&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
        padding: 4rem 0;
        margin-bottom: 2rem;
    }
    .movie-card {
        transition: transform 0.3s ease;
        background: rgba(255, 255, 255, 0.95);
    }
    .movie-card:hover {
        transform: translateY(-5px);
    }
    .movie-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
    .movie-genre {
        font-size: 0.9rem;
        color: #666;
    }
    .book-now-btn {
        background-color: #e50914;
        border-color: #e50914;
    }
    .book-now-btn:hover {
        background-color: #b2070f;
        border-color: #b2070f;
    }
</style>

<div class="welcome-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="display-4 mb-3">Welcome to Cinema Booking System</h1>
                <p class="lead">Book your favorite movies with just a few clicks!</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-4 mb-4">
            <div class="card movie-card h-100">
                @if($movie->image_url)
                    <img src="{{ $movie->image_url }}" class="card-img-top" alt="{{ $movie->title }}" style="height: 300px; object-fit: cover;">
                @else
                    <div class="card-img-top bg-dark text-white d-flex align-items-center justify-content-center" style="height: 300px;">
                        <span class="movie-title">{{ $movie->title }}</span>
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title movie-title">{{ $movie->title }}</h5>
                    <p class="card-text">{{ Str::limit($movie->description, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-primary">{{ $movie->genre }}</span>
                        <span class="text-muted">{{ $movie->duration }}</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ route('bookings.create', $movie->id) }}" class="btn btn-primary book-now-btn w-100">Book Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
