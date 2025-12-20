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

        <form action="{{ route('teacher-placement.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <h2>Penempatan Guru</h2>
            </div>

            <div class="mb-5">
                <label class="form-label fs-4">Periode</label>
                <select name="academic_period_id" class="form-select form-select-lg mb-5">
                    <option value="">--Please choose an option--</option>
                    @foreach ($academicPeriods as $period)
                        <option value="{{ $period->id }}">{{ $period->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label class="form-label fs-4">Nama Paket Kombinasi</label>
                <select name="packet_combination_id" class="form-select form-select-lg mb-5">
                    <option value="">--Please choose an option--</option>
                    @foreach ($packetCombinations as $packetCombination)
                        <option value="{{ $packetCombination->id }}">{{ $packetCombination->lessonLevel->name }} -
                            {{ $packetCombination->program->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label class="form-label fs-4">Nama Guru</label>
                <select name="teacher_id" id="select" class="form-select form-select-lg mb-5">
                    <option value="">--Please choose an option--</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label class="form-label fs-4">Nama Siswa </label>
                <select name="student_id" id="select" class="form-select form-select-lg mb-5">
                    <option value="">--Please choose an option--</option>
                    @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label class="form-label fs-4">Jumlah Pertemuan</label>
                <input type="number" name="meeting_times" class="form-control form-control-lg" value="{{ old('meeting_times') }}">
            </div>

            <div class="mb-5">
                <label class="form-label fs-4">Durasi Mengajar (dalam menit)</label>
                <input type="number" name="duration_minutes" class="form-control form-control-lg" value="{{ old('duration_minutes') }}">
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <a href="{{ route('teacher-placement.index') }}" class="btn btn-lg btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-lg btn-purple">Simpan</button>
                </div>
            </div>

        </form>
    </section>
@endsection
