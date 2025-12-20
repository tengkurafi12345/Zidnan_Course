@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="home-grid">
    <h1 class="heading">Selamat Datang di Zidnan Course</h1>

    <div class="box-container" style="display:block">
        <div class="box">

            <h1 class="title">{{ Auth::user()->name }}</h1>
            <h3 style="font-size: 1.6rem; opacity: 0.8">{{ Auth::user()->email }}</h3>

            {{-- ================= ADMIN ================= --}}
            @if(auth()->user()->hasRole('admin'))

                <p class="tutor" style="margin-top:15px">
                    Anda login sebagai <strong>Administrator Sistem</strong>.  
                    Dashboard ini merupakan pusat kendali untuk mengatur seluruh proses pembelajaran,
                    mulai dari setup akademik hingga monitoring kehadiran guru.
                </p>

                <p style="margin-top:10px">
                    Pastikan setiap tahapan berikut telah disiapkan dengan benar agar sistem absensi
                    dan pelaporan berjalan optimal.
                </p>

                <ol style="margin-top:20px; line-height:1.9">
                    <li>
                        <strong>Setup Periode Akademik</strong><br>
                        Tentukan periode aktif sebagai acuan seluruh aktivitas pembelajaran dan absensi.
                        <br>
                        <a href="{{ route('academic.period.index') }}" class="btn btn-primary" style="margin-top:5px">
                            Kelola Periode Akademik
                        </a>
                    </li>

                    <li>
                        <strong>Kelola Master Data</strong><br>
                        Atur Kelas Program, Jenjang Les, Mata Pelajaran, Guru, dan Siswa.
                        Data ini menjadi fondasi seluruh proses sistem.
                    </li>

                    <li>
                        <strong>Susun Paket & Penempatan Guru</strong><br>
                        Hubungkan guru, siswa, dan paket pembelajaran.
                        Penempatan ini akan otomatis menghasilkan jadwal dan pertemuan.
                        <br>
                        <a href="{{ route('teacher-placement.index') }}" class="btn btn-primary" style="margin-top:5px">
                            Penempatan Guru
                        </a>
                    </li>

                    <li>
                        <strong>Monitoring Absensi & Aktivitas Mengajar</strong><br>
                        Pantau kehadiran guru berdasarkan pertemuan, jam masuk/keluar,
                        durasi, serta laporan harian.
                        <br>
                        <a href="{{ route('teacher-meeting-attendance.index') }}" class="btn btn-primary" style="margin-top:5px">
                            Lihat Absensi Guru
                        </a>
                    </li>
                </ol>

                <p style="margin-top:20px; font-style:italic">
                    Catatan: Data absensi ini akan menjadi dasar laporan bulanan,
                    evaluasi pembelajaran, dan sistem pembayaran di tahap berikutnya.
                </p>

            {{-- ================= TEACHER ================= --}}
            @elseif(auth()->user()->hasRole('teacher'))

                <p class="tutor" style="margin-top:15px">
                    Selamat datang sebagai <strong>Guru / Tentor</strong>.  
                    Sistem ini dirancang untuk membantu Anda mencatat kehadiran mengajar
                    secara <strong>mudah, transparan, dan terstruktur</strong>.
                </p>

                <p style="margin-top:10px">
                    Silakan ikuti alur berikut agar absensi dan laporan pembelajaran tercatat dengan benar.
                </p>

                <ol style="margin-top:20px; line-height:1.9">
                    <li>
                        <strong>Pengaturan Jadwal Absensi</strong><br>
                        Periksa jadwal pertemuan yang telah disiapkan oleh admin.
                        Pastikan waktu dan urutan pertemuan sudah sesuai.
                        <br>
                        <a href="{{ url('/meeting-setup') }}" class="btn btn-primary" style="margin-top:5px">
                            Pengaturan Absensi
                        </a>
                    </li>

                    <li>
                        <strong>Absensi Masuk</strong><br>
                        Saat mulai mengajar, lakukan absen masuk.
                        Sistem akan mencatat waktu dan lokasi Anda secara otomatis.
                    </li>

                    <li>
                        <strong>Absensi Keluar</strong><br>
                        Setelah sesi selesai, lakukan absen keluar.
                        Durasi pertemuan akan dihitung otomatis oleh sistem.
                    </li>

                    <li>
                        <strong>Isi Laporan Harian</strong><br>
                        Lengkapi laporan pembelajaran sebagai catatan perkembangan siswa
                        dan dokumentasi kegiatan mengajar.
                        <br>
                        <a href="{{ url('/meeting-attendance') }}" class="btn btn-primary" style="margin-top:5px">
                            Mulai Absensi
                        </a>
                    </li>
                </ol>

                <p style="margin-top:20px; font-style:italic">
                    Pastikan absensi dilakukan tepat waktu dan lokasi aktif agar data tercatat dengan valid.
                </p>

            {{-- ================= DEFAULT ================= --}}
            @else
                <p class="tutor">
                    Selamat datang di sistem pembelajaran Zidnan Course.
                    Silakan gunakan menu yang tersedia sesuai dengan hak akses Anda.
                </p>
            @endif

        </div>
    </div>
</section>
@endsection
