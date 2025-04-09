@extends('layouts.app')

@section('title', 'Daftar Pelamar')

@section('content')
    <section class="courses">
        <div class="flex-container">
            <div class="">
                <h1 class="heading">Daftar Pelamar</h1>
            </div>
        </div>

        <!-- Flash Notification -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <span class="closebtn">&times;</span>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
                <span class="closebtn">&times;</span>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelamar</th>
                        <th>Email</th>
                        <th>No Whatsapp</th>
                        <th>Lowongan</th>
                        <th>Surat Lamaran</th>
                        <th>File Lamaran</th>
                        <th>Status</th>
                        <th>Melamar Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobApplication as $job)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $job->jobApplicant->name }}</td>
                            <td>{{ $job->jobApplicant->email }}</td>
                            <td>{{ $job->jobApplicant->phone }}</td>
                            <td>{{ $job->jobVacancy->title }} - {{ $job->jobVacancy->category }}</td>
                            <td>{{ \Illuminate\Support\Str::words($job->cover_letter, 5, '...') }}</td>
                            <td>{{ $job->resume_file ?? "-" }}</td>
                            <td>
                                @switch($job->status)
                                    @case('pending')
                                        <span class="badge text-bg-secondary">Pending</span>
                                        @break

                                    @case('reviewed')
                                        <span class="badge text-bg-info">Sedang Direview</span>
                                        @break

                                    @default
                                        <span class="badge text-bg-danger">Gagal</span>
                                @endswitch
                            </td>
                            <td>{{ \Carbon\Carbon::parse($job->applied_at)->format('d M, Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('job.application.edit', $job->id) }}"
                                        class="btn btn-sm btn-warning" >Edit</a>
                                    <form action="{{ route('job.application.destroy', $job->id) }}" method="POST"
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
                            <td colspan="10" class="text-center">No Packet available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Menambahkan pagination -->
            <div class="d-flex justify-content-center">
                {{ $jobApplication->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection
