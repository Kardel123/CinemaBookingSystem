@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f8f9fa;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
    .split-container {
        display: flex;
        background: white;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        margin: 2rem auto;
        max-width: 1000px;
    }
    .left-side {
        flex: 1;
        background: linear-gradient(45deg, #6c5ce7, #a29bfe);
        padding: 3rem;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    .slideshow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .slideshow-item {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        animation: slideshow 24s linear infinite;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .slideshow-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, rgba(108, 92, 231, 0.6), rgba(162, 155, 254, 0.6));
    }
    .slideshow-item:nth-child(1) {
        background-image: url('https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3');
        animation-delay: 0s;
    }
    .slideshow-item:nth-child(2) {
        background-image: url('https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?ixlib=rb-4.0.3');
        animation-delay: 6s;
    }
    .slideshow-item:nth-child(3) {
        background-image: url('https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?ixlib=rb-4.0.3');
        animation-delay: 12s;
    }
    .slideshow-item:nth-child(4) {
        background-image: url('https://images.unsplash.com/photo-1440404653325-ab127d49abc1?ixlib=rb-4.0.3');
        animation-delay: 18s;
    }
    @keyframes slideshow {
        0%, 20% {
            opacity: 1;
            transform: scale(1.1);
        }
        25%, 95% {
            opacity: 0;
            transform: scale(1);
        }
        100% {
            opacity: 1;
            transform: scale(1.1);
        }
    }
    .content-wrapper {
        position: relative;
        z-index: 2;
    }
    .right-side {
        flex: 1;
        padding: 3rem;
        background: white;
    }
    .heading {
        font-size: 2.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }
    .subheading {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 2rem;
        position: relative;
        z-index: 1;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }
    .form-control {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        padding: 0.8rem 1rem;
        font-size: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        background: #fff;
        border-color: #6c5ce7;
        box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.1);
    }
    .form-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 0.5rem;
    }
    .btn-primary {
        background: linear-gradient(45deg, #6c5ce7, #a29bfe);
        border: none;
        padding: 0.8rem;
        font-size: 1rem;
        border-radius: 0.5rem;
        width: 100%;
        margin-top: 1rem;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background: linear-gradient(45deg, #5b4dd1, #8f84fe);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 92, 231, 0.2);
    }
    .social-login {
        margin-top: 2rem;
        text-align: center;
    }
    .social-login .divider {
        display: flex;
        align-items: center;
        text-align: center;
        color: #6c757d;
        margin: 1.5rem 0;
    }
    .social-login .divider::before,
    .social-login .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #dee2e6;
    }
    .social-login .divider span {
        padding: 0 1rem;
    }
    .social-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }
    .social-btn {
        flex: 1;
        padding: 0.8rem;
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
        background: white;
        color: #495057;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    .social-btn:hover {
        background: #f8f9fa;
        transform: translateY(-2px);
    }
    .social-btn img {
        width: 20px;
        height: 20px;
    }
    @media (max-width: 768px) {
        .split-container {
            flex-direction: column;
            margin: 0;
            border-radius: 0;
        }
        .left-side {
            padding: 2rem;
        }
        .right-side {
            padding: 2rem;
        }
    }
</style>

<div class="split-container">
    <div class="left-side">
        <div class="slideshow">
            <div class="slideshow-item"></div>
            <div class="slideshow-item"></div>
            <div class="slideshow-item"></div>
            <div class="slideshow-item"></div>
        </div>
        <div class="content-wrapper">
            <h1 class="heading">Capturing Moments,<br>Creating Memories</h1>
            <p class="subheading">Book your favorite movies and create lasting memories with us.</p>
        </div>
    </div>
    
    <div class="right-side">
        <h2 class="mb-4">Welcome Back</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                    id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                    id="password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary">Sign In</button>

            <div class="social-login">
                <div class="divider">
                    <span>Or continue with</span>
                </div>
                <div class="social-buttons">
                    <a href="#" class="social-btn">
                        <img src="https://www.google.com/favicon.ico" alt="Google">
                        Google
                    </a>
                    <a href="#" class="social-btn">
                        <img src="https://www.apple.com/favicon.ico" alt="Apple">
                        Apple
                    </a>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="mb-0">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-decoration-none" style="color: #6c5ce7">Sign up</a>
                </p>
                @if (Route::has('password.request'))
                    <a class="text-decoration-none text-muted mt-2 d-block" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection 