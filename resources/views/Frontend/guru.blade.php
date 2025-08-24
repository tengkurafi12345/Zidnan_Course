@extends('layouts.main')

@section('title', 'Halaman Guru')

@section('content')
    <header>
        <h1>Halaman Guru</h1>
    </header>
    <section class="testimonial-section">
        <h2>Daftar Pengajar</h2>
        <div class="testimonial-container">
            @foreach ($teachers as $teacher )
            <div class="testimonial-item">
                <img src="{{ Avatar::create($teacher->name)->toBase64() }}" alt="Foto Instruktur {{ $teacher->name  }}" class="testimonial-img">
                <h3>{{ $teacher->name }}</h3>
                <h4>{{ $teacher->role }}</h4>
                <p>"{{ $teacher->bio }}"</p>
            </div>
            @endforeach

        </div>
    </section>
@endsection
