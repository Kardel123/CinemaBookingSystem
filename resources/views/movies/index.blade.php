<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movies - Cinema Booking System</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>
<body class="bg-black text-white">
    <!-- Navigation -->
    <nav class="bg-black/90 fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-red-600 text-2xl font-bold">CINEMA</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-gray-300 hover:text-white">Home</a>
                    <a href="/movies" class="text-gray-300 hover:text-white">Movies</a>
                    @auth
                        <a href="{{ route('bookings.index') }}" class="text-gray-300 hover:text-white">My Bookings</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-300 hover:text-white">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-300 hover:text-white">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Swiper -->
    <div class="relative h-[80vh]">
        <div class="swiper heroSwiper h-full">
            <div class="swiper-wrapper">
                @foreach($nowShowing as $movie)
                <div class="swiper-slide relative">
                    <div class="absolute inset-0">
                        <img src="{{ $movie->image_url }}" alt="{{ $movie->title }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-transparent"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 p-8 md:p-16 max-w-3xl">
                        <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $movie->title }}</h1>
                        <div class="flex items-center space-x-4 mb-4">
                            <span class="text-green-500 font-semibold">98% Match</span>
                            <span class="text-gray-300">{{ $movie->genre }}</span>
                            <span class="border border-gray-500 px-2 py-1 text-sm">PG-13</span>
                            <span class="text-gray-300">{{ $movie->duration }}</span>
                        </div>
                        <p class="text-lg text-gray-300 mb-6">{{ $movie->description }}</p>
                        <div class="flex space-x-4">
                            <a href="{{ route('bookings.create', $movie->id) }}" class="bg-red-600 text-white px-8 py-3 rounded-md hover:bg-red-700 flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                </svg>
                                Book Tickets
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- Movie Categories -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Now Showing -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-4">Now Showing</h2>
            <div class="swiper movieSwiper">
                <div class="swiper-wrapper">
                    @foreach($nowShowing as $movie)
                    <div class="swiper-slide">
                        <div class="movie-card group">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="{{ $movie->image_url }}" alt="{{ $movie->title }}" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-300">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition duration-300">
                                    <div class="absolute bottom-0 left-0 right-0 p-4 transform translate-y-full group-hover:translate-y-0 transition duration-300">
                                        <h3 class="text-lg font-semibold">{{ $movie->title }}</h3>
                                        <p class="text-sm text-gray-300">{{ $movie->genre }}</p>
                                        <a href="{{ route('bookings.create', $movie->id) }}" class="mt-2 bg-red-600 text-white px-4 py-1 rounded-md text-sm hover:bg-red-700 inline-block">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

        <!-- Coming Soon -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-4">Coming Soon</h2>
            <div class="swiper movieSwiper">
                <div class="swiper-wrapper">
                    @foreach($comingSoon as $movie)
                    <div class="swiper-slide">
                        <div class="movie-card group">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="{{ $movie->image_url }}" alt="{{ $movie->title }}" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-300">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition duration-300">
                                    <div class="absolute bottom-0 left-0 right-0 p-4 transform translate-y-full group-hover:translate-y-0 transition duration-300">
                                        <h3 class="text-lg font-semibold">{{ $movie->title }}</h3>
                                        <p class="text-sm text-gray-300">{{ $movie->genre }}</p>
                                        <button class="mt-2 bg-gray-600 text-white px-4 py-1 rounded-md text-sm cursor-not-allowed" disabled>Coming Soon</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <script>
        // Initialize Hero Swiper
        const heroSwiper = new Swiper('.heroSwiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        // Initialize Movie Swipers
        const movieSwipers = document.querySelectorAll('.movieSwiper');
        movieSwipers.forEach(swiper => {
            new Swiper(swiper, {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                    1280: {
                        slidesPerView: 5,
                    },
                },
            });
        });
    </script>

    <style>
        body {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: #fff;
        }
        .movie-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        .movie-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #fff;
        }
        .card-text {
            color: #ccc;
        }
        .badge {
            background: linear-gradient(45deg, #6c5ce7, #a29bfe) !important;
        }
        .text-muted {
            color: #ccc !important;
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
        .btn-secondary {
            background: linear-gradient(45deg, #636e72, #b2bec3);
            border: none;
        }
        .card-footer {
            background: rgba(255, 255, 255, 0.05) !important;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        h2 {
            color: #fff;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
    </style>
</body>
</html> 