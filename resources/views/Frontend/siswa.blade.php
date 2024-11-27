@extends('layouts.main')

@section('title', 'Halaman Siswa')

@section('content')
    <header>
        <h1>Halaman Siswa</h1>
    </header>
    <section class="testimonial-section">
        <h2>Daftar Siswa</h2>
        <div class="testimonial-container">
            @foreach ($students as $student )
            <div class="card-siswa">
                <img src="{{ asset('assets/image/FE/mr.e.jpg') }}" alt="Avatar" style="width:100%">
                <div class="container" style="text-align: left">
                  <h4><b>Nama: {{ $student->name }}</b></h4>
                  <p>No Telpon: {{ $student->phone }}</p>
                  <p>Email: {{ $student->email }}</p>
                  <p>Kelas: {{ $student->degree }}</p>
                  <p>Jenis Kelamin: {{ $student->gender }}</p>
                  <br>
                </div>
              </div>
            @endforeach

        </div>
    </section>
@endsection
