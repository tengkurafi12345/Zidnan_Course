<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zidnan Bimbel - Home</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    {{-- <style>
        /* Gaya Umum */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f5f5f5;
        }

        h1,
        h2,
        p {
            margin: 0;
            padding: 0;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #b500fd;
            padding: 15px 0;
            text-align: center;
        }

        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #f5f5f5;
            text-decoration: underline;
        }

        /* Header */
        header {
            background-color: #7400a1;
            padding: 20px;
            text-align: center;
            color: white;
        }

        /* Kontainer Utama */
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        /* Judul */
        .container h1 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        /* Kontainer Paket Bimbel */
        .course-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .course-package {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: left;
        }

        .course-package:hover {
            transform: translateY(-5px);
        }

        .course-package h2 {
            font-size: 1.5em;
            color: #b500fd;
            margin-bottom: 10px;
        }

        .course-package p {
            color: #515052;
            margin: 8px 0;
        }

        .course-package img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .course-package button {
            background-color: #7400a1;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .course-package button:hover {
            background-color: #b500fd;
        }

        /* Footer */
        footer {
            background-color: #b500fd;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 40px;
        }
    </style> --}}
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
