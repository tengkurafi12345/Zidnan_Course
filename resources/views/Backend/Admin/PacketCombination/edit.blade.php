@extends('layouts.app')

@section('title', 'Tambah Program')
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
            <h3>Tambah Paket Kombinasi</h3>

            <p>Nama Paket</p>
            <select name="packet_id" id="select">
                @foreach ($packets as $packet)
                    @if ($packet === $packetCombination->packet)
                        <option value="{{ $packet->id }}" selected> {{ $packet->code }} - {{ $packet->name }}</option>
                    @endif
                    <option value="{{ $packet->id }}" >{{ $packet->code }} - {{ $packet->name }}</option>
                @endforeach
            </select>

            <p>Nama Program</p>
            <select name="program_id" id="select">
                @foreach ($programs as $program)
                    @if ($program === $packetCombination->program)
                    <option value="{{ $program->id }}" selected>{{ $program->name }} - {{ $program->meeting_times }}Kali</option>
                    @endif
                    <option value="{{ $program->id }}" >{{ $program->name }} - {{ $program->meeting_times }}Kali</option>
                @endforeach
            </select>

            <p>Harga</p>
            <input type="number" name="price" id="" value="{{ old('price', $packetCombination->price) }}" class="box">

            <div class="row mt-4">
                <div class="col">
                    <input type="submit" value="Simpan" class="btn btn-lg btn-primary">
                </div>
            </div>
        </form>
    </section>
@endsection
