@extends('layouts.app')

@section('title', 'Absensi Pertemuan')

@section('css')
    <style>
        /* Styling khusus untuk kolom sub-waktu */
        .sub-time-column {
            min-width: 120px;
            /* Lebar minimal untuk sub-kolom */
            line-height: 1.4;
            text-align: center;
        }


        /* Styling untuk alert */
        .alert {
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 15px;
            border-radius: 5px;
            position: relative;
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

        .closebtn:hover {
            color: #f44336;
        }

        /* Styling untuk Badge */
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

        /* Styling untuk tombol info */
        .info-btn {
            background: none;
            border: none;
            color: #8e44ad;
            font-size: 18px;
            cursor: pointer;
            margin-left: 10px;
            padding: 5px;
            border-radius: 50%;
            transition: background-color 0.3s;
        }

        .info-btn:hover {
            background-color: #f0f0f0;
        }

        /* Styling untuk modal instruksi */
        .instruction-modal .modal-content {
            border-radius: 10px;
        }

        .instruction-modal .modal-header {
            background-color: #8e44ad;
            color: white;
            border-bottom: none;
        }

        .instruction-modal .modal-body ul {
            padding-left: 20px;
            margin: 0;
        }

        .instruction-modal .modal-body li {
            margin-bottom: 8px;
            font-size: 14px;
        }

        /* Modal styling umum */
        .modal-content {
            border-radius: 10px;
        }

        .location-info {
            font-size: 14px;
            color: #666;
        }


        .btn-confirm {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-confirm:hover {
            background-color: #218838;
        }

        /* Loading spinner */
        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Responsif - Tabel di perangkat mobile */
        @media (max-width: 767px) {

            table.table th,
            table.table td {
                padding: 8px 5px;
            }

            .sub-time-column {
                min-width: 100px;
            }

            table.table thead tr:nth-child(2) th {
                font-size: 11px;
                padding: 6px 5px;
            }

            table.table .btn {
                font-size: 11px;
                padding: 5px 8px;
            }

            /* Sembunyikan sub-header di mobile untuk kesederhanaan, atau gunakan colspan penuh */
            table.table thead tr:nth-child(2) {
                display: none;
                /* Opsional: Sembunyikan sub-header di mobile */
            }
        }
    </style>
@endsection

@section('content')
    <section class="courses">
        <div class="flex-container">
            <div class="d-flex align-items-center">
                <h1 class="heading">Absensi Pertemuan</h1>
                <button class="info-btn" id="infoBtn" title="Instruksi Penggunaan">
                    <i class="fas fa-info-circle"></i>
                </button>
            </div>
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
                                        {{ $teacherPlacement->packetCombination->lessonLevel->name }} |
                                        {{ $teacherPlacement->packetCombination->program->name }} -
                                        {{ $teacherPlacement->meeting_times }}x |
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
                                @if ($meeting->daily_report)
                                    {{ $meeting->daily_report }}
                                @else
                                    <a href="{{ route('meeting.attendance.edit', $meeting->id) }}" class="btn btn-warning">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                @endif
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
                            <td>
                                @if ($meeting->scheduled_start_time && $meeting->scheduled_end_time)
                                    <div class="action-buttons">
                                        <button
                                            class="btn {{ $meeting->actual_start_time ? 'btn-secondary disabled' : 'btn-primary' }}"
                                            onclick="openAttendanceModal('{{ route('meeting.attendance.masuk', $meeting->id) }}', 'Masuk')"
                                            {{ $meeting->actual_start_time ? 'disabled' : '' }}>
                                            {{ $meeting->actual_start_time ? 'Sudah' : 'Masuk' }}
                                        </button>
                                        <button
                                            class="btn {{ $meeting->actual_end_time ? 'btn-secondary disabled' : 'btn-primary' }}"
                                            onclick="openAttendanceModal('{{ route('meeting.attendance.keluar', $meeting->id) }}', 'Keluar')"
                                            {{ $meeting->actual_end_time ? 'disabled' : '' }}>
                                            {{ $meeting->actual_end_time ? 'Sudah' : 'Keluar' }}
                                        </button>
                                    </div>
                                @else
                                    <p class="text-warning" style="font-size: 12px;">
                                        Jadwal pertemuan belum ditetapkan.
                                    </p>
                                @endif
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

        <!-- Modal Konfirmasi Absensi -->
        <div class="modal fade" id="attendanceModal" tabindex="-1" aria-labelledby="attendanceModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="attendanceModalLabel">Konfirmasi Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin melakukan absensi <strong id="attendanceType"></strong>?</p>
                        <div class="location-info">
                            <p><strong>Lokasi Anda:</strong></p>
                            <p id="locationDisplay">Mendapatkan lokasi...</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="spinner" id="loadingSpinner"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-confirm" id="confirmAttendanceBtn">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Instruksi Penggunaan -->
        <div class="modal fade instruction-modal" id="instructionModal" tabindex="-1"
            aria-labelledby="instructionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="instructionModalLabel"><i class="fas fa-info-circle"></i> Instruksi
                            Penggunaan Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li><strong>Pilih Paket:</strong> Gunakan dropdown di atas untuk memilih paket pertemuan yang
                                ingin Anda kelola.</li>
                            <li><strong>Absensi Masuk/Keluar:</strong> Klik tombol "Masuk" atau "Keluar" pada kolom Aksi.
                                Sistem akan meminta konfirmasi dan mendapatkan lokasi Anda secara otomatis.</li>
                            <li><strong>Penyimpanan Lokasi:</strong> Lokasi (latitude dan longitude) akan disimpan saat
                                absensi untuk verifikasi kehadiran.</li>
                            <li><strong>Konfirmasi:</strong> Pastikan lokasi terdeteksi sebelum mengonfirmasi. Jika gagal,
                                periksa izin lokasi di browser Anda.</li>
                            <li><strong>Status Absensi:</strong> Status akan diperbarui otomatis berdasarkan durasi
                                pertemuan (Hadir, Kurang, Lebih, atau Belum Absen).</li>
                            <li><strong>Laporan Harian:</strong> Klik ikon edit untuk menambahkan laporan setelah absensi
                                selesai.</li>
                            <li><strong>Tips:</strong> Gunakan perangkat dengan GPS aktif. Di mobile, pastikan aplikasi
                                browser memiliki akses lokasi.</li>
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
        let currentUrl = '';
        let currentType = '';

        let currentLat = null;
        let currentLng = null;
        let currentAccuracy = null;
        let currentDeviceInfo = null;

        /**
         * Ambil informasi perangkat
         */
        function getDeviceInfo() {
            return {
                platform: navigator.platform || null,
                userAgent: navigator.userAgent || null,
                language: navigator.language || null,
                vendor: navigator.vendor || null,
                screen: {
                    width: window.screen.width,
                    height: window.screen.height
                }
            };
        }

        /**
         * Tampilkan modal instruksi
         */
        document.getElementById('infoBtn')?.addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById('instructionModal'));
            modal.show();
        });

        /**
         * Buka modal absensi (Masuk / Keluar)
         */
        function openAttendanceModal(url, type) {
            currentUrl = url;
            currentType = type;

            // Reset state
            currentLat = null;
            currentLng = null;
            currentAccuracy = null;
            currentDeviceInfo = null;

            document.getElementById('attendanceType').textContent = type;
            document.getElementById('locationDisplay').innerHTML = 'Mendapatkan lokasi...';
            document.getElementById('loadingSpinner').style.display = 'none';
            document.getElementById('confirmAttendanceBtn').disabled = false;

            if (!navigator.geolocation) {
                alert('Browser Anda tidak mendukung Geolocation.');
                return;
            }

            navigator.geolocation.getCurrentPosition(
                function(position) {
                    currentLat = position.coords.latitude;
                    currentLng = position.coords.longitude;
                    currentAccuracy = position.coords.accuracy;
                    currentDeviceInfo = getDeviceInfo();

                    document.getElementById('locationDisplay').innerHTML =
                        `<strong>Latitude:</strong> ${currentLat}<br>
                         <strong>Longitude:</strong> ${currentLng}<br>
                         <strong>Akurasi:</strong> ±${Math.round(currentAccuracy)} meter`;

                    // Validasi awal akurasi (UX)
                    // if (currentAccuracy > 100) {
                    //     document.getElementById('locationDisplay').innerHTML +=
                    //         `<br><span style="color:red;">Akurasi lokasi rendah. Disarankan pindah ke area terbuka.</span>`;
                    // }
                },
                function(error) {
                    let message = 'Gagal mendapatkan lokasi.';
                    if (error.code === error.PERMISSION_DENIED) {
                        message = 'Izin lokasi ditolak. Aktifkan lokasi di browser.';
                    } else if (error.code === error.TIMEOUT) {
                        message = 'Pengambilan lokasi timeout. Coba lagi.';
                    }

                    document.getElementById('locationDisplay').textContent = message;
                    alert(message);
                }, {
                    enableHighAccuracy: true,
                    maximumAge: 0,
                    timeout: 10000
                }
            );

            const modal = new bootstrap.Modal(document.getElementById('attendanceModal'));
            modal.show();
        }

        /**
         * Konfirmasi absensi (POST ke endpoint)
         */
        document.getElementById('confirmAttendanceBtn')?.addEventListener('click', function() {

            if (!currentLat || !currentLng || !currentAccuracy) {
                alert('Lokasi belum berhasil didapatkan. Tunggu sebentar atau coba ulang.');
                return;
            }

            // // UX guard (tidak menggantikan validasi backend)
            // if (currentAccuracy > 150) {
            //     alert('Akurasi lokasi terlalu rendah. Absensi dibatalkan.');
            //     return;
            // }

            this.disabled = true;
            document.getElementById('loadingSpinner').style.display = 'inline-block';

            fetch(currentUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        latitude: currentLat,
                        longitude: currentLng,
                        accuracy: currentAccuracy,
                        device_info: currentDeviceInfo
                    })
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('loadingSpinner').style.display = 'none';
                    document.getElementById('confirmAttendanceBtn').disabled = false;

                    if (data.success) {
                        alert(data.success);
                        location.reload();
                    } else {
                        alert(data.error || 'Terjadi kesalahan saat absensi.');
                    }
                })
                .catch(error => {
                    document.getElementById('loadingSpinner').style.display = 'none';
                    document.getElementById('confirmAttendanceBtn').disabled = false;

                    alert('Kesalahan jaringan. Silakan coba lagi.');
                    console.error(error);
                });
        });

        /**
         * Tutup alert flash
         */
        document.querySelectorAll('.closebtn').forEach(btn => {
            btn.addEventListener('click', function() {
                this.parentElement.style.display = 'none';
            });
        });
    </script>

@endsection
