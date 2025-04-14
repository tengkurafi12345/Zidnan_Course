@extends('layouts.app')

@section('title', 'Edit Promo')
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

        <form action="{{ route('promotion.update', $promotion->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h3>Edit Promosi</h3>

            <p>Nama</p>
            <input type="text" name="name" class="form-control box" value="{{ old('name', $promotion->name) }}">

            <p>Kode Voucher</p>
            <input type="text" name="code_voucher" class="form-control box" value="{{ old('code_voucher', $promotion->code_voucher) }}">

            <p>Diskon (Rp)</p>
            <input type="number" name="discount" class="form-control box" value="{{ old('discount', $promotion->discount) }}">

            <p>Masa Berlaku</p>
            <div class="input-group mb-3 box">
                <input type="date" class="form-control" name="start_date" placeholder="Mulai" aria-label="Mulai" value="{{ old('start_date', $promotion->start_date->format('Y-m-d')) }}">
                <span class="input-group-text">-</span>
                <input type="date" class="form-control" name="end_date" placeholder="Sampai" aria-label="Sampai" value="{{ old('end_date', $promotion->end_date->format('Y-m-d')) }}">
            </div>

            <p>Syarat Dan Ketentuan</p>
                <div id="term_and_conditions">
                 @foreach($promotion->term_and_conditions as $term_condition)
                    <div class="input-group mb-3">
                        <input type="text" name="term_and_conditions[]" class="form-control" placeholder="Syarat Dan Ketentuan" aria-label="Syarat Dan Ketentuan" value="{{ $term_condition }}">
                        <button type="button" class="btn btn-danger remove-term-condition"><i class="fas fa-xmark"></i></button>
                    </div>
                @endforeach
                </div>

                <button type="button" class="btn btn-purple add-term-conditions"><i class="fas fa-plus"></i> </button>

            <div class="row mt-5">
                <div class="col-md-12">
                    <a href="{{ route('promotion.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-purple">Simpan</button>
                </div>
            </div>
        </form>
    </section>

    <script>
        // Add Button for term and condition
        document.querySelector('.add-term-conditions').addEventListener('click', function() {
            const termAndConditionDiv = document.getElementById('term_and_conditions');
            const newTermAndCondition = document.createElement('div');
            newTermAndCondition.classList.add('input-group', 'mb-3');
            newTermAndCondition.innerHTML = `
                <input type="text" name="term_and_conditions[]" class="form-control" placeholder="Syarat Dan Ketentuan" aria-label="Syarat Dan Ketentuan">
                <button type="button" class="btn btn-danger remove-term-condition"><i class="fas fa-xmark"></i></button>
            `;
            termAndConditionDiv.appendChild(newTermAndCondition);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-term-condition')) {
                e.target.parentElement.remove();
            }
        });
    </script>
@endsection
