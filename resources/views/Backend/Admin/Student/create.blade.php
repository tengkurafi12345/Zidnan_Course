@extends('layouts.app')

@section('title', 'Tambah Siswa')
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

        <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Tambah Siswa</h3>

            <p>Nama</p>
            <input type="text" name="name" placeholder="enter your old text" class="box"
                value="{{ old('name') }}">

            <p>Nomor Pendaftaran</p>
            <input type="text" name="registration_number" placeholder="enter your registration_number" class="box"
                value="{{ old('registration_number') }}">

            <p>Tempat Lahir</p>
            <input type="text" name="birth_place" class="box" value="{{ old('birth_place') }}">

            <p>Tanggal Lahir</p>
            <input type="date" name="birth_date" class="box" value="{{ old('birth_date') }}">

            <p>Jenis Kelamin </p>
            <select name="gender" id="select" class="form-select">
                <option value="">--Please choose an option--</option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->value }}" >{{ $gender->name }}</option>
                @endforeach
            </select>

            <p>Umur</p>
            <input type="text" name="age" placeholder="enter your age" class="box"
                value="{{ old('age') }}">

            <p>Kelas</p>
            <input type="text" name="class_status" placeholder="enter your class_status" class="box"
                value="{{ old('class_status') }}">

            <p>Nama Sekolah</p>
            <input type="text" name="school_name" placeholder="enter your school_name" class="box"
                value="{{ old('school_name') }}">

            <p>Alamat</p>
            <input type="text" name="address" placeholder="enter your address" class="box"
                value="{{ old('address') }}">

            <p>Kabupaten</p>
            <input type="text" name="district" placeholder="enter your district" class="box"
                value="{{ old('district') }}">

            <p>Nomor Whats App (WA)</p>
            <input type="text" name="phone_number" placeholder="enter your phone_number" class="box"
                value="{{ old('phone_number') }}">

            <p>Golongan Darah</p>
            <input type="text" name="blood_type" placeholder="enter your blood_type" class="box"
                value="{{ old('blood_type') }}">

            <p>Nama Ayah</p>
            <input type="text" name="father_name" placeholder="enter your father_name" class="box"
                value="{{ old('father_name') }}">

            <p>Nama Ibu</p>
            <input type="text" name="mother_name" placeholder="enter your mother_name" class="box"
                value="{{ old('mother_name') }}">

            <p>Pekerjaan Ayah</p>
            <input type="text" name="father_occupation" placeholder="enter your father_occupation" class="box"
                value="{{ old('father_occupation') }}">

            <p>Pekerjaan Ibu</p>
            <input type="text" name="mother_occupation" placeholder="enter your mother_occupation" class="box"
                value="{{ old('mother_occupation') }}">

            <div class="row mt-5">
                <div class="col-md-12">
                    <a href="{{ route('student.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-purple">Simpan</button>
                </div>
            </div>
        </form>
    </section>
@endsection
