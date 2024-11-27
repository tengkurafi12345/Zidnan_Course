@extends('layouts.main')

@section('title', 'Kursus')

@section('content')
    <header>
        <h1>Halaman Paket Bimbel</h1>
    </header>
    <!-- Content -->
    <!---------- Daftar Paket Bimbel ------->
    <div class="course-container" style="margin-top: 30px">
        @foreach ($courses as $course)
            <div class="course-package">
                <img src="{{ asset('img/Bahasa_Arab.jpg') }}" alt="Gambar Paket Bahasa Arab" title="Paket Bahasa Arab">
                <h2>{{ $course->name }}</h2>
                <p>{{ \Illuminate\Support\Str::limit($course->description, 150) }}</p>
                <p>Harga: Rp.{{ number_format($course->price, 0, ',', '.') }}/bulan</p>
                <button onclick="redirectToWhatsApp('{{ $course->name }}')">Gabung Sekarang!</button>
            </div>
        @endforeach
    </div>
@endsection
