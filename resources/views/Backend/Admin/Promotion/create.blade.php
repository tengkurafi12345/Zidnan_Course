@extends('layouts.app')

@section('title', 'Tambah Promo')
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

        <form action="{{ route('promotion.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Tambah Promosi</h3>

            <p>Nama</p>
            <input type="text" name="name" class="form-control box" value="{{ old('name') }}">

            <p>Kode Voucher</p>
            <input type="text" name="code_voucher" class="form-control box" value="{{ old('code_voucher') }}">

            <p>Diskon (Rp)</p>
            <input type="number" name="discount" class="form-control box" value="{{ old('discount') }}">

            <p>Masa Berlaku</p>
            <div class="input-group mb-3 box">
                <input type="date" class="form-control" name="start_date" placeholder="Mulai" aria-label="Mulai">
                <span class="input-group-text">-</span>
                <input type="date" class="form-control" name="end_date" placeholder="Sampai" aria-label="Sampai">
            </div>

            <p>Tampilkan Sebagai Header?</p>
            <div class="form-check mb-3">
                <input
                    class="form-check-input"
                    type="checkbox"
                    value="1"
                    id="is_header"
                    name="is_header"
                    {{ old('is_header') ? 'checked' : '' }}
                >
                <label class="form-check-label" for="is_header">
                    Ya, tampilkan di header
                </label>
            </div>

            <div id="header_position_container" class="mb-3" style="display: {{ old('is_header') ? 'block' : 'none' }};">
                <p>Posisi Header</p>
                <select name="header_position" class="form-control box">
                    <option value="">--Please choose an option--</option>
                    <option value="left" {{ old('header_position') == 'left' ? 'selected' : '' }}>Kiri</option>
                    <option value="right" {{ old('header_position') == 'right' ? 'selected' : '' }}>Kanan</option>
                </select>
            </div>

            <p>Syarat Dan Ketentuan</p>
            <div id="term_and_conditions">
                <div class="input-group mb-3">
                    <input type="text" name="term_and_conditions[]" class="form-control" placeholder="Syarat Dan Ketentuan" aria-label="Syarat Dan Ketentuan">
                    <button type="button" class="btn btn-danger remove-term-condition"><i class="fas fa-xmark"></i></button>
                </div>
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


        // checkbox header
        const isHeaderCheckbox = document.getElementById('is_header');
        const headerPositionContainer = document.getElementById('header_position_container');

        isHeaderCheckbox.addEventListener('change', function () {
            headerPositionContainer.style.display = this.checked ? 'block' : 'none';
        });
    </script>
@endsection
