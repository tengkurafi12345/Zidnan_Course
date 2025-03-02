@extends('layouts.app')

@section('title', 'Edit Guru')
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

        <form action="{{ route('teacher.update', $teacher->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3>Edit Guru</h3>

            <p>Nama</p>
            <input type="text" name="name" placeholder="enter your old text" class="box"
                value="{{ old('name', $teacher->name) }}">

            <p>Email</p>
            <input type="email" name="email" placeholder="enter your email" class="box"
                value="{{ old('email', $teacher->email) }}">

            <p>No Telpon </p>
            <input type="text" name="phone" class="box" value="{{ old('phone', $teacher->phone) }}">

            <p>Alamat</p>
            <input type="text" name="address" id="" value="{{ old('address', $teacher->address) }}" class="box">

            <p>Domisili</p>
            <input type="text" name="domicile" class="box" value="{{ old('domicile', $teacher->domicile) }}">

            <p>Jenis Kelamin </p>
            <select name="gender" id="select" class="form-select">
                <option value="">--Please choose an option--</option>
                @foreach ($genders as $gender)
                    @if ($gender === $teacher->gender)
                        <option value="{{ $gender->value }}" >{{ $gender->name }}</option>
                    @endif
                    <option value="{{ $gender->value }}" >{{ $gender->name }}</option>
                @endforeach
            </select>
            <p>Tempat Lahir</p>
            <input type="text" name="birthplace" class="box" value="{{ old('birthplace', $teacher->birthplace) }}">

            <p>Tanggal Lahir</p>
            <input type="date" name="birthday" class="box" value="{{ old('birthday', $teacher->birthday) }}">

            <p>Mulai Bergabung</p>
            <input type="date" name="start_joining" class="box" value="{{ old('start_joining', $teacher->start_joining) }}">


            <p>Bio</p>
            <textarea name="bio" placeholder="write your bio" class="box">{{ old('bio', $teacher->bio) }}</textarea>

            <div class="row mt-5">
                <div class="col-md-12">
                    <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-purple">Simpan</button>
                </div>
            </div>
        </form>
    </section>
@endsection
