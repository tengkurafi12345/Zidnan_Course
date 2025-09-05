@extends('layouts.app')

@section('title', 'Edit Paket Kombinasi')
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

        <form action="{{ route('packet.combination.update', $packetCombination->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h3>Edit Paket Kombinasi</h3>
            <p>Nama Jenjang Level</p>
            <select name="packet_id" id="select" class="form-select">
                @foreach ($lessonLevels as $lessonLevel)
                    @if ($lessonLevel->id === $packetCombination->packet->id)
                        <option value="{{ $lessonLevel->id }}" selected>{{ $lessonLevel->name }}</option>
                    @endif
                    <option value="{{ $lessonLevel->id }}" >{{ $lessonLevel->name }}</option>
                @endforeach
            </select>

            <p>Nama Program</p>
            <select name="program_id" id="select" class="form-select">
                @foreach ($programs as $program)
                    @if ($program->id === $packetCombination->program->id)
                        <option value="{{ $program->id }}" selected>{{ $program->name }}</option>
                    @endif
                    <option value="{{ $program->id }}" >{{ $program->name }}</option>
                @endforeach
            </select>

            <p>Harga</p>
            <input type="number" name="price" id="" value="{{ old('price', $packetCombination->price) }}" class="box">

            <p>Status</p>
            <div class="form-check form-switch fs-4">
                <input type="hidden" name="status" value="0">

                <input class="form-check-input" type="checkbox" name="status" role="switch"
                       id="flexSwitchCheckDefault" class="box" value="1"
                       {{ $packetCombination->status ? 'checked' : '' }}
                       onchange="toggleStatusText()">
                <label class="form-check-label" for="flexSwitchCheckDefault" id="statusLabel">
                    {{ $packetCombination->status ? 'Aktif' : 'Tidak Aktif' }}
                </label>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <a href="{{ route('packet.combination.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-purple">Simpan</button>
                </div>
            </div>
        </form>
    </section>
@endsection
