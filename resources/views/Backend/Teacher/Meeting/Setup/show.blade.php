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
<section class="courses">
    <h1 class="heading">Detail Jadwal Pertemuan</h1>

    <a href="{{ route('meeting.setup.edit', $teacherPlacement->id) }}"
       class="btn btn-warning mb-3">
        <i class="fas fa-pen"></i> Edit Jadwal
    </a>

    <div class="card p-3">
        <p><strong>Paket:</strong> {{ $teacherPlacement->packetCombination->lessonLevel->name }}</p>
        <p><strong>Program:</strong> {{ $teacherPlacement->packetCombination->program->name }}</p>
        <p><strong>Siswa:</strong> {{ $teacherPlacement->student->name }}</p>
        <p><strong>Durasi:</strong> {{ $teacherPlacement->duration_minutes }} menit</p>
    </div>

    <hr>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Pertemuan</th>
                <th>Mulai (Terjadwal)</th>
                <th>Berakhir (Terjadwal)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teacherPlacement->meetings as $meeting)
                <tr>
                    <td>Ke-{{ $loop->iteration }}</td>
                    <td>{{ optional($meeting->scheduled_start_time)->format('d M Y H:i') ?? '-' }} </td>
                    <td>{{ optional($meeting->scheduled_end_time)->format('d M Y H:i') ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('meeting.setup.index') }}" class="btn btn-secondary mt-3">
        Kembali
    </a>
</section>
@endsection
