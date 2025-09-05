@extends('layouts.app')

@section('title', 'Edit Kelas Program')

@section('content')
    <section class="form-container">

        {{-- Alert Error --}}
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

        <form action="{{ route('program.class.update', $programClass->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <h3>Edit Kelas Program</h3>

            <p>Nama</p>
            <input type="text" name="name" class="box" value="{{ old('name', $programClass->name) }}">

            <p>Keterangan Singkat (Caption)</p>
            <input type="text" name="caption" class="box" value="{{ old('caption', $programClass->caption) }}">

            <p>Deskripsi</p>
            <textarea name="description" class="box">{{ old('description', $programClass->description) }}</textarea>

            <p class="mt-4">List Keunggulan</p>
            <div id="list_features">
                @php
                    $features = old('list_of_feature', $programClass->list_of_content ?? []);
                @endphp

                @foreach($features as $feature)
                    <div class="input-group mb-3">
                        <input type="text" name="list_of_feature[]" class="form-control"
                               value="{{ $feature }}" placeholder="List Keunggulan">
                        <button type="button" class="btn btn-danger remove-list-features"><i class="fas fa-xmark"></i></button>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-purple add-list-features"><i class="fas fa-plus"></i></button>

            <p class="mt-4">Logo</p>
            <input type="file" name="logo" id="logoInput" accept="image/*" class="box">

            {{-- Preview Logo Lama / Baru --}}
            <div class="mt-3">
                @if($programClass->logo)
                    <img id="logoPreview" src="{{ Storage::url($programClass->logo) }}"
                         alt="Logo {{ $programClass->name }}"
                         style="max-width: 200px; border:1px solid #ccc; padding:5px;">
                @else
                    <img id="logoPreview" src="#" alt="Preview Logo" style="max-width:200px; display:none; border:1px solid #ccc; padding:5px;">
                @endif
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <a href="{{ route('program.class.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-purple">Update</button>
                </div>
            </div>
        </form>
    </section>

    {{-- JS --}}
    <script>
        // Logo Preview
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
                <input type="text" name="list_of_feature[]" class="form-control" placeholder="List Keunggulan">
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
