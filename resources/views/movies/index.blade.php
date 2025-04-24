<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movies - Cinema Booking System</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white">
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
                    <a href="#" class="text-gray-300 hover:text-white">My Bookings</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative h-[80vh]">
        <div class="absolute inset-0">
            <img src="{{ asset('storage/assets/images/movies/hero.jpg') }}" alt="Featured Movie" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/70 to-transparent"></div>
        </div>
        <div class="absolute bottom-0 left-0 p-8 md:p-16 max-w-3xl">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $nowShowing[0]['title'] }}</h1>
            <div class="flex items-center space-x-4 mb-4">
                <span class="text-green-500 font-semibold">98% Match</span>
                <span class="text-gray-300">{{ $nowShowing[0]['genre'] }}</span>
                <span class="border border-gray-500 px-2 py-1 text-sm">PG-13</span>
                <span class="text-gray-300">2h 32m</span>
            </div>
            <p class="text-lg text-gray-300 mb-6">{{ $nowShowing[0]['description'] }}</p>
            <div class="flex space-x-4">
                <button class="bg-red-600 text-white px-8 py-3 rounded-md hover:bg-red-700 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                    </svg>
                    Book Tickets
                </button>
            </div>
        </div>
    </div>

    <!-- Movie Categories -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Now Showing -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-4">Now Showing</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach($nowShowing as $movie)
                <div class="movie-card group">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/assets/images/movies/' . $movie['image']) }}" alt="{{ $movie['title'] }}" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4 transform translate-y-full group-hover:translate-y-0 transition duration-300">
                                <h3 class="text-lg font-semibold">{{ $movie['title'] }}</h3>
                                <p class="text-sm text-gray-300">{{ $movie['genre'] }}</p>
                                <button class="mt-2 bg-red-600 text-white px-4 py-1 rounded-md text-sm hover:bg-red-700">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Coming Soon -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-4">Coming Soon</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach($comingSoon as $movie)
                <div class="movie-card group">
                    <div class="relative overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/assets/images/movies/' . $movie['image']) }}" alt="{{ $movie['title'] }}" class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4 transform translate-y-full group-hover:translate-y-0 transition duration-300">
                                <h3 class="text-lg font-semibold">{{ $movie['title'] }}</h3>
                                <p class="text-sm text-gray-300">{{ $movie['genre'] }}</p>
                                <button class="mt-2 bg-red-600 text-white px-4 py-1 rounded-md text-sm hover:bg-red-700">Coming Soon</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html> 