@extends('layouts.app')

@section('title', 'Detail Pertemuan')

@section('css')
    <style>
        .detail-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .info-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .info-card h4 {
            color: #8e44ad;
            margin-bottom: 15px;
        }

        .map-container {
            height: 400px;
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .badge-custom {
            font-size: 14px;
            padding: 6px 12px;
        }

        .info-row {
            margin-bottom: 10px;
        }

        .info-label {
            font-weight: 600;
            color: #555;
        }

        .info-value {
            color: #222;
        }

        .map-legend span {
            margin-right: 20px;
            font-size: 14px;
        }
    </style>
@endsection

@section('content')
    <section class="courses">
        <div class="detail-container">
            <h1 class="heading">Detail Pertemuan</h1>

            <a href="{{ route('teacher.meeting.attendance.show', $meeting->teacher_placement_id) }}"
                class="btn btn-primary mb-3">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

            {{-- INFORMASI --}}
            <div class="info-card">
                <h4>Informasi Pertemuan</h4>

                <div class="row">
                    <div class="col-md-6">
                        <div class="info-row">
                            <div class="info-label">Kode Pertemuan</div>
                            <div class="info-value">{{ $meeting->code ?? '-' }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Durasi</div>
                            <div class="info-value">{{ $meeting->duration_minutes ?? '-' }} menit</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Status Absensi</div> @php
                                $status = $meeting->attendance_status;
                                $statusClass = match ($status) {
                                    'Hadir' => 'success',
                                    'Kurang' => 'danger',
                                    'Lebih' => 'primary',
                                    default => 'secondary',
                                };
                            @endphp <span
                                class="badge badge-{{ $statusClass }} badge-custom"> {{ $status ?? 'Belum Absen' }} </span>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Laporan Harian</div>
                            <div class="info-value"> {{ $meeting->daily_report ?? 'Belum ada laporan' }} </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-row">
                            <div class="info-label">Jadwal Mulai</div>
                            <div class="info-value">
                                {{ $meeting->scheduled_start_time?->locale('id')->translatedFormat('l, d-m-Y H:i:s') ?? '-' }}
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Jadwal Berakhir</div>
                            <div class="info-value">
                                {{ $meeting->scheduled_end_time?->locale('id')->translatedFormat('l, d-m-Y H:i:s') ?? '-' }}
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Waktu Aktual Mulai</div>
                            <div class="info-value">
                                {{ $meeting->actual_start_time?->locale('id')->translatedFormat('l, d-m-Y H:i:s') ?? '-' }}
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Waktu Aktual Berakhir</div>
                            <div class="info-value">
                                {{ $meeting->actual_end_time?->locale('id')->translatedFormat('l, d-m-Y H:i:s') ?? '-' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MAP --}}
            <div class="info-card">
                <h4>Lokasi Absensi</h4>

                @if ($meeting->actual_start_location || $meeting->actual_end_location)
                    <div id="map" class="map-container"></div>

                    <div class="map-legend mt-2">
                        <span class="text-success">
                            <i class="fas fa-location-dot"></i> Lokasi Masuk
                        </span>
                        <span class="text-danger">
                            <i class="fas fa-location-dot"></i> Lokasi Keluar
                        </span>
                    </div>

                    <p class="mt-2 text-muted"> <small> Peta menampilkan titik lokasi berdasarkan GPS perangkat saat guru
                            melakukan absensi. </small> </p>
                    {{-- TOMBOL FOKUS --}}
                    <div class="mt-3">
                        @if ($meeting->actual_start_location)
                            <button class="btn btn-success btn-sm me-2" onclick="focusStart()">
                                Fokus Lokasi Masuk
                            </button>
                        @endif

                        @if ($meeting->actual_end_location)
                            <button class="btn btn-danger btn-sm" onclick="focusEnd()">
                                Fokus Lokasi Keluar
                            </button>
                        @endif
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="info-row">
                                <div class="info-label">Akurasi GPS (Masuk)</div>
                                <div class="info-value">
                                    @if ($meeting->actual_start_location['accuracy'] ?? false)
                                        ± {{ $meeting->actual_start_location['accuracy'] }} meter
                                        {!! $meeting->actual_start_location['accuracy'] <= 50
                                            ? '<span class="badge badge-success ms-2">Baik</span>'
                                            : '<span class="badge badge-warning ms-2">Kurang Akurat</span>' !!}
                                    @else
                                        <span class="text-muted">Tidak tersedia</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-row">
                                <div class="info-label">Akurasi GPS (Keluar)</div>
                                <div class="info-value">
                                    @if ($meeting->actual_end_location['accuracy'] ?? false)
                                        ± {{ $meeting->actual_end_location['accuracy'] }} meter
                                        {!! $meeting->actual_end_location['accuracy'] <= 50
                                            ? '<span class="badge badge-success ms-2">Baik</span>'
                                            : '<span class="badge badge-warning ms-2">Kurang Akurat</span>' !!}
                                    @else
                                        <span class="text-muted">Tidak tersedia</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($meeting->actual_start_location && $meeting->actual_end_location)
                        <hr>
                        <div class="info-row">
                            <div class="info-label">Jarak Lokasi Masuk → Keluar</div>
                            <div class="info-value">
                                <strong id="distanceResult">Menghitung...</strong>
                            </div>
                        </div>
                    @endif
                @else
                    <p class="text-muted">Lokasi belum tersedia.</p>
                @endif
            </div>
        </div>
    </section>

    {{-- GOOGLE MAPS --}}
    @if ($meeting->actual_start_location || $meeting->actual_end_location)
        <script>
            const GOOGLE_MAPS_KEY = 'AIzaSyBsNIzoRf4Idv1RIzvobkSPd0WSHXyvl4Q';

            let map;
            let startMarker = null;
            let endMarker = null;

            function loadGoogleMaps() {
                if (window.google) {
                    initMap();
                    return;
                }

                const script = document.createElement('script');
                script.src = `https://maps.googleapis.com/maps/api/js?key=${GOOGLE_MAPS_KEY}&callback=initMap`;
                script.async = true;
                script.defer = true;
                document.head.appendChild(script);
            }

            function initMap() {
                const defaultCenter = {
                    lat: -6.2088,
                    lng: 106.8456
                };

                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: defaultCenter,
                });

                @if ($meeting->actual_start_location)
                    const startLocation = {
                        lat: {{ $meeting->actual_start_location['lat'] }},
                        lng: {{ $meeting->actual_start_location['lng'] }}
                    };

                    startMarker = new google.maps.Marker({
                        position: startLocation,
                        map: map,
                        title: 'Lokasi Masuk',
                        icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
                    });

                    map.setCenter(startLocation);
                @endif

                @if ($meeting->actual_end_location)
                    const endLocation = {
                        lat: {{ $meeting->actual_end_location['lat'] }},
                        lng: {{ $meeting->actual_end_location['lng'] }}
                    };

                    endMarker = new google.maps.Marker({
                        position: endLocation,
                        map: map,
                        title: 'Lokasi Keluar',
                        icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
                    });
                @endif
            }

            function focusStart() {
                if (startMarker) {
                    map.panTo(startMarker.getPosition());
                    map.setZoom(18);
                }
            }

            function focusEnd() {
                if (endMarker) {
                    map.panTo(endMarker.getPosition());
                    map.setZoom(18);
                }
            }

            document.addEventListener('DOMContentLoaded', loadGoogleMaps);


            // JARAK ANTAR LOKASI
            function toRad(value) {
                return value * Math.PI / 180;
            }

            function calculateDistance(lat1, lng1, lat2, lng2) {
                const R = 6371000; // radius bumi (meter)
                const dLat = toRad(lat2 - lat1);
                const dLng = toRad(lng2 - lng1);

                const a =
                    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
                    Math.sin(dLng / 2) * Math.sin(dLng / 2);

                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                return R * c;
            }

            document.addEventListener('DOMContentLoaded', () => {
                @if ($meeting->actual_start_location && $meeting->actual_end_location)
                    const distance = calculateDistance(
                        {{ $meeting->actual_start_location['lat'] }},
                        {{ $meeting->actual_start_location['lng'] }},
                        {{ $meeting->actual_end_location['lat'] }},
                        {{ $meeting->actual_end_location['lng'] }}
                    );

                    const rounded = Math.round(distance);
                    const el = document.getElementById('distanceResult');

                    if (rounded <= 50) {
                        el.innerHTML = `${rounded} meter <span class="badge badge-success ms-2">Normal</span>`;
                    } else if (rounded <= 200) {
                        el.innerHTML = `${rounded} meter <span class="badge badge-warning ms-2">Perlu Dicek</span>`;
                    } else {
                        el.innerHTML = `${rounded} meter <span class="badge badge-danger ms-2">Tidak Wajar</span>`;
                    }
                @endif
            });
        </script>
    @endif
@endsection
