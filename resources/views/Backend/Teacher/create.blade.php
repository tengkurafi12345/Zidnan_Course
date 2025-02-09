@extends('layouts.app')

@section('title', 'Teacher Create')
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

        <form action="{{ route('teacher.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Tambah Guru</h3>

            <p>Nama</p>
            <input type="text" name="name" placeholder="enter your old text" class="box"
                value="{{ old('name') }}">

            <p>Email</p>
            <input type="email" name="email" placeholder="enter your email" class="box"
                value="{{ old('email') }}">

            <p>No Telpon </p>
            <input type="text" name="phone" class="box" value="{{ old('phone') }}">

            <p>Alamat</p>
            <input type="text" name="address" id="" value="{{ old('address') }}" class="box">

            <p>Domisili</p>
            <input type="text" name="domicile" class="box" value="{{ old('domicile') }}">

            <p>Jenis Kelamin </p>
            <select name="gender" id="select">
                <option value="">--Please choose an option--</option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->value }}" >{{ $gender->name }}</option>
                @endforeach
            </select>
            <p>Tempat Lahir</p>
            <input type="text" name="birthplace" class="box" value="{{ old('birthplace') }}">

            <p>Tanggal Lahir</p>
            <input type="date" name="birthday" class="box" value="{{ old('birthday') }}">

            <p>Mulai Bergabung</p>
            <input type="date" name="start_joining" class="box" value="{{ old('start_joining') }}">

            <p>Bio</p>
            <textarea name="bio" placeholder="write your bio" class="box">{{ old('bio') }}</textarea>

            <input type="submit" value="Tambah Guru" class="btn">
        </form>
    </section>
@endsection
