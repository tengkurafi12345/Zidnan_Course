@extends('layouts.app')

@section('title', 'Course')

@section('content')
    <section class="courses">
        <h1 class="heading">Our Courses</h1>
            {{-- <a href="" class="btn btn-info">Tambah Course</a> --}}
        <div class="box-container">
            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher1.jpg') }}" alt="">
                    <div class="info">
                        <h3>Siti Nur</h3>
                        <span>01-09-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/1.jpg') }}" alt="">
                    <span>12 videos</span>
                </div>
                <h3 class="title">Bahasa Inggris</h3>
                <a href="playlist.html" class="inline-btn">View Playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher2.jpg') }}" alt="">
                    <div class="info">
                        <h3>Ali Ahmad</h3>
                        <span>05-09-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/2.jpg') }}" alt="">
                    <span>10 videos</span>
                </div>
                <h3 class="title">Fisika</h3>
                <a href="playlist.html" class="inline-btn">View Playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher3.jpg') }}" alt="">
                    <div class="info">
                        <h3>Fatimah Azizah</h3>
                        <span>12-09-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/3.jpg') }}" alt="">
                    <span>15 videos</span>
                </div>
                <h3 class="title">Matematika</h3>
                <a href="playlist.html" class="inline-btn">View Playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher11.jpg') }}" alt="">
                    <div class="info">
                        <h3>Andi Firmansyah</h3>
                        <span>20-09-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/4.jpg') }}" alt="">
                    <span>8 videos</span>
                </div>
                <h3 class="title">Informatika</h3>
                <a href="playlist.html" class="inline-btn">View Playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher5.jpg') }}" alt="">
                    <div class="info">
                        <h3>Ahmad Hadi</h3>
                        <span>30-09-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/5.jpg') }}" alt="">
                    <span>20 videos</span>
                </div>
                <h3 class="title">Al-Qur'an & Tajwid</h3>
                <a href="playlist.html" class="inline-btn">View Playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher6.jpg') }}" alt="">
                    <div class="info">
                        <h3>Nur Fikri</h3>
                        <span>10-10-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/teacher6.jpg') }}" alt="">
                    <span>7 videos</span>
                </div>
                <h3 class="title">Aqidah</h3>
                <a href="playlist.html" class="inline-btn">View Playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher7.jpg') }}" alt="">
                    <div class="info">
                        <h3>Maryam Zahra</h3>
                        <span>15-10-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/7.jpg') }}" alt="">
                    <span>6 videos</span>
                </div>
                <h3 class="title">Akhlaq</h3>
                <a href="playlist.html" class="inline-btn">View Playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher8.jpg') }}" alt="">
                    <div class="info">
                        <h3>Umar Yusuf</h3>
                        <span>20-10-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/8.jpg') }}" alt="">
                    <span>5 videos</span>
                </div>
                <h3 class="title">Fiqih</h3>
                <a href="playlist.html" class="inline-btn">View Playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher9.jpg') }}" alt="">
                    <div class="info">
                        <h3>Salim Hasan</h3>
                        <span>25-10-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/9.jpg') }}" alt="">
                    <span>9 videos</span>
                </div>
                <h3 class="title">Sejarah Islam</h3>
                <a href="playlist.html" class="inline-btn">View Playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher10.jpg') }}" alt="">
                    <div class="info">
                        <h3>Aisyah Khairani</h3>
                        <span>28-10-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/10.jpg') }}" alt="">
                    <span>10 videos</span>
                </div>
                <h3 class="title">Bahasa Arab</h3>
                <a href="playlist.html" class="inline-btn">View Playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher4.jpg') }}" alt="">
                    <div class="info">
                        <h3>Zaki Irfan</h3>
                        <span>30-10-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/11.jpg') }}" alt="">
                    <span>12 videos</span>
                </div>
                <h3 class="title">Bahasa Indonesia</h3>
                <a href="playlist.html" class="inline-btn">View Playlist</a>
            </div>

            <div class="box">
                <div class="tutor">
                    <img src="{{ asset('assets/image/BE/teacher12.jpg') }}" alt="">
                    <div class="info">
                        <h3>Hasan Ali</h3>
                        <span>02-11-2023</span>
                    </div>
                </div>
                <div class="thumb">
                    <img src="{{ asset('assets/image/BE/12.jpg') }}" alt="">
                    <span>11 videos</span>
                </div>
                <h3 class="title">Siroh Nabawiyah</h3>
                <a href="playlist.html" class="inline-btn">View Playlist</a>
            </div>

        </div>
    </section>
@endsection
