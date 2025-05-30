@extends('layouts.main')

@section('title', 'Halaman Detail Lowongan')

@section('content')
    <header>
        <h1>Halaman Detail Lowongan</h1>
    </header>

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s"
         style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <div class="container">
            <!-- Flash Notification -->
            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                    <span class="closebtn">&times;</span>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger mb-4">
                    {{ session('error') }}
                    <span class="closebtn">&times;</span>
                </div>
            @endif

            <!-- Flash Notification -->
            {{-- Menampilkan semua error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    Terjadi Error Dalam Mengisi Formulir
                    <span class="closebtn">&times;</span>
                </div>
            @endif
            <div class="mb-5">
                <a href="{{ route('lowongan') }}" class="btn btn-purple rounded-1"><i class="fa fa-reply-all"></i> Back</a>
            </div>
            <div class="row gy-5 gx-4">

                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('img/logo-menu-utama.png') }}" alt=""
                             style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3 fw-bold">{{ $jobVacancy->title }}</h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>{{ $jobVacancy->location }}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>{{ $jobVacancy->job_type }}</span>
                            <span class="text-truncate me-3"><i class="fa fa-briefcase text-purple me-2"></i>{{ $jobVacancy->work_policy }}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i> Rp {{ number_format($jobVacancy->salary_min, 0, ',', '.') }} - Rp {{ number_format($jobVacancy->salary_max, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3 fw-bold">Deskripsi</h4>
                        <p>{{ $jobVacancy->job_description }}</p>
                        <h4 class="my-3 fw-bold">Tanggung Jawab Pekerjaan:</h4>
                        @foreach($jobVacancy->responsibilities as $responsibility)
                            <p>{{ $responsibility->description }}</p>
                            <ul class="list-unstyled mt-2">
                                @foreach(json_decode($responsibility->items, false, 512, JSON_THROW_ON_ERROR) as $item)
                                    <li><i class="fa fa-angle-right text-purple me-2"></i>{{ $item }}</li>
                                @endforeach
                            </ul>
                        @endforeach

                        <h4 class="mb-3 fw-bold">Kualifikasi </h4>
                        @foreach($jobVacancy->qualifications as $qualification)
                            <p>{{ $qualification->description }}</p>
                            <ul class="list-unstyled mt-2">
                                @foreach(json_decode($qualification->items, false, 512, JSON_THROW_ON_ERROR) as $item)
                                    <li><i class="fa fa-angle-right text-purple me-2"></i>{{ $item }}</li>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>

                    <div class="">
                        <h4 class="mb-4 fw-bold">Lamar Pekerjaan Ini</h4>

                        <form action="{{ route('lowongan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <input type="hidden" class="form-control" name="job_vacancy_id" value="{{ $jobVacancy->id }}">
                                <div class="col-12 col-sm-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Your Name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>No Whatsapp</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Your Number Whatsapp">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label>Alamat Domisili</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Your Address">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label>Upload CV / Resume</label>
                                    <input type="file" class="form-control bg-white @error('resume_file') is-invalid @enderror" name="resume_file" placeholder="upload your CV">
                                    @error('resume_file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label>Cover Letter</label>
                                    <textarea class="form-control @error('cover_letter') is-invalid @enderror" rows="5" name="cover_letter" placeholder="Coverletter"></textarea>
                                    @error('cover_letter')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-purple rounded-1 w-100" type="submit">Lamar Sekarang</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="col-lg-4">
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
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s"
                         style="visibility: visible; animation-delay: 0.1s; animation-name: slideInUp;">
                        <h4 class="mb-4 fw-bold">Ringkasan Pekerjaan</h4>
                        <p><i class="fa fa-angle-right text-purple me-2"></i><span class="text-purple">Dipublikasikan Pada:</span> {{ \Carbon\Carbon::parse($jobVacancy->published_at)->format('d M, Y') }}
                        </p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i><span
                                class="text-purple">Lowongan:</span> {{ $jobVacancy->title }}</p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i><span
                                class="text-purple">Kategori:</span> {{ $jobVacancy->category }}</p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i><span
                                class="text-purple">Gaji:</span> {{ formatSalary($jobVacancy->salary_min, $jobVacancy->salary_max) }}
                        </p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i><span
                                class="text-purple">Lokasi:</span> {{ $jobVacancy->location }}</p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i><span
                                class="text-purple">Tenggat Waktu:</span> {{ \Carbon\Carbon::parse($jobVacancy->date_line)->format('d M, Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
