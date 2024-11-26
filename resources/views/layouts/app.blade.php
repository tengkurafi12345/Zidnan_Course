<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Zidnan Course - @yield('title', 'App')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('assets/css/BE/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- Navigation --}}
    @include('layouts.sidebar')

    {{-- Section Content --}}
    @yield('content')

    <footer class="footer">
        &copy; Rumah Tahfidz @ 2024 by <span>Zidnan_Course.</span> | all rights reserved!
    </footer>

    <!-- custom js file link  -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
