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

        <form action="{{ route('job.application.update', $jobApplication->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h3>Ubah Status Lamaran</h3>

            <p>Status Lamaran</p>
            <select name="status" id="select" class="form-select box">
                @foreach ($statuses as $status)
                    @if($status->value === $jobApplication->status)
                        <option value="{{ $status->value }}" selected>{{ $status->value }}</option>
                    @else
                        <option value="{{ $status->value }}">{{ $status->value }}</option>
                    @endif
                @endforeach
            </select>

            <div class="row mt-5">
                <div class="col-md-12">
                    <a href="{{ route('job.application.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-purple">Simpan</button>
                </div>
            </div>
        </form>
    </section>
@endsection
