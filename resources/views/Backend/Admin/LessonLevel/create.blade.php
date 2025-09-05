@extends('layouts.app')

@section('title', 'Tambah Jenjang Les')
@section('css')
    <style>
        /* Styling untuk alert */
        .alert {
            padding: 20px;
            background-color: #c81313;
            /* Warna merah untuk error */
            color: white;
            margin-bottom: 20px;
            /* Memberikan ruang di bawah alert */
            border-radius: 5px;
            position: relative;
            width: 100%;
            /* Agar alert mengisi lebar */
        }

        .alert ul {
            list-style: none;
            padding-left: 0;
        }

        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 25px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <section class="form-container">
        {{-- Menampilkan semua error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="closebtn">&times;</span>
            </div>
        @endif

        <form action="{{ route('lesson.level.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Tambah Jenjang Les</h3>

            <p>Kode</p>
            <input type="text" name="code" placeholder="enter your code" class="box"
                value="{{ old('code') }}">

            <p>Nama</p>
            <input type="text" name="name" placeholder="enter your old text" class="box"
                value="{{ old('name') }}">

            <p>Tingkatan Kelas</p>
            <input type="text" name="class_level" class="box" value="{{ old('class_level') }}">

            <p>Tanggal Mulai</p>
            <input type="date" name="start_date" class="box" value="{{ old('start_date') }}">

            <p>Tanggal Berakhir</p>
            <input type="date" name="end_date" class="box" value="{{ old('end_date') }}">

            <p>Deskripsi</p>
            <textarea name="description" placeholder="write your description" class="box">{{ old('description') }}</textarea>

            <div class="row mt-5">
                <div class="col-md-12">
                <a href="{{ route('lesson.level.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-purple">Simpan</button>
                </div>
            </div>
        </form>
    </section>
@endsection
