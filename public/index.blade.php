<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zidnan Bimbel - Home</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>

    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="#home">Home controller</a>
        <a href="#paketBimbel">Paket Bimbel</a>
        <a href="#siswa">Siswa</a>
        <a href="#guru">Guru</a>
        <a href="#blog">Blog</a>
        <a href="#Testimonial">Testimonial</a>
        <a href="#Buku & Media">Buku & Media</a>
    </div>

    <!-- Header -->
    <header>
        <h1>Selamat Datang di Zidnan Bimbel</h1>
        <p>Temukan paket bimbel terbaik sesuai kebutuhan Anda</p>
    </header>

    <!-- Konten Utama -->
    <div class="container" id="home">
        <h1>Paket Bimbel Kami</h1>
        <p>Pilih paket bimbel yang sesuai dan klik daftar untuk memulai proses pendaftaran.</p>

        <!-- Daftar Paket Bimbel -->
        <div class="course-container">
            <div class="course-package">
                <img src="{{ asset('img/matematika.jpg') }}" alt="Paket Matematika Dasar">
                <h2>Paket Matematika Dasar</h2>
                <p>Untuk siswa SD - SMP</p>
                <p>Harga: Rp300,000/bulan</p>
                <button onclick="redirectToWhatsApp('Paket Matematika Dasar')">Daftar</button>
            </div>

            <div class="course-package">
                <img src="{{ asset('img/b.inggris.jpg')}}" alt="Paket Bahasa Inggris">
                <h2>Paket Bahasa Inggris</h2>
                <p>Untuk semua tingkat</p>
                <p>Harga: Rp400,000/bulan</p>
                <button onclick="redirectToWhatsApp('Paket Bahasa Inggris')">Daftar</button>
            </div>

            <div class="course-package">
                <img src="{{ asset('img/fisika.jpg')}}" alt="Paket Fisika SMA">
                <h2>Paket Fisika SMA</h2>
                <p>Untuk siswa SMA</p>
                <p>Harga: Rp350,000/bulan</p>
                <button onclick="redirectToWhatsApp('Paket Fisika SMA')">Daftar</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Zidnan Bimbel. All rights reserved.</p>
    </footer>

    <script src="{{ asset('script.js') }}"></script>
</body>

</html>
