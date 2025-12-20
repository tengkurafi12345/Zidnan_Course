@extends('layouts.app')

@section('title', 'Penempatan Guru')

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
                <h1 class="heading">Penempatan Guru</h1>
            </div>
            <div class="">
                <a href="{{ route('teacher-placement.create') }}" class="btn btn-violet">Tempatkan Guru</a>
            </div>
        </div>

        <!-- Flash Notification -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <span class="closebtn">&times;</span>
            </div>
        @endif

        <form method="GET" class="row g-3 mb-4">

            {{-- Academic Period --}}
            <div class="col-md-4">
                <label class="form-label">Periode Akademik</label>
                <select name="academic_period_id" class="form-select">
                    <option value="">Semua Periode</option>
                    @foreach($academicPeriods as $period)
                        <option value="{{ $period->id }}"
                            {{ $selectedPeriod == $period->id ? 'selected' : '' }}>
                            {{ $period->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        
            {{-- Guru --}}
            <div class="col-md-4">
                <label class="form-label">Guru</label>
                <select name="teacher_id" class="form-select">
                    <option value="">Semua Guru</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                            {{ $selectedTeacher == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        
            {{-- Siswa --}}
            <div class="col-md-4">
                <label class="form-label">Siswa</label>
                <select name="student_id" class="form-select">
                    <option value="">Semua Siswa</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}"
                            {{ $selectedStudent == $student->id ? 'selected' : '' }}>
                            {{ $student->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        
            <div class="col-12 text-end">
                <button class="btn btn-primary">Filter</button>
                <a href="{{ route('teacher-placement.index') }}" class="btn btn-secondary">
                    Reset
                </a>
            </div>
        </form>
        

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Periode</th>
                        <th>Paket</th>
                        <th>Program</th>
                        <th>Guru</th>
                        <th>Siswa</th>
                        <th>Jumlah Pertemuan</th>
                        <th>Durasi Mengajar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teacherPlacements as $teacherPlacement)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $teacherPlacement->academicPeriod->name }}</td>
                            <td>{{ $teacherPlacement->packetCombination?->lessonLevel->name }}</td>
                            <td>{{ $teacherPlacement->packetCombination?->program->name }}</td>
                            <td>{{ $teacherPlacement->teacher->name }}</td>
                            <td>{{ $teacherPlacement->student->name }}</td>
                            <td>{{ $teacherPlacement->meeting_times }}</td>
                            <td>{{ $teacherPlacement->duration_minutes }} Menit</td>
                            <td>
                                <div class="action-buttons">
                                    {{-- <a href="{{ route('teacher.placement.edit', $teacherPlacement->id) }}"
                                        class="btn btn-sm btn-warning" >Edit</a> --}}
                                    <form action="{{ route('teacher-placement.destroy', $teacherPlacement->id) }}" method="POST"
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
                            <td colspan="10" class="text-center">No Teacher Placement available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
