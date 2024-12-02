<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                background: url('/img/Login.png') no-repeat center center fixed;
                background-size: cover;
            }
        </style>

    </head>
    <body class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md bg-white/30 backdrop-blur-md rounded-3xl shadow-lg p-8 text-center">
            <h1 class="font-laila text-5xl font-semibold text-purple-700 mb-4">PELITA</h1>
    <p class="font-sans text-sm text-gray-600 mb-6">Terang untuk Perlindungan, Aman dari Kekerasan</p>
            
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
