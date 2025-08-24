@extends('layouts.main')

@section('title', 'Halaman Siswa')

@section('content')
    <header>
        <h1>Halaman Siswa</h1>
    </header>
    <section class="testimonial-section">
        <h2 class="mb-4">Daftar Siswa</h2>
        <div class="row g-4">
            @foreach ($students as $student)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm card-siswa">
                        <img src="{{ Avatar::create($student->name)->toBase64() }}"
                             class="card-img-top avatar-cover"
                             alt="Avatar {{ $student->name }}">
                        <div class="card-body text-start">
                            <h5 class="card-title pb-2 fw-bold">{{ $student->name }}</h5>
                            <small class="card-text mb-1"><strong>No Telpon:</strong> {{ $student->phone_number }}</small><br>
                            <small class="card-text mb-1"><strong>Kelas:</strong> {{ $student->class_status }}</small><br>
                            <small class="card-text mb-1"><strong>Jenis Kelamin:</strong> {{ $student->gender }}</small><br>
                            <small class="card-text"><strong>Alamat:</strong> {{ $student->address }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
