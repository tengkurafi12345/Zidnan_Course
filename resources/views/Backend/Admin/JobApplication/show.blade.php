@extends('layouts.app')

@section('title', 'Detail Pelamar')

@section('content')
    <div class="container-sm my-4">
        <div class="card shadow-lg border-0 rounded-3 p-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Detail Data Pelamar</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $jobApplication->jobApplicant->name }}</h5>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Email:</strong> {{ $jobApplication->jobApplicant->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>No Whatsapp:</strong> {{ $jobApplication->jobApplicant->phone }}</p>
                    </div>
                </div>

                <p><strong>Lowongan:</strong>
                    {{ $jobApplication->jobVacancy->title }}
                    - <span class="badge bg-info">{{ $jobApplication->jobVacancy->category }}</span>
                </p>

                <p><strong>Surat Lamaran:</strong></p>
                <div class="alert alert-secondary p-2">
                    {{ $jobApplication->cover_letter ?? '-' }}
                </div>

                <p><strong>File Lamaran:</strong>
                    @if($jobApplication->resume_file)
                        <a href="{{ asset('storage/resumes/' . $jobApplication->resume_file) }}"
                           class="btn btn-outline-primary btn-sm" target="_blank">
                            <i class="bi bi-file-earmark-text"></i> Lihat File
                        </a>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </p>

                <p><strong>Status:</strong>
                    @switch($jobApplication->status)
                        @case('pending')
                            <span class="badge bg-secondary">Pending</span>
                            @break
                        @case('reviewed')
                            <span class="badge bg-info">Sedang Direview</span>
                            @break
                        @case('interviewed')
                            <span class="badge bg-primary">Sudah Interview</span>
                            @break
                        @case('accepted')
                            <span class="badge bg-success">Diterima</span>
                            @break
                        @case('rejected')
                            <span class="badge bg-danger">Ditolak</span>
                            @break
                        @default
                            <span class="badge bg-dark">Unknown</span>
                    @endswitch
                </p>

                <p><strong>Melamar Pada:</strong> {{ $jobApplication->created_at->format('d M Y, H:i') }}</p>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('job.application.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
