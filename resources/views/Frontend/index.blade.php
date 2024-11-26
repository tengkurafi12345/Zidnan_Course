{{-- Ambil dari layout main  --}}
@extends('layouts.main')
{{-- Membuat title untuk judul halaman --}}
@section('title', 'Home')

{{-- Membuat Bagian untuk konten --}}
@section('content')
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
                <img src="{{ asset('img/fisika.jpg') }}" alt="Paket Fisika SMA">
                <h2>Paket Fisika SMA</h2>
                <p>Untuk siswa SMA</p>
                <p>Harga: Rp350,000/bulan</p>
                <button onclick="redirectToWhatsApp('Paket Fisika SMA')">Daftar</button>
            </div>
            <div class="course-package">
                <img src="{{ asset('img/b.inggris.jpg') }}" alt="Paket Bahasa Inggris">
                <h2>Paket Bahasa Inggris</h2>
                <p>Untuk semua tingkat</p>
                <p>Harga: Rp400,000/bulan</p>
                <button onclick="redirectToWhatsApp('Paket Bahasa Inggris')">Daftar</button>
            </div>


            <div class="course-container2">
                <div class="course-package2">
                    <img src="{{ asset('img/matematika.jpg') }}" alt="Paket Matematika Dasar">
                    <h3>Mulai langkah sukses belajar Matematika dari dasar!</h3>
                    <h4><b>Keunggulan Paket:</b></h4>
                    <p><b>* Materi Terstruktur: Pembahasan konsep dasar hingga soal latihan yang disusun sistematis,
                            memudahkan siswa memahami Matematika secara bertahap.</b></p>
                    <br>
                    <p><b>* Tutor Berpengalaman: Didukung oleh pengajar profesional yang siap membantu menjawab setiap
                            pertanyaan.</b></p>
                    <br>
                    <p><b>* Latihan Soal Intensif: Tersedia soal dan kuis yang bervariasi untuk meningkatkan pemahaman
                            dan kemampuan siswa.</b></p>
                    <br>
                    <p><b>* Metode Belajar Interaktif: Kelas yang didesain untuk mengajak siswa aktif dan menyukai
                            Matematika.</b></p>
                    <br>
                    <p><b>Yuk, gabung sekarang dan buat Matematika lebih mudah!</b></p>
                </div>

                <div class="course-package2">
                    <img src="{{ asset('img/fisika.jpg') }}" alt="Paket Fisika SMA">
                    <h3>Mulai langkah sukses belajar Matematika dari dasar!</h3>
                    <h4><b>Keunggulan Paket:</b></h4>
                    <p><b>* Materi Terstruktur: Pembahasan konsep dasar hingga soal latihan yang disusun sistematis,
                            memudahkan siswa memahami Matematika secara bertahap.</b></p>
                    <br>
                    <p><b>* Tutor Berpengalaman: Didukung oleh pengajar profesional yang siap membantu menjawab setiap
                            pertanyaan.</b></p>
                    <br>
                    <p><b>* Latihan Soal Intensif: Tersedia soal dan kuis yang bervariasi untuk meningkatkan pemahaman
                            dan kemampuan siswa.</b></p>
                    <br>
                    <p><b>* Metode Belajar Interaktif: Kelas yang didesain untuk mengajak siswa aktif dan menyukai
                            Matematika.</b></p>
                    <br>
                    <p><b>Yuk, gabung sekarang dan buat Matematika lebih mudah!</b></p>
                </div>

                <div class="course-package2">
                    <img src="{{ asset('img/b.inggris.jpg') }}" alt="Paket Bahasa Inggris">
                    <h3>Mulai langkah sukses belajar Matematika dari dasar!</h3>
                    <h4><b>Keunggulan Paket:</b></h4>
                    <p><b>* Materi Terstruktur: Pembahasan konsep dasar hingga soal latihan yang disusun sistematis,
                            memudahkan siswa memahami Matematika secara bertahap.</b></p>
                    <br>
                    <p><b>* Tutor Berpengalaman: Didukung oleh pengajar profesional yang siap membantu menjawab setiap
                            pertanyaan.</b></p>
                    <br>
                    <p><b>* Latihan Soal Intensif: Tersedia soal dan kuis yang bervariasi untuk meningkatkan pemahaman
                            dan kemampuan siswa.</b></p>
                    <br>
                    <p><b>* Metode Belajar Interaktif: Kelas yang didesain untuk mengajak siswa aktif dan menyukai
                            Matematika.</b></p>
                    <br>
                    <p><b>Yuk, gabung sekarang dan buat Matematika lebih mudah!</b></p>
                </div>
            </div>

        </div>
    </div>
@endsection
