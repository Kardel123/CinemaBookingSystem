@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <h4>Welcome, {{ Auth::user()->name }}!</h4>
                    <p>You are now logged in to your account.</p>
                    
                    <div class="mt-4">
                        <h5>Quick Links</h5>
                        <div class="list-group">
                            <a href="{{ route('bookings.index') }}" class="list-group-item list-group-item-action">
                                View My Bookings
                            </a>
                            <a href="{{ route('movies') }}" class="list-group-item list-group-item-action">
                                Browse Movies
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 