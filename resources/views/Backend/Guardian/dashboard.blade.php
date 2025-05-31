@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="home-grid">
        <h1 class="heading">Selamat Datang</h1>
        <div class="box-container" style="display:block">
            <div class="box">
                <h1 class="title">{{ Auth::user()->name }}</h1>
                <h3 style="font-size: 2rem">{{ Auth::user()->email }}</h3>
                <p class="tutor">Bergabunglah sebagai tutor dan bantu siswa mencapai potensi terbaik mereka! Bagikan
                    keahlian Anda, kelola jadwal fleksibel, dan dapatkan penghasilan tambahan dengan mengajar secara online
                    maupun offline. Jadilah bagian dari komunitas edukasi kami dan mulai perjalanan mengajar Anda sekarang!
                </p>
                <a href="teachers.html" class="inline-btn">get started</a>
            </div>
        </div>
    </section>
@endsection
