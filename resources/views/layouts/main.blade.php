<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zidnan Course - @yield('title', 'App')</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/FE/style.css') }}">
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

    <script src="{{ asset('assets/bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('script.js') }}"></script>
    <script>
        // Mendapatkan semua elemen alert dengan close button
        var closeBtns = document.getElementsByClassName("closebtn");

        // Menambahkan event listener pada setiap close button
        for (var i = 0; i < closeBtns.length; i++) {
            closeBtns[i].onclick = function() {
                var alert = this.parentElement;
                alert.style.display = "none"; // Menyembunyikan alert saat tanda silang diklik
            }
        }
    </script>
</body>

</html>
