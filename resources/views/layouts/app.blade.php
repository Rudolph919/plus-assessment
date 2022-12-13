<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- CSS Scripts -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="font-sans">

<div class="min-h-screen flex">
     @include('layouts.navigation')

    <!-- Page Content -->
    <main class="w-full bg-base">
        {{ $slot }}
    </main>
</div>

<!-- JS Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
