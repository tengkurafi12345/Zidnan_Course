@extends('layouts.app')

@section('title', 'Edit Jenjang Les')
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

        <form action="{{ route('lesson.level.update', $lessonLevel->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h3>Edit Jenjang Les</h3>

            <p>Kode</p>
            <input type="text" name="code" placeholder="enter your code" class="box"
                value="{{ old('code', $lessonLevel->code) }}">

            <p>Nama</p>
            <input type="text" name="name" placeholder="enter your old text" class="box"
                value="{{ old('name', $lessonLevel->name) }}">

            <p>Tingkatan Kelas</p>
            <input type="text" name="class_level" class="box" value="{{ old('class_level', $lessonLevel->class_level) }}">

            <p>Tanggal Mulai</p>
            <input type="date" name="start_date" class="box" value="{{ old('start_date', $lessonLevel->start_date) }}">

            <p>Tanggal Berakhir</p>
            <input type="date" name="end_date" class="box" value="{{ old('end_date', $lessonLevel->end_date) }}">

            <p>Deskripsi</p>
            <textarea name="description" placeholder="write your description" class="box">{{ old('description', $lessonLevel->description) }}</textarea>

            <div class="row mt-5">
                <div class="col-md-12">
                    <a href="{{ route('lesson.level.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-purple">Simpan</button>
                </div>
            </div>
        </form>
    </section>
@endsection
