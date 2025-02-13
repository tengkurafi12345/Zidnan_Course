@extends('layouts.app')

@section('title', 'Absensi Pertemuan')

@section('css')
    <style>
        /* Mengatur layout umum tabel */
        .table-responsive {
            margin-top: 20px;
            overflow-x: auto;
        }

        /* Styling untuk tabel */
        table.table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        /* Styling untuk header tabel */
        table.table thead {
            background-color: #8e44ad;
            color: #fff;
            text-align: left;
        }

        table.table th {
            padding: 12px 15px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        table.table td {
            padding: 12px 15px;
            border-top: 1px solid #f1f1f1;
        }

        /* Menambahkan efek hover pada baris tabel */
        table.table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Menambahkan border pada tabel */
        table.table,
        table.table th,
        table.table td {
            border: 1px solid #ddd;
        }

        /* Styling untuk tombol di dalam tabel */
        table.table .btn {
            margin: 0 5px;
        }

        /* Styling untuk tombol aksi (Edit, Delete) */
        .table .action-buttons {
            display: flex;
            /* Gunakan flexbox untuk menyusun tombol */
            gap: 10px;
            /* Memberikan jarak antar tombol */
            justify-content: center;
            /* Mengatur tombol agar sejajar di tengah */
        }

        /* Styling tombol di dalam tabel agar lebih kecil dan rapi */
        .table .action-buttons .btn {
            font-size: 12px;
            padding: 6px 12px;
        }

        table.table .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: white;
        }

        table.table .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }

        table.table .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        table.table .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        /* Styling untuk alert */
        .alert {
            padding: 20px;
            background-color: #4CAF50;
            /* Warna hijau untuk success */
            color: white;
            margin-bottom: 15px;
            border-radius: 5px;
            position: relative;
            /* Agar posisi close button bisa diatur */
        }

        /* Close button (tanda silang) */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 25px;
            font-weight: bold;
            cursor: pointer;
        }

        .closebtn:hover {
            color: #f44336;
            /* Warna merah saat hover */
        }


        /* Styling untuk Badge Is Active */
        .badge-danger {
            background-color: red;
            color: white;
            padding: 4px 8px;
            text-align: center;
            border-radius: 5px;
        }

        .badge-success {
            background-color: green;
            color: white;
            padding: 4px 8px;
            text-align: center;
            border-radius: 5px;
        }

        /* Responsif - Tabel di perangkat mobile */
        @media (max-width: 767px) {

            table.table th,
            table.table td {
                padding: 10px;
            }

            table.table .btn {
                font-size: 12px;
            }
        }
    </style>
@endsection

