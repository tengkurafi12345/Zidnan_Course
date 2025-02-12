@extends('layouts.main')

@section('title', 'Halaman Pendaftaran Guru')

@section('content')
    <header>
        <h1>Form Pendaftaran Guru Zidnan</h1>
    </header>
    <section class="testimonial-section">
        <div class="contrainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body" style="text-align: start">
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

                            <!-- Flash Notification -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                    <span class="closebtn">&times;</span>
                                    <br>
                                </div>
                                <br>
                                <span>Silahkan Login lewat <a href="/login">Link ini</a></span>
                                <span>Kredensial:</span>
                                <ul>
                                    <li>Username: <span class="fst-italic">email terdadtar anda</span></li>
                                    <li>Password: password</li>
                                </ul>
                                <hr>
                            @endif
                            <form action="{{ route('pendaftaran.guru.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Masukkan Nama Lengkap..." value="{{ old('name') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Masukkan Email..." value="{{ old('email') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Nomor Telpon</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Masukkan Nomor Telepon..." value="{{ old('phone') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="address" id="address"
                                        placeholder="Masukkan Alamat..." value="{{ old('address') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="domicile" class="form-label">Domisili</label>
                                    <input type="text" class="form-control" name="domicile" id="domicile"
                                        placeholder="Masukkan Alamat..." value="{{ old('domicile') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" id="select" class="form-select">
                                        <option value="">--Please choose an option--</option>
                                        <option value="male">Laki-laki</option>
                                        <option value="female">Perempuan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="birthplace" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="birthplace" id="birthplace"
                                        placeholder="Masukkan Tempat Lahir..." value="{{ old('birthplace') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="birthday" id="birthday"
                                        placeholder="Masukkan Tanggal Lahir..." value="{{ old('birthday') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="start_joining" class="form-label">Mulai Bergabung</label>
                                    <input type="date" class="form-control" name="start_joining" id="start_joining"
                                        placeholder="Masukkan Tanggal Lahir..." value="{{ old('start_joining') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="bio" class="form-label">Bio</label>
                                    <textarea class="form-control" name="bio" id="bio" cols="30" rows="10"></textarea>
                                </div>

                                <input type="submit" value="Submit" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
