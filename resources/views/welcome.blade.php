<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <body class="bg-gray-100 h-screen flex items-center justify-center">
        <div class="flex flex-col justify-center items-center p-6 bg-white shadow-lg rounded-lg max-w-md w-full">
            <x-application-logo/>
            <p class="text-gray-600 mb-6">Please log in or register to continue.</p>
            <div class="space-x-4">
                @if (Route::has('login'))
                <div class="flex gap-5">
                    @auth
                    <a href="{{ url('/home') }}">
                        Home
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-200">Register</a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>`
    </body>
</body>
</html>
