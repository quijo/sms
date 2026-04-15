<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">

            <div class="text-xl font-bold">
                SMS System
            </div>

            <div class="flex items-center space-x-4">

                @auth
                    <span class="text-gray-700">
                        Welcome, {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900">
                            Register
                        </a>
                    @endif
                @endguest

            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <div class="max-w-6xl mx-auto px-4 py-20 text-center">

        <h1 class="text-4xl font-bold text-gray-800">
            Welcome to SMS Management System
        </h1>

        <p class="mt-4 text-gray-600 text-lg">
            Manage students, messages, and records efficiently using Laravel Breeze authentication.
        </p>

        @guest
        <div class="mt-8">
            <a href="{{ route('login') }}"
               class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                Get Started
            </a>
        </div>
        @endguest

        @auth
        <div class="mt-8">
            <a href="{{ url('/dashboard') }}"
               class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                Go to Dashboard
            </a>
        </div>
        @endauth

    </div>

</body>
</html>