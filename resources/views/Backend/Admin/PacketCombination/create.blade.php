@extends('layouts.app')

@section('title', 'Tambah Paket Kombinasi')
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

        <form action="{{ route('packet.combination.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Tambah Paket Kombinasi</h3>

            <p>Nama Paket</p>
            <select name="packet_id" id="select" class="form-select">
                <option value="">--Please choose an option--</option>
                @foreach ($packets as $packet)
                    <option value="{{ $packet->id }}" >{{ $packet->name }}</option>
                @endforeach
            </select>

            <p>Nama Program</p>
            <select name="program_id" id="select" class="form-select">
                <option value="">--Please choose an option--</option>
                @foreach ($programs as $program)
                    <option value="{{ $program->id }}" >{{ $program->name }}</option>
                @endforeach
            </select>

            <p>Harga</p>
            <input type="number" name="price" id="" value="{{ old('price') }}" class="box">

            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('packet.combination.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-purple">Simpan</button>
                </div>
            </div>
        </form>
    </section>
@endsection
