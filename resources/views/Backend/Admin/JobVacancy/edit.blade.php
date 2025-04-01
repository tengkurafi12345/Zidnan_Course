@extends('layouts.app')

@section('title', 'Edit Lowongan')
@section('css')
    <style>
        /* Styling untuk alert */
        .alert {
            padding: 20px;
            background-color: #c81313;
            /* Warna merah untuk error */
            color: white;
            margin-bottom: 20px;
            /* Memberikan ruang di bawah alert */
            border-radius: 5px;
            position: relative;
            width: 100%;
            /* Agar alert mengisi lebar */
        }

        .alert ul {
            list-style: none;
            padding-left: 0;
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
    </style>
@endsection

@section('content')
    <section class="form-container">
        {{-- Menampilkan semua error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="closebtn">&times;</span>
            </div>
        @endif

        <form action="{{ route('job.vacancy.update', $jobVacancy->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h3>Edit Lowongan Kerja</h3>

            <p>Nama Lowongan</p>
            <input type="text" name="title" class="form-control box" value="{{ old('title', $jobVacancy->title) }}">

            <p>Lokasi</p>
            <input type="text" name="location" class="form-control box"
                   value="{{ old('location', $jobVacancy->location) }}">

            <p>Kategori Pekerjaan</p>
            <select name="category" id="select" class="form-select box">
                @foreach ($categories as $category)
                    @if($category->value === $jobVacancy->category->value)
                        <option value="{{ $category->value }}" selected>{{ $category->value }}</option>
                    @else
                        <option value="{{ $category->value }}">{{ $category->value }}</option>
                    @endif
                @endforeach
            </select>

            <p>Jenis Pekerjaan</p>
            <select name="job_type" id="select" class="form-select box">
                @foreach ($jobTypes as $jobType)
                    @if($jobType->value === $jobVacancy->job_type->value)
                        <option value="{{ $jobType->value }}" selected>{{ $jobType->value }}</option>
                    @else
                        <option value="{{ $jobType->value }}">{{ $jobType->value }}</option>
                    @endif
                @endforeach
            </select>

            <p>Kebijakan Kerja</p>
            <select name="work_policy" id="select" class="form-select box">
                @foreach ($workPolicies as $workPolicy)
                    @if($workPolicy->value === $jobVacancy->work_policy->value)
                        <option value="{{ $workPolicy->value }}" selected>{{ $workPolicy->value }}</option>
                    @else
                        <option value="{{ $workPolicy->value }}">{{ $workPolicy->value }}</option>
                    @endif
                @endforeach
            </select>

            <p>Gaji (Rupiah)</p>
            <div class="input-group mb-3 box">
                <input type="number" class="form-control" name="salary_min" placeholder="Mulai" aria-label="Mulai"
                       value="{{ old('salary_min', $jobVacancy->salary_min) }}">
                <span class="input-group-text">-</span>
                <input type="number" class="form-control" name="salary_max" placeholder="Sampai" aria-label="Sampai"
                       value="{{ old('salary_max', $jobVacancy->salary_max) }}">
            </div>

            <p>Tenggat Waktu</p>
            <input type="date" name="date_line" class="form-control box"
                   value="{{ old('date_line', $jobVacancy->date_line) }}">

            <p>Deskripsi</p>
            <textarea name="job_description" placeholder="Masukkan Deskripsi"
                      class="form-control box">{{ old('job_description', $jobVacancy->job_description) }}</textarea>

            <h4 class="mt-4">Tanggung Jawab Pekerjaan</h4>
            @foreach($jobVacancy->responsibilities as $responsibility)
                <div id="responsibilities">
                    @foreach(json_decode($responsibility->items, false, 512, JSON_THROW_ON_ERROR) as $item)
                        <div class="input-group mb-3">
                            <input type="text" name="responsibilities[]" class="form-control"
                                   placeholder="Tanggung jawab"
                                   aria-label="Tanggung jawab" value="{{ $item }}">
                            <button type="button" class="btn btn-danger remove-responsibility"><i
                                    class="fas fa-xmark"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-purple add-responsibility"><i class="fas fa-plus"></i></button>
                <textarea name="responsibility_description" placeholder="Masukkan Deskripsi Tanggung Jawab"
                          class="form-control box">{{ old('responsibility_description', $responsibility->description) }}</textarea>
            @endforeach

            <h4 class="mt-4">Kualifikasi Pekerjaan</h4>
            @foreach($jobVacancy->qualifications as $qualification)
                <div id="qualifications">
                    @foreach(json_decode($qualification->items, false, 512, JSON_THROW_ON_ERROR) as $item)
                        <div class="input-group mb-3">
                            <input type="text" name="qualifications[]" class="form-control" placeholder="Kualifikasi"
                                   aria-label="Kualifikasi" value="{{ $item }}">
                            <button type="button" class="btn btn-danger remove-qualification"><i class="fas fa-xmark"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-purple add-qualification"><i class="fas fa-plus"></i></button>
                <textarea name="qualification_description" placeholder="Masukkan Deskripsi Kualifikasi" class="form-control box">{{ old('qualification_description', $qualification->description) }}</textarea>
            @endforeach
            <div class="row mt-5">
                <div class="col-md-12">
                    <a href="{{ route('job.vacancy.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-purple">Simpan</button>
                </div>
            </div>
        </form>
    </section>
@endsection
