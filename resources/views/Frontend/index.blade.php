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
                <img src="{{ asset('img/brand/bimbel.png') }}" alt="Paket Matematika Dasar">
                <h2>Bimbel Zidnan</h2>
                <p>Untuk siswa TK - SMA</p>
                <p>Start From: Rp.135,000/8x</p>
                <button onclick="redirectToWhatsApp('Paket Matematika Dasar')">Daftar</button>
            </div>
            <div class="course-package">
                <img src="{{ asset('img/brand/privat.png') }}" alt="Paket Fisika SMA">
                <h2>Zidnan Course</h2>
                <p>Untuk siswa TK - SMA</p>
                <p>Start From: Rp.225,000/8x</p>
                <button onclick="redirectToWhatsApp('Paket Fisika SMA')">Daftar</button>
            </div>
            <div class="course-package">
                <img src="{{ asset('img/brand/perusahan-mengaji.png') }}" alt="Paket Bahasa Jawa">
                <h2>Perusahaan Mengaji</h2>
                <p>Untuk umur 19 keatas</p>
                <p>Start From: Rp.320,000/8x</p>
                <button onclick="redirectToWhatsApp('Paket Bahasa Jawa')">Daftar</button>
            </div>

            <div class="course-package">
                <img src="{{ asset('img/brand/santri-weekend.png') }}" alt="Paket calistung">
                <h2>Santri Weekend</h2>
                <p>Untuk Umum</p>
                <p>Start From: Rp.100,000/8x</p>
                <button onclick="redirectToWhatsApp('Paket Calistung')">Daftar</button>
            </div>
        </div>
    </div>

    <!-- Konten Siswa -->
    {{-- TODO: Berisikan Konten Siswa Berprestasi --}}
    <section class="testimonial-section">
        <h2>Daftar Siswa</h2>
        <div class="testimonial-container">
            @foreach ($students as $student)
            <div class="testimonial-item">
                <img src="{{ asset('img/siswa-2.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <div class="container" style="text-align: left">
                    <h4><b>{{ $student->name }}</b></h4>
                    <p>Kelas: {{ $student->class_status }} </p>
                    @if ($student->gender === App\Enums\Gender::MALE)
                        <p>Jenis Kelamin : Laki-laki</p>
                    @else
                        <p>Jenis Kelamin : Perempuan</p>
                    @endif
                    <p>Sekolah : {{ $student->school_name }}</p>
                    <p>Alamat : {{ $student->address }}</p>
                    <p>Prestasi:</p>
                    <ul>
                        <li></li>
                    </ul>
                    <br>
                </div>
            </div>
            @endforeach

            {{-- <div class="testimonial-item">
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
            </div> --}}
        </div>
    </section>

    <!-- Konten Instruktur -->
    <section class="testimonial-section">
        <h2>Daftar Pengajar</h2>
        <div class="testimonial-container">
            <div class="testimonial-item">
                <img src="{{ asset('img/guru1.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <h3>Dr. Greg Harvey</h3>
                <h4>Pendidikan Terakhir</h4>
                <p>Usia</p>
                <p>Mulai Bergabung</p>
                <p>Alamat</p>
                <p>Spesialis</p>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('img/guru2.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <h3>Justina Corwin DDS</h3>
                <h4>Pendidikan Terakhir</h4>
                <p>Usia</p>
                <p>Mulai Bergabung</p>
                <p>Alamat</p>
                <p>Spesialis</p>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('img/guru3.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <h3>Lilyan Buckridge</h3>
                <h4>Pendidikan Terakhir</h4>
                <p>Usia</p>
                <p>Mulai Bergabung</p>
                <p>Alamat</p>
                <p>Spesialis</p>
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.022233119031!2d112.68333367381861!3d-7.57255459244165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7df62835bffa1%3A0x16129116217ffc6d!2sZidnan%20(Bimbel%20%26%20Course)!5e0!3m2!1sen!2sid!4v1739207515847!5m2!1sen!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </div>
@endsection
