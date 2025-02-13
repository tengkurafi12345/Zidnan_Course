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
                <h1 class="heading">Absensi Pertemuan Guru</h1>
            </div>

        </div>

        <!-- button back -->
        <div class="container text-start">
            <div class="row row-cols-1 row-cols-lg-4 g-2 g-lg-5">
              <div class="col">
                <a href="{{ route('teacher.meeting.attendance.index') }}" class="btn btn-lg btn-primary">Kembali</a>
              </div>
            </div>
        </div>

        <!-- Flash Notification -->
        @if (session('success'))
            <div class="alert alert-success">
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
                                Mulai: {{ $meeting->scheduled_start_time ? \Carbon\Carbon::parse($meeting->scheduled_start_time)->translatedFormat('l, d-m-Y H:i:s') : '' }} <br>
                                Berakhir: {{ $meeting->scheduled_end_time ? \Carbon\Carbon::parse($meeting->scheduled_end_time)->translatedFormat('l, d-m-Y H:i:s') : '' }}
                            </td>
                            <td>
                                Mulai: {{ $meeting->actual_start_time ? \Carbon\Carbon::parse($meeting->actual_start_time)->translatedFormat('l, d-m-Y H:i:s') : '' }} <br>
                                Berakhir: {{ $meeting->actual_end_time ? \Carbon\Carbon::parse($meeting->actual_end_time)->translatedFormat('l, d-m-Y H:i:s') : '' }}
                            </td>
                            <td>
                                 {{ $meeting->daily_report ?? '-'}}
                            </td>
                                <td style="width: 6rem">
                                    @php
                                        $status = 'Belum'; // Status default
                                        $statusClass = 'secondary'; // Warna default

                                        if ($meeting->actual_start_time) {
                                            $scheduledStart = \Carbon\Carbon::parse($meeting->scheduled_start_time);
                                            $actualStart = \Carbon\Carbon::parse($meeting->actual_start_time);

                                            $diffInMinutes = $scheduledStart->diffInMinutes($actualStart);

                                            if ($diffInMinutes <= 5 && $diffInMinutes >= -5) {
                                                $status = 'Tepat Waktu';
                                                $statusClass = 'success'; // Hijau
                                            } elseif ($actualStart->gt($scheduledStart)) {
                                                $status = 'Mundur';
                                                $statusClass = 'warning'; // Kuning
                                            } else {
                                                $status = 'Kurang';
                                                $statusClass = 'danger'; // Merah
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
