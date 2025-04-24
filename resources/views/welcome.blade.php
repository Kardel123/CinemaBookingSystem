<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cinema Booking System</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <style>
            .poster-grid {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                overflow: hidden;
                transform: rotate(-5deg) scale(1.2);
            }
            .poster-grid::after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(to bottom, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.7) 100%);
            }
            .poster-grid .grid {
                display: grid;
                grid-template-columns: repeat(8, 1fr);
                gap: 0.5rem;
                padding: 0.5rem;
                animation: scrollGrid 60s linear infinite;
            }
            .poster-grid .grid img {
                width: 100%;
                aspect-ratio: 2/3;
                object-fit: cover;
                border-radius: 0.25rem;
            }
            @keyframes scrollGrid {
                0% {
                    transform: translateY(0);
                }
                100% {
                    transform: translateY(-50%);
                }
            }
            .brand-logo {
                transition: all 0.5s ease-in-out;
                filter: grayscale(100%);
                opacity: 0.7;
            }
            .brand-logo:hover {
                filter: grayscale(0%);
                opacity: 1;
                transform: scale(1.1);
            }
            .swiper-slide-active .brand-logo {
                opacity: 1;
            }
        </style>
    </head>
    <body class="antialiased bg-black text-white">
        <!-- Movie Poster Grid Background -->
        <div class="poster-grid">
            <div class="grid">
                <!-- First set of posters -->
                <img src="{{ asset('storage/assets/images/movies/movie1.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie2.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie3.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie4.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie5.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie6.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie7.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie8.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie9.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie10.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie1.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie2.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie3.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie4.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie5.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie6.jpg') }}" alt="">
                <!-- Duplicate set for seamless scrolling -->
                <img src="{{ asset('storage/assets/images/movies/movie1.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie2.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie3.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie4.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie5.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie6.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie7.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie8.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie9.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie10.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie1.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie2.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie3.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie4.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie5.jpg') }}" alt="">
                <img src="{{ asset('storage/assets/images/movies/movie6.jpg') }}" alt="">
            </div>
        </div>

        <div class="min-h-screen flex flex-col items-center justify-center p-8 relative z-10">
            <!-- Login Form -->
            <div class="max-w-md w-full space-y-8 bg-black/60 p-8 rounded-xl backdrop-blur-sm">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-red-600 mb-2">CINEMA</h1>
                    <p class="text-gray-300">Welcome back! Please login to your account.</p>
                </div>
                <form class="mt-8 space-y-6" action="#" method="POST">
                    <div class="rounded-md shadow-sm space-y-4">
                        <div>
                            <label for="email" class="sr-only">Email address</label>
                            <input id="email" name="email" type="email" required class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-700 bg-gray-800/50 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 backdrop-blur-sm" placeholder="Email address">
                        </div>
                        <div>
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" name="password" type="password" required class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-700 bg-gray-800/50 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 backdrop-blur-sm" placeholder="Password">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-700 bg-gray-800 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-300">Remember me</label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-red-600 hover:text-red-500">Forgot your password?</a>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>

            <!-- Brand Logos Static Row -->
            <div class="mt-16 w-full max-w-5xl mx-auto p-6">
                <div class="flex flex-wrap items-center justify-center gap-8">
                    <div class="flex items-center justify-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/69/IMDB_Logo_2016.svg" alt="IMDB" class="h-20 brand-logo object-contain">
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5b/Rotten_Tomatoes.svg" alt="Rotten Tomatoes" class="h-20 brand-logo object-contain">
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Metacritic.svg" alt="Metacritic" class="h-20 brand-logo object-contain">
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Netflix_2015_logo.svg" alt="Netflix" class="h-20 brand-logo object-contain">
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('storage/assets/images/logos/hbo-max.png') }}" alt="HBO Max" class="h-20 brand-logo object-contain">
                    </div>
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('storage/assets/images/logos/disney-plus.png') }}" alt="Disney+" class="h-20 brand-logo object-contain">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
