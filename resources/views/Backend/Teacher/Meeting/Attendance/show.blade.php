@extends('layouts.app')

@section('title', 'Show')
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
            {{-- <h3>Edit Guru</h3> --}}
            <p>Nama Paket: {{ $teacherPlacement->packetCombination->packet->name }}</p>
            <p>Nama Program: {{ $teacherPlacement->packetCombination->program->name }}</p>
            <p>Nama Siswa: {{ $teacherPlacement->student->name }} - {{  $teacherPlacement->student->class_status  }}</p>

            <span>Detail Pertemuan:</span>

            @php
                $no = 1;
            @endphp
            {{-- Looping untuk setiap pertemuan --}}
            @foreach ($teacherPlacement->meetings as $key => $meeting)
                <div class="row">
                    <div class="col-md-2">
                        <p>Ke-{{ $key + 1 }}</p>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="scheduled_start_time_{{ $key }}" class="form-label">Waktu Mulai:</label>
                            <input class="form-control" type="date" id="scheduled_start_time_{{ $key }}" name="meetings[{{ $key }}][scheduled_start_time]" value="{{ \Carbon\Carbon::parse($meeting->scheduled_start_time)->format('d/m/Y') }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="scheduled_end_time_{{ $key }}" class="form-label">Waktu Berakhir:</label>
                            <input class="form-control" type="date" id="scheduled_end_time_{{ $key }}" name="meetings[{{ $key }}][scheduled_end_time]" value="{{ \Carbon\Carbon::parse($meeting->scheduled_end_time)->format('d/m/Y') }}" required>
                        </div>
                    </div>
                </div>
            @endforeach

            <input type="submit" value="Update Guru" class="btn">
        </form>
    </section>
@endsection
