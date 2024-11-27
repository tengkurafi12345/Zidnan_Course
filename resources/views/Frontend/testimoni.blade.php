@extends('layouts.main')

@section('title', 'Testimoni')

@section('content')
    <header>
        <h1>Halaman Testimoni</h1>
    </header>
    <!-- Content -->
    <!-- Testimonial Section 1: Teks Testimoni -->
    <section class="testimonial-section">
        <h2>Testimoni Peserta</h2>
        <div class="testimonial-slider">
            @foreach ($testimonials as $testimonial)
            <div class="testimonial-item">
                <p>"{{ $testimonial->message }}"</p>
                <h3>{{ $testimonial->name }}</h3>
                <span>Sebagai : {{ $testimonial->role }} <br> di {{  $testimonial->origin  }}</span>
            </div>
            @endforeach
        </div>
    </section>
@endsection
