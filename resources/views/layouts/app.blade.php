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
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/BE/style.css') }}">
    <!-- bootstrap 5.3.3 -->

    @yield('css')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- Navigation --}}
    @include('layouts.sidebar')

    {{-- Section Content --}}
    @yield('content')


    <footer class="footer">
        <div style="position:absolute;bottom:0px;right:0px;">
            version 1.0
        </div>
        &copy; Zidnan (Rumah Tahfidz & Course)</span> | all rights reserved!
    </footer>

    <!-- custom js file link  -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script>

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


        // Navbar Collapse
        document.addEventListener("DOMContentLoaded", function() {
            let masterDataToggle = document.querySelector("[href='#collapseExample']");
            let masterDataIcon = document.getElementById("masterDataIcon");

            console.log(masterDataToggle);

            masterDataToggle.addEventListener("click", function() {
                setTimeout(() => {
                    if (document.getElementById("collapseExample").classList.contains("show")) {
                        masterDataIcon.classList.remove("fas fa-sort-down");
                        masterDataIcon.classList.add("fas fa-sort-up");
                    } else {
                        masterDataIcon.classList.remove("fas fa-sort-up");
                        masterDataIcon.classList.add("fas fa-sort-down");
                    }
                }, 300);
            });
        });

        function toggleStatusText() {
            let checkbox = document.getElementById("flexSwitchCheckDefault");
            let label = document.getElementById("statusLabel");

            if (checkbox.checked) {
                label.innerText = "Active";
            } else {
                label.innerText = "Non Active";
            }
        }

        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>