@section('content')
    <section class="courses">
        <div class="flex-container">
            <div class="">
                <h1 class="heading">Absensi Pertemuan</h1>
            </div>
            {{-- <div class="">
                <a href="{{ route('teacher.create') }}" class="btn btn-info">Tambah Guru</a>
            </div> --}}
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('meeting.attendance.index') }}" method="GET">
                            <p>Pilih Paket:</p>
                            <select class="form-select" name="teacher_placement_id" onchange="this.form.submit()">
                                <option value="">Semua Paket</option>
                                @foreach ($teacherPlacements as $teacherPlacement)
                                    <option value="{{ $teacherPlacement->id }}"
                                        {{ $selectedPlacementId == $teacherPlacement->id ? 'selected' : '' }}>
                                        {{ $teacherPlacement->packetCombination->packet->name }} |
                                        {{ $teacherPlacement->packetCombination->program->name }} -
                                        {{ $teacherPlacement->packetCombination->program->meeting_times }}x |
                                        {{ $teacherPlacement->student->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Flash Notification -->
        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
                <span class="closebtn">&times;</span>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Waktu Penjadwalan</th>
                        <th>Waktu Presensi</th>
                        <th>Laporan Harian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($meetings as $meeting)
                        <tr>
                            <td style="width: 5rem">{{ $loop->iteration }}</td>
                            <td>{{ $meeting->code }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-3 col-sm-2 fw-bold">Mulai:</div>
                                    <div class="col-9 col-sm-10">{{ $meeting->scheduled_start_time ? \Carbon\Carbon::parse($meeting->scheduled_start_time)->locale('id')->translatedFormat('l, d-m-Y H:i:s') : '' }}</div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-3 col-sm-2 fw-bold">Berakhir:</div>
                                    <div class="col-9 col-sm-10">{{ $meeting->scheduled_end_time ? \Carbon\Carbon::parse($meeting->scheduled_end_time)->locale('id')->translatedFormat('l, d-m-Y H:i:s') : '' }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-3 col-sm-2 fw-bold">Mulai:</div>
                                    <div class="col-9 col-sm-10">{{ $meeting->actual_start_time ? \Carbon\Carbon::parse($meeting->actual_start_time)->locale('id')->translatedFormat('l, d-m-Y H:i:s') : '' }}</div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-3 col-sm-2 fw-bold">Berakhir:</div>
                                    <div class="col-9 col-sm-10">{{ $meeting->actual_end_time ? \Carbon\Carbon::parse($meeting->actual_end_time)->locale('id')->translatedFormat('l, d-m-Y H:i:s') : '' }}</div>
                                </div>
                            </td>
                            <td>
                                @if ($meeting->daily_report)
                                    {{ $meeting->daily_report }}
                                @else
                                    <a href="{{ route('meeting.attendance.edit', $meeting->id) }}" class="btn btn-warning">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                @endif
                            </td>

                            <td style="width: 6rem">
                                @php
                                    $status = 'Belum'; // Status default
                                    $statusClass = 'secondary'; // Warna default

                                    if ($meeting->actual_start_time && $meeting->actual_end_time) {
                                        $scheduledStart = \Carbon\Carbon::parse($meeting->scheduled_start_time);
                                        $scheduledEnd = \Carbon\Carbon::parse($meeting->scheduled_end_time);
                                        $actualStart = \Carbon\Carbon::parse($meeting->actual_start_time);
                                        $actualEnd = \Carbon\Carbon::parse($meeting->actual_end_time);

                                        $scheduledDuration = $scheduledEnd->diffInMinutes($scheduledStart);
                                        $actualDuration = $actualEnd->diffInMinutes($actualStart);

                                        if ($actualStart->eq($scheduledStart) && $actualEnd->eq($scheduledEnd)) {
                                            $status = 'Hadir';
                                            $statusClass = 'success'; // Hijau
                                        } elseif ($actualDuration < $scheduledDuration) {
                                            $status = 'Kurang';
                                            $statusClass = 'danger'; // Merah
                                        } elseif ($actualStart->gt($scheduledStart)) {
                                            $status = 'Mundur';
                                            $statusClass = 'warning'; // Kuning
                                        }
                                    }

                                    if ($meeting->attendance_status == 'Hangus') {
                                        $status = 'Hangus';
                                        $statusClass = 'secondary'; // Abu-abu
                                    }
                                @endphp
                                <span class="badge text-bg-{{ $statusClass }}">{{ $status }}</span>
                            </td>
                            <td style="width: 5rem">
                                <div class="row">
                                    <div class="col mb-2">
                                        <a href="{{ route('meeting.attendance.masuk', $meeting->id) }}"
                                            class="btn btn-primary {{ $meeting->actual_start_time ? 'disabled' : '' }}"
                                            {{ $meeting->actual_start_time ? 'disabled' : '' }}>
                                            {{ $meeting->actual_start_time ? 'Sudah' : 'Masuk' }}
                                        </a>
                                    </div>
                                    <div class="col mb-2">
                                        <a href="{{ route('meeting.attendance.keluar', $meeting->id) }}"
                                            class="btn btn-primary {{ $meeting->actual_end_time ? 'disabled' : '' }}"
                                            {{ $meeting->actual_end_time ? 'disabled' : '' }}>
                                            {{ $meeting->actual_end_time ? 'Sudah' : 'Keluar' }}
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No Teacher Placement available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
