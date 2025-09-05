@extends('layouts.app')

@section('title', 'Tambah Kelas Program')
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

        <form action="{{ route('program.class.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Tambah Kelas Program</h3>

            <p>Nama</p>
            <input type="text" name="name" placeholder="enter your old text" class="box"
                value="{{ old('name') }}">

            <p>Keterangan Singkat (Caption)</p>
            <input type="text" name="caption" class="box" value="{{ old('caption') }}">

            <p>Deskripsi</p>
            <textarea name="description" placeholder="write your description" class="box">{{ old('description') }}</textarea>

            <p class="mt-4">List Keunggulan</p>
            <div id="list_features">
                <div class="input-group mb-3">
                    <input type="text" name="list_of_feature[]" class="form-control" placeholder="List Keunggulan" aria-label="List Keunggulan" aria-describedby="button-addon2">
                    <button type="button" class="btn btn-danger remove-list-features"><i class="fas fa-xmark"></i></button>
                </div>
            </div>
            <button type="button" class="btn btn-purple add-list-features"><i class="fas fa-plus"></i> </button>

            <p>Logo</p>
            <input type="file" name="logo" id="logoInput" accept="image/*" class="box">

            {{-- Preview Logo --}}
            <div class="mt-3">
                <img id="logoPreview" src="#" alt="Preview Logo" style="max-width: 200px; display:none; border:1px solid #ccc; padding:5px;">
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                <a href="{{ route('program.class.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-purple">Simpan</button>
                </div>
            </div>
        </form>
    </section>


    {{--  JS  --}}
    <script>
        // logo preview
        document.getElementById('logoInput').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('logoPreview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Add Button for list features
        document.querySelector('.add-list-features').addEventListener('click', function() {
            const listFeaturesDiv = document.getElementById('list_features');
            const newFeature = document.createElement('div');
            newFeature.classList.add('input-group', 'mb-3');
            newFeature.innerHTML = `
            <input type="text" name="list_of_feature[]" class="form-control" placeholder="List Keunggulan" aria-label="List Keunggulan">
            <button type="button" class="btn btn-danger remove-list-features"><i class="fas fa-xmark"></i></button>
        `;
            listFeaturesDiv.appendChild(newFeature);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-list-features')) {
                e.target.closest('.input-group').remove();
            }
        });
    </script>

@endsection
