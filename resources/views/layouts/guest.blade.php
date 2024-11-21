<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Login')</title>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind CSS for Modern Look -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Gradien latar belakang dengan nuansa hijau */
        body {
            background: linear-gradient(135deg, #34b6d3, #10b981);
            font-family: 'Inter', sans-serif;
        }

        /* Efek hover pada tombol */
        button:hover {
            transform: scale(1.05);
            transition: all 0.3s ease;
        }

        /* Bayangan dan Efek Hover untuk Kontainer */
        div.w-full {
            box-shadow: 0px 10px 30px rgba(0, 128, 0, 0.1);
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">

    <div class="min-h-screen flex flex-col justify-center items-center pt-12 pb-12 sm:pt-16 sm:pb-16">

        <div class="flex justify-center mb-6">
            <a href="/">
                <x-application-logo class="w-24 h-24 fill-current text-white transition duration-300 transform hover:scale-110" />
            </a>
        </div>

        <div class="text-center text-white font-bold text-3xl mb-4">
            @yield('title', 'Login')
        </div>

        <!-- Kontainer yang dipersempit -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300">
            @yield('content')
        </div>

        <div class="mt-6 text-center text-white">
            @yield('footer')
        </div>
    </div>
</body>
</html>
