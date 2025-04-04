@extends('layouts.app')

@section('title', 'Daftar Lowongan')

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
            /*background-color: #4CAF50;*/
            /* Warna hijau untuk success */
            color: #000;
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
            color: #000;
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
                <h1 class="heading">Daftar Lowongan</h1>
            </div>
            <div class="">
                <a href="{{ route('job.vacancy.create') }}" class="btn btn-violet">Tambah Lowongan</a>
            </div>
        </div>

        <!-- Flash Notification -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <span class="closebtn">&times;</span>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
                <span class="closebtn">&times;</span>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lowongan</th>
                        <th>Kategori</th>
                        <th>Tipe Pekerjaan</th>
                        <th>Kebijakan Kerja</th>
                        <th style="width:100px">Gaji</th>
                        <th>Deskripsi</th>
                        <th>Tenggat Waktu</th>
                        <th>Diterbitkan Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        function formatSalary($salaryMin, $salaryMax) {
                            // Format untuk gaji minimum
                            if ($salaryMin >= 1000000) {
                                $formattedMin = number_format($salaryMin / 1000000, 0) . ' juta';
                            } elseif ($salaryMin >= 100000) {
                                $formattedMin = number_format($salaryMin / 1000, 0) . ' ribu';
                            } else {
                                $formattedMin = 'Rp ' . number_format($salaryMin, 0, ',', '.');
                            }

                            // Format untuk gaji maksimum
                            if ($salaryMax >= 1000000) {
                                $formattedMax = number_format($salaryMax / 1000000, 0) . ' juta';
                            } elseif ($salaryMax >= 100000) {
                                $formattedMax = number_format($salaryMax / 1000, 0) . ' ribu';
                            } else {
                                $formattedMax = 'Rp ' . number_format($salaryMax, 0, ',', '.');
                            }

                            return $formattedMin . ' - ' . $formattedMax;
                        }
                    @endphp
                    @forelse($jobVacancies as $job)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->category }}</td>
                            <td>{{ $job->job_type }}</td>
                            <td>{{ $job->work_policy }}</td>
                            <td>{{ formatSalary($job->salary_min, $job->salary_max) }}</td>
                            <td>{{ \Illuminate\Support\Str::words($job->job_description, 5, '...') }}</td>
                            <td>{{ \Carbon\Carbon::parse($job->date_line)->format('d M, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($job->published_at)->format('d M, Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('job.vacancy.edit', $job->id) }}"
                                        class="btn btn-sm btn-warning" >Edit</a>
                                    <form action="{{ route('job.vacancy.destroy', $job->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No Packet available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
