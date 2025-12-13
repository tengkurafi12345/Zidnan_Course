@extends('layouts.app')

@section('title', 'Edit Guru')
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


        <form action="{{ route('meeting.setup.update', $teacherPlacement->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h3 class="mb-5">Pengaturan Waktu Pertemuan</h3>

            {{-- <h3>Edit Guru</h3> --}}
            <p class="fs-5 p-0 m-0 ">Nama Paket: {{ $teacherPlacement->packetCombination->lessonLevel->name }}</p>
            <p class="fs-5 p-0 m-0">Nama Program: {{ $teacherPlacement->packetCombination->program->name }}</p>
            <p class="fs-5 p-0 m-0">Nama Siswa: {{ $teacherPlacement->student->name }} - {{  $teacherPlacement->student->class_status  }}</p>

            <hr>
            <span >Detail Pertemuan (Waktu yang dijadwalkan):</span>

            @php
                $no = 1;
            @endphp
            {{-- Looping untuk setiap pertemuan --}}
            @foreach ($teacherPlacement->meetings as $key => $meeting)
                <div class="row mt-2">
                    <div class="col-md-2">
                        <p class="fs-5 p-0 m-0">Ke-{{ $key + 1 }}</p>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="scheduled_start_time_{{ $key }}" class="form-label">Waktu Mulai:</label>
                            <input class="form-control" type="datetime-local" id="scheduled_start_time_{{ $key }}" name="meetings[{{ $key }}][scheduled_start_time]" value="{{ \Carbon\Carbon::parse($meeting->scheduled_start_time)->format('d/m/Y') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="scheduled_end_time_{{ $key }}" class="form-label">Waktu Berakhir:</label>
                            <input class="form-control" type="datetime-local" id="scheduled_end_time_{{ $key }}" name="meetings[{{ $key }}][scheduled_end_time]" value="{{ \Carbon\Carbon::parse($meeting->scheduled_end_time)->format('d/m/Y') }}">
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row mt-2">
                <div class="col-md-12">
                    <a href="{{ route('meeting.setup.index') }}" class="btn btn-secondary">Kembali</a>
                    <input type="submit" value="Update Guru" class="btn btn-purple">
                </div>
            </div>
        </form>
    </section>
@endsection
