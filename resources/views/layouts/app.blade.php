<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Conditional Scripts -->
    @if(app()->environment('local'))
        <script type="module" src="{{ url('http://localhost:3000/@vite/client') }}"></script>
    @else
        <script src="{{ mix('path/to/production/asset.js') }}"></script>
    @endif
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-gray-800 text-white p-4 flex justify-between items-center">
            <div>
                <a href="{{ route('dashboard') }}" class="mr-4">Dashboard</a>
                <a href="{{ route('tasks.index') }}">Tasks</a>
            </div>
            <div>
                @auth
                    <span>Welcome, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="ml-4 bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">Logout</button>
                    </form>
                @endauth
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @yield('header')
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow mt-6">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <a href="{{ url()->previous() }}" class="text-blue-500 hover:underline">Back</a>
            </div>
        </footer>
    </div>
</body>
</html>
