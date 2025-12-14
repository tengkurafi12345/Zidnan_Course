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
                        <th rowspan="2">Pertemuan Ke-</th>
                        <th colspan="2">Waktu Penjadwalan</th>
                        <th colspan="2">Waktu Presensi</th>
                        <th rowspan="2">Laporan Harian</th>
                        <th rowspan="2">Status</th>
                        <th rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th>Mulai</th>
                        <th>Berakhir</th>
                        <th>Mulai</th>
                        <th>Berakhir</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($meetings as $meeting)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="sub-time-column">
                                {{ $meeting->scheduled_start_time ? \Carbon\Carbon::parse($meeting->scheduled_start_time)->locale('id')->translatedFormat('l, d-m-Y H:i:s') : '-' }}
                            </td>
                            <td class="sub-time-column">
                                {{ $meeting->scheduled_end_time ? \Carbon\Carbon::parse($meeting->scheduled_end_time)->locale('id')->translatedFormat('l, d-m-Y H:i:s') : '-' }}
                            </td>
                            <td class="sub-time-column">
                                {{ $meeting->actual_start_time ? \Carbon\Carbon::parse($meeting->actual_start_time)->locale('id')->translatedFormat('l, d-m-Y H:i:s') : '-' }}
                            </td>
                            <td class="sub-time-column">
                                {{ $meeting->actual_end_time ? \Carbon\Carbon::parse($meeting->actual_end_time)->locale('id')->translatedFormat('l, d-m-Y H:i:s') : '-' }}
                            </td>
                            <td>
                                {{ $meeting->daily_report ?? '-' }}
                            </td>
                            <td>
                                @php
                                    $status = $meeting->attendance_status;
                                    if ($status == 'Hadir') {
                                        $statusClass = 'success';
                                    } elseif ($status == 'Kurang') {
                                        $statusClass = 'danger';
                                    } elseif ($status == 'Lebih') {
                                        $statusClass = 'primary';
                                    } else {
                                        $statusClass = 'secondary';
                                    }
                                @endphp
                                <span class="badge fs-3 text-bg-{{ $statusClass }}">{{ $status ?? 'Belum Absen' }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('teacher.attendance.meeting.show', $meeting->id) }}" class="btn btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No Teacher Placement available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        
        <!-- Modal Instruksi Penggunaan -->
        <div class="modal fade instruction-modal" id="instructionModal" tabindex="-1" aria-labelledby="instructionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="instructionModalLabel"><i class="fas fa-info-circle"></i> Instruksi Penggunaan Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li><strong>Pilih Paket:</strong> Gunakan dropdown di atas untuk memilih paket pertemuan yang ingin Anda kelola.</li>
                            <li><strong>Absensi Masuk/Keluar:</strong> Klik tombol "Masuk" atau "Keluar" pada kolom Aksi. Sistem akan meminta konfirmasi dan mendapatkan lokasi Anda secara otomatis.</li>
                            <li><strong>Penyimpanan Lokasi:</strong> Lokasi (latitude dan longitude) akan disimpan saat absensi untuk verifikasi kehadiran.</li>
                            <li><strong>Konfirmasi:</strong> Pastikan lokasi terdeteksi sebelum mengonfirmasi. Jika gagal, periksa izin lokasi di browser Anda.</li>
                            <li><strong>Status Absensi:</strong> Status akan diperbarui otomatis berdasarkan durasi pertemuan (Hadir, Kurang, Lebih, atau Belum Absen).</li>
                            <li><strong>Laporan Harian:</strong> Klik ikon edit untuk menambahkan laporan setelah absensi selesai.</li>
                            <li><strong>Tips:</strong> Gunakan perangkat dengan GPS aktif. Di mobile, pastikan aplikasi browser memiliki akses lokasi.</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        
        // Event listener untuk tombol info
        document.getElementById('infoBtn').addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById('instructionModal'));
            modal.show();
        });


        // Tutup alert
        document.querySelectorAll('.closebtn').forEach(btn => {
            btn.addEventListener('click', function() {
                this.parentElement.style.display = 'none';
            });
        });
    </script>
@endsection
