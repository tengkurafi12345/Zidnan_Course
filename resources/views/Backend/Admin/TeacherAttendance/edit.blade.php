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


        <form action="{{ route('meeting.attendance.update', $meeting->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h3>Isi Laporan Harian</h3>

            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Laporan Harian</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="daily_report" rows="3"></textarea>
                    </div>
                </div>

            </div>


            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </section>
@endsection
