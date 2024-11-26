<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zidnan Bimbel</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <!-- Navigation Bar -->
    @include('layouts.navigation')




    <!-- Konten Utama -->
    @yield('content')

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Zidnan Bimbel. All rights reserved.</p>
    </footer>

    <script src="{{ asset('script.js') }}"></script>
</body>

</html>
