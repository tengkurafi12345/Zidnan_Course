{{-- Ambil dari layout main  --}}
@extends('layouts.main')
{{-- Membuat title untuk judul halaman --}}
@section('title', 'Home')

{{-- Membuat Bagian untuk konten --}}
@section('content')
    <!-- Header -->
    <header>
        <img src="{{ asset('img/logo-menu-utama.png') }}" alt="" style="width: 200px" class="mb-4">
        <h1 class="mb-1 fredoka"> Solusi Bimbel Keluarga Nusantara!</h1>
        <h2 class="fredoka">Lebih dari </h2>
        <h1 class="fredoka" id="counter">0</h1>
        <p>Siswa TK - SMA dan UMUM</p>
        <h1 class="mb-1 fredoka"> Terdaftar di Bimbel Zidnan</h1>
        <p>Les Privat dan Bimbel Eksklusif.</p>
        <p>Santri weekend dan Perusahaan mengaji</p>
        <p>Dari guru terbaik untuk Indonesia lebih cerah</p>
        <p>Siap mendampingi anda belajar</p>
        <button type="button" onclick="redirectToWhatsApp()" class="btn btn-success px-5 py-3 fs-4 mt-2 mb-3"><i
                class="fab fa-whatsapp"></i> Daftar Sekarang</button>
        {{-- Perbaiki Gambarnya --}}
        <div class="container mt-5 text-center">
            <div class="col-8 mx-auto"> <!-- Membuat col-8 di tengah -->
                <div class="row g-1 justify-content-center"> <!-- Mengurangi jarak antar kolom -->
                    <div class="col-4 col-md-3 text-center">
                        <div class="circle-container">
                            <div class="circle" style="--circle-color: #ff0000;">
                                <i class="fas fa-child-reaching text-white"></i>
                            </div>
                            <h2 class="fw-normal fredoka">Fun Learning</h2>
                        </div>
                    </div>
                    <div class="col-4 col-md-3 text-center">
                        <div class="circle-container">
                            <div class="circle" style="--circle-color: #6a1b9a;">
                                <i class="fas fa-user-clock text-white"></i>
                            </div>
                            <h2 class="fw-normal fredoka">Flexible Timing</h2>
                        </div>
                    </div>
                    <div class="col-4 col-md-3 text-center">
                        <div class="circle-container">
                            <div class="circle" style="--circle-color: #198754;">
                                <i class="fas fa-file-contract text-white"></i>
                            </div>
                            <h2 class="fw-normal fredoka">Progress Report</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Section Alasan kenapa harus zidnan --}}
    <div class="container-fluid mt-5 py-5" id="hanging-icons">
        <div class="text-center">
            <p class="text-purple mb-2 border-bottom-purple border-2 d-inline-block p-2">Alasan</p>
            <h1 class="text-dark mb-4 fredoka">Kenapa Harus Zidnan</h1>
        </div>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col h-100 d-flex align-items-start">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-1" style="padding: 30px">
                    <i class="fas fa-file-pen font-weight-normal text-purple mb-3"
                        style="font-size: 2.5rem; padding-right:1rem"></i>
                    <div class="pl-4">
                        <h4>Legalitas</h4>
                        <p class="m-0">
                            Zidnan Group dibawah naungan Yayasan Zidni Ilmi Indonesia juga sudah terdaftar resmi di
                            Kemenkumham.
                            <br> SK KEMENKUMHAM AHU-0018141.AH.01.04.TAHUN 2024.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col h-100 d-flex align-items-start">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-1" style="padding: 30px">
                    <i class="fas fa-crown font-weight-normal text-purple mb-3"
                        style="font-size: 2.5rem; padding-right:1rem"></i>
                    <div class="pl-4">
                        <h4>Eksklusif</h4>
                        <p class="mb-5">
                            Siswa akan diajarkan langsung oleh guru atau by request, les privat datang ke rumah siswa les bimbel datang ke kantor utama zidnan group
                        </p>
                    </div>
                </div>
            </div>
            <div class="col h-100 d-flex align-items-start">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-1" style="padding: 30px">
                    <i class="fas fa-school-circle-check font-weight-normal text-purple mb-3"
                        style="font-size: 2.5rem; padding-right:1rem"></i>
                    <div class="pl-4">
                        <h4>Semua Jenjang / Kalangan</h4>
                        <p class="m-0">
                            Materi les mencakup materi akademik dan non akademik untuk semua jenjang Mulai TK, SD, SMP, SMA,
                        MAHASISWA DAN UMUM bahkan CORPORATE.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4 pb-5 row-cols-1 row-cols-lg-3 justify-content-center">
            <div class="col d-flex align-items-start">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-1" style="padding: 30px">
                    <i class="fas fa-graduation-cap font-weight-normal text-purple mb-3"
                        style="font-size: 2.5rem; padding-right:1rem"></i>
                    <div class="pl-4">
                        <h4>Seleksi Pengajar</h4>
                        <p class="mb-4">
                            Semua pengajar sudah melewati tahap sekelsi yang ketat sesuai dengan kompetensi yang dibutuhkan oleh
                        siswa.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-1" style="padding: 30px">
                    <i class="fas fa-user-check font-weight-normal text-purple mb-3"
                        style="font-size: 2.5rem; padding-right:1rem"></i>
                    <div class="pl-4">
                        <h4>500++ Member Aktif</h4>
                        <p class="m-0">
                            Zidnan Group sudah dipercaya lebih dari ratusan member aktif, berbagai macam karakter dan gaya
                        belajar member sudah pernah kami dampingi
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten Testimoni -->
    <section class="testimonial-section">
        <div class="text-center">
            <p class="text-purple mb-2 border-bottom-purple border-2 d-inline-block p-2">Testimoni</p>
            <h1 class="text-dark mb-4 fredoka">Yang Membuktikan Kualitas Kami</h1>
        </div>
        <div class="container mt-4">
            <div class="row g-3"> <!-- Mengurangi jarak antar card -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100">
                        <img src="{{ asset('img/testimonial/testi-1.jpg') }}" alt=""
                            class="card-img">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100">
                        <img src="{{ asset('img/testimonial/testi-2.jpg') }}" alt=""
                            class="card-img">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100">
                        <img src="{{ asset('img/testimonial/testi-3.jpg') }}" alt=""
                            class="card-img">
                    </div>
                </div>
            </div>
    </section>

    <!-- Paket Private -->
    <div class="container-fluid mt-5 py-5">
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <img class="img-fluid w-75 bg-purple p-1" src="https://themewagon.github.io/kider/img/about-2.jpg"
                            alt="">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-8" style="margin-top: -160px;">
                        <img class="img-fluid w-100 bg-purple p-1"
                            src="https://themewagon.github.io/kider/img/about-3.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-7 ">
                <div class="text-start">
                    <p class="text-purple mb-2 border-bottom-purple border-2 d-inline-block p-2">Les Private</p>
                    <h1 class="text-dark mb-4 fredoka">Belajar Interaktif dan Kreatif untuk Usia 2-6 Tahun</h1>
                    <p class="pb-2">Program Private ini dirancang untuk mengenalkan konsep dasar dengan cara yang
                        menyenangkan dan interaktif. Anak-anak akan belajar melalui permainan edukatif, cerita, dan kegiatan
                        kreatif yang merangsang minat belajar mereka</p>
                    <div class="row">
                        <div class="col-5 pe-0">
                            <img src="{{ asset('img/brand/privat.png') }}" alt=""
                                class="w-75 rounded-circle bg-purple p-1">
                        </div>
                        <div class="col-7 ps-0">
                            <ul class="list-inline">
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Ada Lesson Plan dan Modul
                                </li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Permainan Edukatif</li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Aktivitas Belajar
                                    Menyenangkan</li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Belajar Sambil Bermain</li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Stimulasi Minat Belajar</li>
                            </ul>
                        </div>
                    </div>
                    <a href="/kursus" class="btn btn-violet rounded-1 mt-1 mb-4">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Konten daftar paket privat -->
    <div class="testimonial-section " id="home">
        <p class="text-purple mb-2 border-bottom-purple border-2 d-inline-block p-2">Paket Les Private</p>
        <h1 class="text-dark mb-4 fredoka">Pilih paket yang paling favorit.</h1>

        <!-- Daftar Paket private -->
        <div class="course-container mt-5">
            <div class="container text-center">
                @php
                    $jumlahData = count($privateLessons);
                    $cols = 'row-cols-1 row-cols-md-2 ';

                    if ($jumlahData == 4) {
                        $cols .= 'row-cols-lg-4';
                    } elseif ($jumlahData == 3) {
                        $cols .= 'row-cols-lg-3';
                    } elseif ($jumlahData == 2) {
                        $cols .= 'row-cols-lg-2';
                    } else {
                        $cols .= 'row-cols-lg-1';
                    }
                @endphp

                <div class="row {{ $cols }} g-2 g-lg-5 align-items-stretch">
                    @foreach($privateLessons as $private)
                        <div class="col">
                            <div class="card h-100 d-flex flex-column border-0">
                                <div class="card-body border-purple rounded d-flex flex-column mt-5">
                                    <div class="p-2 flex-grow-1">
                                        <h2>{{ $private->program->name }}</h2>
                                        <p class="mb-4 text-success">{{ $private->packet->class_level }}</p>
                                        <p class="fw-bold mb-1">Mulai</p>
                                        <h2 class="my-2">{{ "Rp." . number_format($private->price, 0, ',', '.') }}</h2>
                                        <p>Per Jam</p>
                                        <hr>
                                        <button type="button" onclick="redirectToWhatsApp()"
                                                class="btn btn-purple rounded-1 mt-5"><i class="fab fa-whatsapp"></i>
                                            Daftar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="/kursus" class="btn btn-purple rounded-1 mt-5">Lihat Seluruh Paket</a>
            </div>
        </div>
    </div>

    <!-- Paket Bimbel -->
    <div class="container-fluid py-5 mt-5">
        <div class="row">
            <div class="col-md-7 ">
                <div class="text-start">
                    <p class="text-purple mb-2 border-bottom-purple border-2 d-inline-block p-2">Les Bimbel</p>
                    <h1 class="text-dark mb-4 fredoka">Belajar Interaktif dan Kreatif untuk Usia 2-6 Tahun</h1>
                    <p class="pb-2">Program TK ini dirancang untuk mengenalkan konsep dasar dengan cara yang menyenangkan
                        dan interaktif. Anak-anak akan belajar melalui permainan edukatif, cerita, dan kegiatan kreatif yang
                        merangsang minat belajar mereka</p>
                    <div class="row">
                        <div class="col-5 pe-0">
                            <img src="{{ asset('img/brand/bimbel.png') }}" alt=""
                                class="w-75 rounded-circle bg-purple p-1">
                        </div>
                        <div class="col-7 ps-0">
                            <ul class="list-inline">
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Ada Lesson Plan dan Modul
                                </li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Permainan Edukatif</li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Aktivitas Belajar
                                    Menyenangkan</li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Belajar Sambil Bermain</li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Stimulasi Minat Belajar</li>
                            </ul>
                        </div>
                    </div>
                    <a href="/kursus" class="btn btn-violet rounded-1 mt-1 mb-4">Daftar Sekarang</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <img class="img-fluid w-75 bg-purple p-1" src="https://themewagon.github.io/kider/img/about-2.jpg"
                            alt="">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-8" style="margin-top: -160px;">
                        <img class="img-fluid w-100 bg-purple p-1"
                            src="https://themewagon.github.io/kider/img/about-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Konten daftar paket bimbel -->
    <div class="testimonial-section" id="home">
        <p class="text-purple mb-2 border-bottom-purple border-2 d-inline-block p-2">Paket Les Bimbel</p>
        <h1 class="text-dark mb-4 fredoka">Pilih paket yang paling favorit.</h1>
        <div class="course-container mt-5">
            <div class="container text-center">
                @php
                    $jumlahData = count($bimbelLessons);
                    $cols = 'row-cols-1 row-cols-md-2 ';

                    if ($jumlahData == 4) {
                        $cols .= 'row-cols-lg-4';
                    } elseif ($jumlahData == 3) {
                        $cols .= 'row-cols-lg-3';
                    } elseif ($jumlahData == 2) {
                        $cols .= 'row-cols-lg-2';
                    } else {
                        $cols .= 'row-cols-lg-1';
                    }
                @endphp

                <div class="row {{ $cols }} g-2 g-lg-5 align-items-stretch">
                    @foreach($bimbelLessons as $bimbel)
                        <div class="col">
                            <div class="card h-100 d-flex flex-column border-0">
                                <div class="card-body border-purple rounded d-flex flex-column mt-5">
                                    <div class="p-2 flex-grow-1">
                                        <h2>{{ $bimbel->program->name }}</h2>
                                        <p class="mb-4 text-success">{{ $bimbel->packet->class_level }}</p>
                                        <p class="fw-bold mb-1">Mulai</p>
                                        <h2 class="my-2">{{ "Rp." . number_format($bimbel->price, 0, ',', '.') }}</h2>
                                        <p>Per Jam</p>                                        <hr>
                                        <button type="button" onclick="redirectToWhatsApp()"
                                                class="btn btn-purple rounded-1 mt-5"><i class="fab fa-whatsapp"></i>
                                            Daftar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="/kursus" class="btn btn-purple rounded-1 mt-5">Lihat Seluruh Paket</a>
            </div>
        </div>
    </div>

    <!-- Paket Santri Weekend -->
    <div class="container-fluid mt-5 py-5">
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <img class="img-fluid w-75 bg-purple p-1" src="https://themewagon.github.io/kider/img/about-2.jpg"
                            alt="">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-8" style="margin-top: -160px;">
                        <img class="img-fluid w-100 bg-purple p-1"
                            src="https://themewagon.github.io/kider/img/about-3.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-7 ">
                <div class="text-start mt-5">
                    <p class="text-purple mb-2 mt-sm-4 border-bottom-purple border-2 d-inline-block p-2">Santri Weekend</p>
                    <h1 class="text-dark mb-4 fredoka">Belajar Interaktif dan Kreatif untuk Usia 2-6 Tahun</h1>
                    <p class="pb-2">Program Private ini dirancang untuk mengenalkan konsep dasar dengan cara yang
                        menyenangkan dan interaktif. Anak-anak akan belajar melalui permainan edukatif, cerita, dan kegiatan
                        kreatif yang merangsang minat belajar mereka</p>
                    <div class="row">
                        <div class="col-5 pe-0">
                            <img src="{{ asset('img/brand/santri-weekend.png') }}" alt=""
                                class="w-75 rounded-circle bg-purple p-1">
                        </div>
                        <div class="col-7 ps-0">
                            <ul class="list-inline">
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Ada Lesson Plan dan Modul
                                </li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Permainan Edukatif</li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Aktivitas Belajar
                                    Menyenangkan</li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Belajar Sambil Bermain</li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Stimulasi Minat Belajar</li>
                            </ul>
                        </div>
                    </div>
                    <a href="/kursus" class="btn btn-violet rounded-1 mt-1 mb-4">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Konten daftar paket santri weekend -->
    <div class="testimonial-section " id="home">
        <p class="text-purple mb-2 border-bottom-purple border-2 d-inline-block p-2">Paket Santri Weekend</p>
        <h1 class="text-dark mb-4 fredoka">Pilih paket yang paling favorit.</h1>
        <!-- Daftar Paket Bimbel -->
        <div class="course-container mt-5">
            <div class="container text-center">
                @php
                    $jumlahData = count($santriWeekend);
                    $cols = 'row-cols-1 row-cols-md-2 ';

                    if ($jumlahData == 4) {
                        $cols .= 'row-cols-lg-4';
                    } elseif ($jumlahData == 3) {
                        $cols .= 'row-cols-lg-3';
                    } elseif ($jumlahData == 2) {
                        $cols .= 'row-cols-lg-2';
                    } else {
                        $cols .= 'row-cols-lg-1';
                    }
                @endphp

                <div class="row {{ $cols }} g-2 g-lg-5 align-items-stretch">
                    @foreach($santriWeekend as $santri)
                        <div class="col">
                            <div class="card h-100 d-flex flex-column border-0">
                                <div class="card-body border-purple rounded d-flex flex-column mt-5">
                                    <div class="p-2 flex-grow-1">
                                        <h2>{{ $santri->program->name }}</h2>
                                        <p class="mb-4 text-success">{{ $santri->packet->class_level }}</p>
                                        <p class="fw-bold mb-1">Mulai</p>
                                        <h2 class="my-2">{{ "Rp." . number_format($santri->price, 0, ',', '.') }}</h2>
                                        <p>Per Jam</p>
                                        <hr>
                                        <button type="button" onclick="redirectToWhatsApp()"
                                                class="btn btn-purple rounded-1 mt-5"><i class="fab fa-whatsapp"></i>
                                            Daftar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="/kursus" class="btn btn-purple rounded-1 mt-5">Lihat Seluruh Paket</a>
            </div>
        </div>
    </div>

    <!-- Paket Perusahaan Mengaji -->
    <div class="container-fluid mt-5 py-5">
        <div class="row">
            <div class="col-md-7 ">
                <div class="text-start">
                    <p class="text-purple mb-2 border-bottom-purple border-2 d-inline-block p-2">Perusahaan Mengaji</p>
                    <h1 class="text-dark mb-4 fredoka">Belajar Interaktif dan Kreatif untuk Usia 2-6 Tahun</h1>
                    <p class="pb-2">Program TK ini dirancang untuk mengenalkan konsep dasar dengan cara yang menyenangkan
                        dan interaktif. Anak-anak akan belajar melalui permainan edukatif, cerita, dan kegiatan kreatif yang
                        merangsang minat belajar mereka</p>
                    <div class="row">
                        <div class="col-5 pe-0">
                            <img src="{{ asset('img/brand/perusahaan-mengaji.png') }}" alt=""
                                class="w-75 rounded-circle bg-purple p-1">
                        </div>
                        <div class="col-7 ps-0">
                            <ul class="list-inline">
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Ada Lesson Plan dan Modul
                                </li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Permainan Edukatif</li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Aktivitas Belajar
                                    Menyenangkan</li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Belajar Sambil Bermain</li>
                                <li class="py-2 border-top border-bottom"><i
                                        class="fa-solid fa-check-double me-2 text-purple"></i> Stimulasi Minat Belajar</li>
                            </ul>
                        </div>
                    </div>
                    <a href="/kursus" class="btn btn-violet rounded-1 mt-1 mb-4">Daftar Sekarang</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <img class="img-fluid w-75 bg-purple p-1" src="https://themewagon.github.io/kider/img/about-2.jpg"
                            alt="">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-8" style="margin-top: -160px;">
                        <img class="img-fluid w-100 bg-purple p-1"
                            src="https://themewagon.github.io/kider/img/about-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Konten daftar paket bimbel -->
    <div class="testimonial-section " id="home">
        <p class="text-purple mb-2 border-bottom-purple border-2 d-inline-block p-2">Paket Perusahaan Mengaji</p>
        <h1 class="text-dark mb-4 fredoka">Pilih paket yang paling favorit.</h1>
        <div class="course-container mt-5">
            <div class="container text-center mx-lg-5">
                @php
                    $jumlahData = count($corporateQuran);
                    $cols = 'row-cols-1 row-cols-md-2 ';

                    if ($jumlahData == 4) {
                        $cols .= 'row-cols-lg-4';
                    } elseif ($jumlahData == 3) {
                        $cols .= 'row-cols-lg-3';
                    } elseif ($jumlahData == 2) {
                        $cols .= 'row-cols-lg-2';
                    } else {
                        $cols .= 'row-cols-lg-1';
                    }
                @endphp

                <div class="row {{ $cols }} g-2 g-lg-5 align-items-stretch">
                    @foreach($corporateQuran as $corporate)
                        <div class="col mt-md-5">
                            <div class="card border-purple-favorite favorite-card d-flex flex-column mt-md-0 mt-sm-5">
                                <div class="card-header bg-purple">
                                    <p>Paket Terfavorit</p>
                                </div>
                                <div class="card-body border-purple rounded d-flex flex-column mt-5">
                                    <div class="p-2 flex-grow-1">
                                        <h2>{{ $corporate->program->name }}</h2>
                                        <p class="mb-4 text-success">{{ $corporate->packet->class_level }}</p>
                                        <p class="fw-bold mb-1">Mulai</p>
                                        <h2 class="my-2">{{ "Rp." . number_format($corporate->price, 0, ',', '.') }}</h2>
                                        <p>Per Jam</p>
                                        <hr>
                                        <button type="button" onclick="redirectToWhatsApp()"
                                                class="btn btn-purple rounded-1 mt-5"><i class="fab fa-whatsapp"></i>
                                            Daftar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="/kursus" class="btn btn-purple rounded-1 mt-5">Lihat Seluruh Paket</a>
            </div>
        </div>
    </div>

    <div class="map-container">
        <div class="text-center">
            <p class="text-purple mb-2 border-bottom-purple border-2 d-inline-block p-2">Lokasi Kami</p>
            <h1 class="text-dark mb-4 fredoka">Temukan Kami Segera</h1>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.022233119031!2d112.68333367381861!3d-7.57255459244165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7df62835bffa1%3A0x16129116217ffc6d!2sZidnan%20(Bimbel%20%26%20Course)!5e0!3m2!1sen!2sid!4v1739207515847!5m2!1sen!2sid"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </div>

    <section class="testimonial-section mb-0" style="display: none">
        <p>
            'les private bahasa inggris''
            'guru les private''
            'les privat matematika''
            'les calistung''
            'jasa les privat''
            'kursus private''
            'les private matematika''
        </p>
    </section>
@endsection
