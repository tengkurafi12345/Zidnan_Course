@extends('layouts.app')

@section('title', 'Daftar Lowongan')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <section class="courses">
        <div class="flex-container">
            <div class="">
                <h1 class="heading">Daftar Lowongan</h1>
            </div>
            <div class="">
                <a href="{{ route('job.vacancy.create') }}" class="btn btn-violet">Tambah Lowongan</a>
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
                        <th>Nama Lowongan</th>
                        <th>Kategori</th>
                        <th>Tipe Pekerjaan</th>
                        <th>Penempatan Kerja</th>
                        <th style="width:100px">Gaji</th>
                        <th>Deskripsi</th>
                        <th>Tenggat Waktu</th>
                        <th>Diterbitkan Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
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
                    @forelse($jobVacancies as $job)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->category }}</td>
                            <td>{{ $job->job_type }}</td>
                            <td>{{ $job->work_policy }}</td>
                            <td>{{ formatSalary($job->salary_min, $job->salary_max) }}</td>
                            <td>{{ \Illuminate\Support\Str::words($job->job_description, 5, '...') }}</td>
                            <td>{{ \Carbon\Carbon::parse($job->date_line)->format('d M, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($job->published_at)->format('d M, Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('job.vacancy.edit', $job->id) }}"
                                        class="btn btn-sm btn-warning" >Edit</a>
                                    <form action="{{ route('job.vacancy.destroy', $job->id) }}" method="POST"
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
        </div>
    </section>
@endsection
