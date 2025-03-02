@extends('layouts.app')

@section('title', 'Form Penempatan Guru')
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

        <form action="{{ route('teacher.placement.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Penempatan Guru</h3>

            <p>Nama Paket Kombinasi</p>
            <select name="packet_combination_id" id="select" class="form-select">
                    <option value="">--Please choose an option--</option>
                    @foreach ($packetCombinations as $packetCombination)
                        <option value="{{ $packetCombination->id }}" >{{ $packetCombination->packet->name }} - {{ $packetCombination->program->name }}</option>
                    @endforeach
                </select>
            <p>Nama Guru</p>
            <select name="teacher_id" id="select" class="form-select">
                <option value="">--Please choose an option--</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" >{{ $teacher->name }}</option>
                @endforeach
            </select>

            <p>Nama Siswa </p>
            <select name="student_id" id="select" class="form-select">
                <option value="">--Please choose an option--</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" >{{ $student->name }}</option>
                @endforeach
            </select>

            <p>Jumlah Pertemuan</p>
            <input type="text" name="meeting_times" class="box"
                   value="{{ old('meeting_times') }}">

            <div class="row mt-5">
                <div class="col-md-12">
                    <a href="{{ route('teacher.placement.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-purple">Simpan</button>
                </div>
            </div>
        </form>
    </section>
@endsection
