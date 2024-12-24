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
                <img src="{{ asset('img/b-jawa.jpg') }}" alt="Paket Bahasa Jawa" style="height: 200px">
                <h2>Paket Bahasa Jawa</h2>
                <p>Untuk semua tingkat</p>
                <p>Harga: Rp400,000/bulan</p>
                <button onclick="redirectToWhatsApp('Paket Bahasa Jawa')">Daftar</button>
            </div>

            <div class="course-package">
                <img src="{{ asset('img/calistung.jpg') }}" alt="Paket calistung">
                <h2>Paket Calistung</h2>
                <p>Untuk siswa SD - SMP</p>
                <p>Harga: Rp300,000/bulan</p>
                <button onclick="redirectToWhatsApp('Paket Calistung')">Daftar</button>
            </div>
            <div class="course-package">
                <img src="{{ asset('img/fisika.jpg') }}" alt="Paket Bahasa Inggris SD">
                <h2>Paket Bahasa Inggris SD</h2>
                <p>Untuk siswa SD</p>
                <p>Harga: Rp350,000/bulan</p>
                <button onclick="redirectToWhatsApp('Paket Bahasa Inggris SD')">Daftar</button>
            </div>
            <div class="course-package">
                <img src="{{ asset('img/b.inggris.jpg') }}" alt="Paket Bahasa Indonesia">
                <h2>Paket Bahasa Indonesia</h2>
                <p>Untuk semua tingkat</p>
                <p>Harga: Rp400,000/bulan</p>
                <button onclick="redirectToWhatsApp('Paket Bahasa Indonesia')">Daftar</button>
            </div>
        </div>
    </div>

    <!-- Konten Siswa -->
    <section class="testimonial-section">
        <h2>Daftar Siswa</h2>
        <div class="testimonial-container">
            <div class="testimonial-item">
                <img src="{{ asset('img/siswa-1.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <div class="container" style="text-align: left">
                    <h4><b>Nama: Siswa 1</b></h4>
                    <p>No Telpon: 082934928432843</p>
                    <p>Email: test1@gmail.com</p>
                    <p>Kelas: VII </p>
                    <p>Jenis Kelamin: Laki-laki</p>
                    <br>
                </div>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('img/siswa-2.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <div class="container" style="text-align: left">
                    <h4><b>Nama: Siswa 1</b></h4>
                    <p>No Telpon: 082934928432843</p>
                    <p>Email: test1@gmail.com</p>
                    <p>Kelas: VII </p>
                    <p>Jenis Kelamin: Laki-laki</p>
                    <br>
                </div>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('img/siswa-3.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <div class="container" style="text-align: left">
                    <h4><b>Nama: Siswa 1</b></h4>
                    <p>No Telpon: 082934928432843</p>
                    <p>Email: test1@gmail.com</p>
                    <p>Kelas: VII </p>
                    <p>Jenis Kelamin: Laki-laki</p>
                    <br>
                </div>
            </div>
        </div>
    </section>

    <!-- Konten Instruktur -->
    <section class="testimonial-section">
        <h2>Daftar Pengajar</h2>
        <div class="testimonial-container">
            <div class="testimonial-item">
                <img src="{{ asset('img/guru1.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <h3>Dr. Greg Harvey</h3>
                <h4>instructor</h4>
                <p>"Aut laborum molestiae nobis hic in et. Maxime ut occaecati et veniam aliquid officiis doloremque. Provident vitae consequatur et qui recusandae similique qui. Iusto rerum voluptatum libero nihil."</p>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('img/guru2.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <h3>Justina Corwin DDS</h3>
                <h4>instructor</h4>
                <p>"Soluta maxime dicta tempore esse molestias. Est et repudiandae quisquam velit."</p>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('img/guru3.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <h3>Lilyan Buckridge</h3>
                <h4>instructor</h4>
                <p>"Ut doloribus quo omnis at est corporis. Dolor est est labore."</p>
            </div>
        </div>
    </section>

    <!-- Konten Testimoni -->
    <section class="testimonial-section">
        <h2>Testimoni</h2>
        <div class="testimonial-slider">
            <div class="testimonial-item">
                <p>"Dolore et sed dolore provident natus. Corrupti est enim fugit dicta eligendi"</p>
                <h3>Bulah Corwin</h3>
                <span>Sebagai : Environmental Engineering Technician <br> di North Lesly</span>
            </div>
            <div class="testimonial-item">
                <p>"Qui quo laborum ut necessitatibus non dignissimos. Aut sit ad quasi fugit aut perferendis fugit"</p>
                <h3>Ms. Shirley Romaguera V</h3>
                <span>Sebagai : Forest Fire Inspector <br> di South Sonia</span>
            </div>
            <div class="testimonial-item">
                <p>"Dolorem non natus provident dolorem. Magnam dolor possimus id quis"</p>
                <h3>Cali Keebler I</h3>
                <span>Sebagai : Forest Fire Inspector <br> di South Sonia</span>
            </div>
            <div class="testimonial-item">
                <p>"Dolore et sed dolore provident natus. Corrupti est enim fugit dicta eligendi"</p>
                <h3>Bulah Corwin</h3>
                <span>Sebagai : Environmental Engineering Technician <br> di North Lesly</span>
            </div>
            <div class="testimonial-item">
                <p>"Qui quo laborum ut necessitatibus non dignissimos. Aut sit ad quasi fugit aut perferendis fugit"</p>
                <h3>Ms. Shirley Romaguera V</h3>
                <span>Sebagai : Forest Fire Inspector <br> di South Sonia</span>
            </div>
            <div class="testimonial-item">
                <p>"Dolorem non natus provident dolorem. Magnam dolor possimus id quis"</p>
                <h3>Cali Keebler I</h3>
                <span>Sebagai : Forest Fire Inspector <br> di South Sonia</span>
            </div>
            <div class="testimonial-item">
                <p>"Dolore et sed dolore provident natus. Corrupti est enim fugit dicta eligendi"</p>
                <h3>Bulah Corwin</h3>
                <span>Sebagai : Environmental Engineering Technician <br> di North Lesly</span>
            </div>
            <div class="testimonial-item">
                <p>"Qui quo laborum ut necessitatibus non dignissimos. Aut sit ad quasi fugit aut perferendis fugit"</p>
                <h3>Ms. Shirley Romaguera V</h3>
                <span>Sebagai : Forest Fire Inspector <br> di South Sonia</span>
            </div>
            <div class="testimonial-item">
                <p>"Dolorem non natus provident dolorem. Magnam dolor possimus id quis"</p>
                <h3>Cali Keebler I</h3>
                <span>Sebagai : Forest Fire Inspector <br> di South Sonia</span>
            </div>
        </div>
    </section>

    <div class="map-container">
        <h3>Lokasi Kami</h3>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.452109610725!2d112.74189821520582!3d-7.721132179127303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e783040a78ab87f%3A0x67b37711d45f2d21!2sKejapanan%2C%20Kec.%20Gempol%2C%20Kabupaten%20Pasuruan%2C%20Jawa%20Timur%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1698459819052!5m2!1sen!2sus"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
@endsection
