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
    <div class="navbar">
        <div class="nav-links">
            <a href="/">Home</a>
            <a href="/course">Course</a>
            <a href="#siswa">Siswa</a>
            <a href="#guru">Guru</a>
            <a href="#blog">Blog</a>
            <a href="#Testimonial">Testimonial</a>
            <a href="#Buku & Media">Buku & Media</a>
        </div>
        <div class="auth-links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>


    <!-- Header -->
    <header>
        <h1>Selamat Datang di Zidnan Bimbel</h1>
        <p>Temukan paket bimbel terbaik sesuai kebutuhan Anda</p>
    </header>

    <!-- Content -->
    <!---------- Daftar Paket Bimbel ------->
    <div class="course-container">
        <div class="course-package">
            <img src="{{ asset('img/Bahasa_Arab.jpg') }}" alt="Gambar Paket Bahasa Arab" title="Paket Bahasa Arab">
            <h2>Paket Bahasa Arab</h2>
            <p>Pahami tata bahasa Arab dengan metode cepat. Cocok untuk pemula dan lanjutan.</p>
            <p>Harga: Rp650.000/bulan</p>
            <button onclick="redirectToWhatsApp('Paket Bahasa Arab')">Gabung Sekarang!</button>
        </div>
        <div class="course-package">
            <img src="{{ asset('img/b.inggris.jpg') }}" alt="Gambar Paket Bahasa Inggris" title="Paket Bahasa Inggris">
            <h2>Paket Bahasa Inggris</h2>
            <p>Tingkatkan kemampuan berbicara dan menulis dalam Bahasa Inggris.</p>
            <p>Harga: Rp700.000/bulan</p>
            <button onclick="redirectToWhatsApp('Paket Bahasa Inggris')">Gabung Sekarang!</button>
        </div>
        <div class="course-package">
            <img src="{{ asset('img/matematika.jpg') }}" alt="Gambar Paket Matematika" title="Paket Matematika">
            <h2>Paket Matematika</h2>
            <p>Pelajari Matematika dengan cara yang mudah dan menyenangkan.</p>
            <p>Harga: Rp500.000/bulan</p>
            <button onclick="redirectToWhatsApp('Paket Matematika')">Gabung Sekarang!</button>
        </div>
        <div class="course-package">
            <img src="{{ asset('img/sains.jpg') }}" alt="Gambar Paket Sains" title="Paket Sains">
            <h2>Paket Sains</h2>
            <p>Pahami konsep Fisika, Kimia, dan Biologi secara mendalam.</p>
            <p>Harga: Rp800.000/bulan</p>
            <button onclick="redirectToWhatsApp('Paket Sains')">Gabung Sekarang!</button>
        </div>
        <div class="course-package">
            <img src="{{ asset('img/calistung.jpg') }}" alt="Gambar Paket Calistung" title="Paket Calistung">
            <h2>Paket Calistung</h2>
            <p>Khusus untuk anak-anak belajar membaca, menulis, dan berhitung.</p>
            <p>Harga: Rp400.000/bulan</p>
            <button onclick="redirectToWhatsApp('Paket Calistung')">Gabung Sekarang!</button>
        </div>
        <div class="course-package">
            <img src="{{ asset('img/mapel.jpg') }}" alt="Gambar Paket Mapel Islam / Umum"
                title="Paket Mapel Islam / Umum">
            <h2>Paket Mapel Islam / Umum</h2>
            <p>Kombinasi pelajaran agama Islam dan pelajaran umum lainnya.</p>
            <p>Harga: Rp600.000/bulan</p>
            <button onclick="redirectToWhatsApp('Paket Mapel Islam / Umum')">Gabung Sekarang!</button>
        </div>
        <div class="course-package">
            <img src="{{ asset('img/tahfidz.jpg') }}" alt="Gambar Paket Tahfidz" title="Paket Tahfidz">
            <h2>Paket Tahfidz</h2>
            <p>Belajar dan hafalkan Al-Quran dengan metode mudah dan menyenangkan. Cocok untuk semua usia.</p>
            <p>Harga: Rp750.000/bulan</p>
            <button onclick="redirectToWhatsApp('Paket Tahfidz')">Gabung Sekarang!</button>
        </div>
    </div>


    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Zidnan Bimbel. All rights reserved.</p>
    </footer>

    <script src="{{ asset('script.js') }}"></script>
</body>

</html>
