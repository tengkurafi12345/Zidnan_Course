@extends('layouts.app')

@section('title', 'Tambah Program')
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

        <form action="{{ route('program.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Tambah Program</h3>

            <p>Kode</p>
            <input type="text" name="code" placeholder="enter your code" class="box"
                value="{{ old('code') }}">

            <p>Nama</p>
            <input type="text" name="name" placeholder="enter your old text" class="box"
                value="{{ old('name') }}">

            <p>Deskripsi</p>
            <input type="text" name="description" class="box" value="{{ old('description') }}">

            <input type="submit" value="Buat Paket" class="btn">
        </form>
    </section>
@endsection
