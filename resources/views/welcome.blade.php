<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cinema Booking System</title>

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-gray-100">
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-xl shadow-lg">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">Cinema Booking System</h1>
                    <p class="text-gray-600">Welcome to our modern cinema booking platform</p>
                </div>
                <div class="mt-8 space-y-4">
                    <a href="{{ route('movies') }}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        View Movies
                    </a>
                    <button class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-indigo-600 bg-white border-indigo-600 hover:bg-indigo-50">
                        Book Tickets
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>
