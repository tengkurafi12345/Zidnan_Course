{{-- Ambil dari layout main  --}}
@extends('layouts.main')
{{-- Membuat title untuk judul halaman --}}
@section('title', 'Home')

{{-- Membuat Bagian untuk konten --}}
@section('content')
    <!-- Header -->
    <header>
        <h1 class="mb-5">🎓 Zidnan: Solusi Terbaik untuk Belajar Privat!</h1>
        <p>🚀 Mulai perjalanan belajarmu sekarang! </p>
        <p class="mb-3">📲 Klik tombol di bawah untuk chat langsung dengan kami!</p>
        <button type="button" onclick="redirectToWhatsApp()" class="btn btn-success px-5 py-3 fs-4"><i
                class="fab fa-whatsapp"></i> Gabung Sekarang</button>
        <p class="mt-1">💸 Dapatkan harga mulai dari Rp.135.000</p>


        <div class="container-fluid mt-5">
            <div class="row g-1"> <!-- Mengurangi jarak antar kolom -->
                <div class="col-sm-4 text-center">
                    <svg class="bd-placeholder-img rounded-circle" width="80" height="80"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    </svg>
                    <h2 class="fw-normal">Heading</h2>
                </div>
                <div class="col-sm-4 text-center">
                    <svg class="bd-placeholder-img rounded-circle" width="80" height="80"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    </svg>
                    <h2 class="fw-normal">Heading</h2>
                </div>
                <div class="col-sm-4 text-center">
                    <svg class="bd-placeholder-img rounded-circle" width="80" height="80"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    </svg>
                    <h2 class="fw-normal">Heading</h2>
                </div>
            </div>
        </div>
    </header>

    {{-- Section Alasan kenapa harus zidnan --}}
    <div class="container px-4 py-5" id="hanging-icons">
        <div class="text-center">
            <p class="pb-2">Alasan</p>
            <h2 class="pb-2 fw-bold">Kenapa Harus Zidnan</h2>
        </div>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col d-flex align-items-start">
                <div
                    class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#toggles2"></use>
                    </svg>
                </div>
                <div>
                    <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence
                        and probably just keep going until we run out of words.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div
                    class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#cpu-fill"></use>
                    </svg>
                </div>
                <div>
                    <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence
                        and probably just keep going until we run out of words.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div
                    class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#tools"></use>
                    </svg>
                </div>
                <div>
                    <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence
                        and probably just keep going until we run out of words.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten Alasan -->
    <section class="testimonial-section">
        <div class="text-center">
            <p class="pb-2">Alasan</p>
            <h2 class="pb-2 fw-bold">Kenapa Harus Zidnan</h2>
        </div>
        <div class="container mt-4">
            <div class="row g-3"> <!-- Mengurangi jarak antar card -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100"> <!-- Tinggi rata semua card -->
                        <div class="card-body">
                            <h5 class="card-title">Card 1</h5>
                            <p class="card-text">Isi kosong atau sesuaikan nanti.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Card 2</h5>
                            <p class="card-text">Isi kosong atau sesuaikan nanti.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Card 3</h5>
                            <p class="card-text">Isi kosong atau sesuaikan nanti.</p>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    {{-- Paket Private --}}
    <div class="container mt-5 px-4 py-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                   <div class="card-body">
                        <p>Foto</p>
                   </div>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="text-start">
                    <p class="pb-2">Alasan</p>
                    <h2 class="pb-2 fw-bold">Kenapa Harus Zidnan</h2>
                    <p class="pb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. A itaque, alias reprehenderit magni, et eius sit voluptatem explicabo libero odio, quasi facere. Ratione cum non eveniet natus quis incidunt, voluptatem, aliquid laboriosam rerum aliquam harum. Necessitatibus, sed ex ullam iure vel accusantium aspernatur commodi deserunt cupiditate architecto</p>
                    <ul >
                        <li>An item</li>
                        <li>A second item</li>
                        <li>A third item</li>
                        <li>A fourth item</li>
                        <li>And a fifth one</li>
                      </ul>
                </div>
            </div>
        </div>
    </div>



    <!-- Konten Utama -->
    <div class="testimonial-section " id="home">
        <h1>Paket Bimbel Kami</h1>
        <p>Pilih paket bimbel yang sesuai dan klik daftar untuk memulai proses pendaftaran.</p>

        <!-- Daftar Paket Bimbel -->
        <div class="course-container mt-5">
            <div class="container text-center">
                <div class="row row-cols-1 row-cols-lg-4 g-2 g-lg-5">
                    <div class="col">
                        <div class="card border-purple h-100 d-flex flex-column">
                            <div class="card-body d-flex flex-column p-0">
                                <img src="{{ asset('img/brand/bimbel.png') }}" alt="Paket Matematika Dasar"
                                    class="border fixed-image">
                                <div class="p-3 flex-grow-1">
                                    <h2 class="my-3">Bimbel Zidnan</h2>
                                    <p>Untuk siswa TK - SMA</p>
                                    <p>Start From: Rp.135,000/8x</p>
                                </div>
                                <div class="d-grid gap-2 mt-2">
                                    <button type="button" onclick="redirectToWhatsApp()"
                                        class="btn btn-purple rounded-bottom-1"><i class="fab fa-whatsapp"></i>
                                        Daftar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-purple h-100 d-flex flex-column">
                            <div class="card-body d-flex flex-column p-0">
                                <img src="{{ asset('img/brand/privat.png') }}" alt="Paket Fisika SMA"
                                    class="border fixed-image">
                                <div class="p-3 flex-grow-1">
                                    <h2 class="my-3">Zidnan Course</h2>
                                    <p>Untuk siswa TK - SMA</p>
                                    <p>Start From: Rp.225,000/8x</p>
                                </div>
                                <div class="d-grid gap-2 mt-2">
                                    <button type="button" onclick="redirectToWhatsApp()"
                                        class="btn btn-purple rounded-bottom-1"><i class="fab fa-whatsapp"></i>
                                        Daftar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-purple h-100 d-flex flex-column">
                            <div class="card-body d-flex flex-column p-0">
                                <img src="{{ asset('img/brand/perusahan-mengaji.png') }}" alt="Paket Fisika SMA"
                                    class="border fixed-image">
                                <div class="p-3 flex-grow-1">
                                    <h2 class="my-3">Perusahaan Mengaji</h2>
                                    <p>Untuk umur 19 keatas</p>
                                    <p>Start From: Rp.320,000/8x</p>
                                </div>
                                <div class="d-grid gap-2 mt-2">
                                    <button type="button" onclick="redirectToWhatsApp()"
                                        class="btn btn-purple rounded-bottom-1"><i class="fab fa-whatsapp"></i>
                                        Daftar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-purple h-100 d-flex flex-column">
                            <div class="card-body d-flex flex-column p-0">
                                <img src="{{ asset('img/brand/santri-weekend.png') }}" alt="Paket Fisika SMA"
                                    class="border fixed-image">
                                <div class="p-3 flex-grow-1">
                                    <h2 class="my-3">Santri Weekend</h2>
                                    <p>Untuk Umum</p>
                                    <p>Start From: Rp.100,000/8x</p>
                                </div>
                                <div class="d-grid gap-2 mt-2">
                                    <button type="button" onclick="redirectToWhatsApp()"
                                        class="btn btn-purple rounded-bottom-1"><i class="fab fa-whatsapp"></i>
                                        Daftar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Konten Siswa -->
    {{-- TODO: Berisikan Konten Siswa Berprestasi --}}
    <section class="testimonial-section">
        <h2>Daftar Siswa</h2>
        <div class="testimonial-container">
            @foreach ($students as $student)
                <div class="testimonial-item">
                    <img src="{{ asset('img/siswa-2.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                    <div class="container" style="text-align: left">
                        <h4><b>{{ $student->name }}</b></h4>
                        <p>Kelas: {{ $student->class_status }} </p>
                        @if ($student->gender === App\Enums\Gender::MALE)
                            <p>Jenis Kelamin : Laki-laki</p>
                        @else
                            <p>Jenis Kelamin : Perempuan</p>
                        @endif
                        <p>Sekolah : {{ $student->school_name }}</p>
                        <p>Alamat : {{ $student->address }}</p>
                        <p>Prestasi:</p>
                        <ul>
                            <li></li>
                        </ul>
                        <br>
                    </div>
                </div>
            @endforeach

            {{-- <div class="testimonial-item">
                <img src="{{ asset('img/siswa-2.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <div class="container" style="text-align: left">
                    <h4><b>Nama: Siswa 1</b></h4>
                    <p>No Telpon: 082934928432843</p>
                    <p>Email: test1@gmail.com</p>
                    <p>Kelas: VII </p>
                    <p>Jenis Kelamin: Laki-laki</p>
                    <br>
                </div>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('img/siswa-3.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <div class="container" style="text-align: left">
                    <h4><b>Nama: Siswa 1</b></h4>
                    <p>No Telpon: 082934928432843</p>
                    <p>Email: test1@gmail.com</p>
                    <p>Kelas: VII </p>
                    <p>Jenis Kelamin: Laki-laki</p>
                    <br>
                </div>
            </div> --}}
        </div>
    </section>

    <!-- Konten Instruktur -->
    <section class="testimonial-section">
        <h2>Daftar Pengajar</h2>
        <div class="testimonial-container">
            <div class="testimonial-item">
                <img src="{{ asset('img/guru1.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <h3>Dr. Greg Harvey</h3>
                <h4>Pendidikan Terakhir</h4>
                <p>Usia</p>
                <p>Mulai Bergabung</p>
                <p>Alamat</p>
                <p>Spesialis</p>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('img/guru2.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <h3>Justina Corwin DDS</h3>
                <h4>Pendidikan Terakhir</h4>
                <p>Usia</p>
                <p>Mulai Bergabung</p>
                <p>Alamat</p>
                <p>Spesialis</p>
            </div>
            <div class="testimonial-item">
                <img src="{{ asset('img/guru3.jpg') }}" alt="Foto Instruktur" class="testimonial-img">
                <h3>Lilyan Buckridge</h3>
                <h4>Pendidikan Terakhir</h4>
                <p>Usia</p>
                <p>Mulai Bergabung</p>
                <p>Alamat</p>
                <p>Spesialis</p>
            </div>
        </div>
    </section>




    <div class="map-container">
        <h3>Lokasi Kami</h3>
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
