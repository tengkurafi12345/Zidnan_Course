@extends('layouts.main')

@section('title', 'Halaman Lowongan')

@section('content')
    <header>
        <h1>Halaman Lowongan</h1>
    </header>

    <section class="testimonial-section">
        <h2 class="fw-bold">Daftar Lowongan</h2>
        @if($jobVacancies->isEmpty())
            <div class="alert alert-warning" role="alert">
                <strong>Data Kosong!</strong> Saat ini tidak ada lowongan kerja yang tersedia.
            </div>
        @else
            <div class="row">
                @foreach($jobVacancies as $job)
                    <div class="mb-4">
                        <div class="job-item p-4 border rounded">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-10 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('img/logo-menu-utama.png') }}" alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3"><a class="text-dark text-decoration-none" href="{{ route('lowongan.detail', $job->id) }}">{{ $job->title }}</a></h5>
                                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>{{ $job->location }}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>{{ $job->job_type }}</span>
                                        <span class="text-truncate me-3"><i class="fa fa-briefcase text-purple me-2"></i>{{ $job->work_policy }}</span>
                                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i> Rp {{ number_format($job->salary_min, 0, ',', '.') }} - Rp {{ number_format($job->salary_max, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-purple" href="{{ route('lowongan.detail', $job->id) }}">Apply Now</a>
                                    </div>
                                    <div class="text-start">
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Published At: {{ \Carbon\Carbon::parse($job->published_at)->format('d M, Y') }}</small><br>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: {{ \Carbon\Carbon::parse($job->date_line)->format('d M, Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Menambahkan pagination -->
        <div class="d-flex justify-content-center">
            {{ $jobVacancies->links('vendor.pagination.bootstrap-5') }}
        </div>
    </section>
@endsection
