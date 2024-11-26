@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="home-grid">
        <h1 class="heading">quick options</h1>
        <div class="box-container">
            <div class="box">
                <h3 class="title">likes and comments</h3>
                <p class="likes">total likes : <span>25</span></p>
                <a href="#" class="inline-btn">view likes</a>
                <p class="likes">total comments : <span>12</span></p>
                <a href="#" class="inline-btn">view comments</a>
                <p class="likes">saved playlists : <span>4</span></p>
                <a href="#" class="inline-btn">view playlists</a>
            </div>

            <div class="box">
                <h3 class="title">Top Categories</h3>
                <div class="flex">
                    <a href="#"><i class="fas fa-language"></i><span>Bahasa Inggris</span></a>
                    <a href="#"><i class="fas fa-atom"></i><span>Fisika</span></a>
                    <a href="#"><i class="fas fa-square-root-alt"></i><span>Matematika</span></a>
                    <a href="#"><i class="fas fa-laptop-code"></i><span>Informatika</span></a>
                    <a href="#"><i class="fas fa-quran"></i><span>Al-Qur'an + Tajwid</span></a>
                    <a href="#"><i class="fas fa-praying-hands"></i><span>Aqidah</span></a>
                    <a href="#"><i class="fas fa-heart"></i><span>Akhlaq</span></a>
                    <a href="#"><i class="fas fa-balance-scale"></i><span>Fiqih</span></a>
                </div>
            </div>

            <div class="box">
                <h3 class="title">Top Categories</h3>
                <div class="flex">
                    <a href="#"><i class="fas fa-square-root-alt"></i><span>Matematika</span></a>
                    <a href="#"><i class="fas fa-language"></i><span>Bahasa Inggris</span></a>
                    <a href="#"><i class="fas fa-atom"></i><span>Fisika</span></a>
                    <a href="#"><i class="fas fa-laptop-code"></i><span>Informatika</span></a>
                    <a href="#"><i class="fas fa-quran"></i><span>Al-Qur'an + Tajwid</span></a>
                </div>
            </div>

            <div class="box">
                <h3 class="title">become a tutor</h3>
                <p class="tutor">Bergabunglah sebagai tutor dan bantu siswa mencapai potensi terbaik mereka! Bagikan
                    keahlian Anda, kelola jadwal fleksibel, dan dapatkan penghasilan tambahan dengan mengajar secara online
                    maupun offline. Jadilah bagian dari komunitas edukasi kami dan mulai perjalanan mengajar Anda sekarang!
                </p>
                <a href="teachers.html" class="inline-btn">get started</a>
            </div>
        </div>
    </section>

    <section class="courses">
        <h1 class="heading">Our Courses</h1>
        <div class="box-container">
            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher2.jpg') }}" alt="English Tutor">
                    <div class="info">
                        <h3>Ahmad Ali</h3>
                        <span>21-10-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/1.1.jpg') }}" alt="English Course Thumbnail">
                    <span>12 videos</span>
                </div>
                <h3 class="title">Bahasa Inggris</h3>
                <a href="playlist.html" class="inline-btn">view playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher2.jpg') }}" alt="Math Tutor">
                    <div class="info">
                        <h3>Nurul Hasanah</h3>
                        <span>21-10-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/3.3.jpg') }}" alt="Math Course Thumbnail">
                    <span>15 videos</span>
                </div>
                <h3 class="title">Matematika</h3>
                <a href="playlist.html" class="inline-btn">view playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher3.jpg') }}" alt="Physics Tutor">
                    <div class="info">
                        <h3>Fatimah Zahra</h3>
                        <span>21-10-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/2.2.jpg') }}" alt="Physics Course Thumbnail">
                    <span>10 videos</span>
                </div>
                <h3 class="title">Fisika</h3>
                <a href="playlist.html" class="inline-btn">view playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher4.jpg') }}" alt="IT Tutor">
                    <div class="info">
                        <h3>syifa aulia</h3>
                        <span>21-10-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/4.4.jpg') }}" alt="Informatika Course Thumbnail">
                    <span>8 videos</span>
                </div>
                <h3 class="title">Informatika</h3>
                <a href="playlist.html" class="inline-btn">view playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher6.jpg') }}" alt="Quran Tutor">
                    <div class="info">
                        <h3>Hana Rahma</h3>
                        <span>21-10-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/5.5.jpg') }}" alt="Quran Course Thumbnail">
                    <span>9 videos</span>
                </div>
                <h3 class="title">Al-Qur'an + Tajwid</h3>
                <a href="playlist.html" class="inline-btn">view playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher10.jpg') }}" alt="Aqidah Tutor">
                    <div class="info">
                        <h3>Abdullah Malik</h3>
                        <span>21-10-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/6.6.jpg') }}" alt="Aqidah Course Thumbnail">
                    <span>7 videos</span>
                </div>
                <h3 class="title">Aqidah</h3>
                <a href="playlist.html" class="inline-btn">view playlist</a>
            </div>
        </div>

        <div class="more-btn">
            <a href="courses.html" class="inline-option-btn">view all courses</a>
        </div>
    </section>
@endsection
