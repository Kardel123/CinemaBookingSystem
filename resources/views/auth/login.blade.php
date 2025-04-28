@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header text-center py-4">
                    <h3 class="mb-0">Welcome Back</h3>
                    <p class="mb-0">Sign in to your account</p>
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small">
                        <a href="{{ route('register') }}" class="text-decoration-none">
                            Need an account? Sign up!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                    url('https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1925&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: #2d3436;
    }
    .card {
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
    }
    .card-header {
        background: linear-gradient(45deg, #6c5ce7, #a29bfe) !important;
        color: white;
        border-bottom: none;
    }
    .form-control {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        color: #2d3436;
    }
    .form-control:focus {
        background: #fff;
        border-color: #6c5ce7;
        color: #2d3436;
        box-shadow: 0 0 0 0.25rem rgba(108, 92, 231, 0.1);
    }
    .form-floating label {
        color: #636e72;
    }
    .form-floating>.form-control:focus~label,
    .form-floating>.form-control:not(:placeholder-shown)~label {
        color: #6c5ce7;
    }
    .btn-primary {
        background: linear-gradient(45deg, #6c5ce7, #a29bfe);
        border: none;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background: linear-gradient(45deg, #a29bfe, #6c5ce7);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 92, 231, 0.2);
    }
    .form-check-input:checked {
        background-color: #6c5ce7;
        border-color: #6c5ce7;
    }
    .card-footer a {
        color: #6c5ce7;
        transition: all 0.3s ease;
    }
    .card-footer a:hover {
        color: #a29bfe;
        text-decoration: underline !important;
    }
    .invalid-feedback {
        color: #e17055;
    }
    .form-check-label {
        color: #636e72;
    }
</style>
@endsection 