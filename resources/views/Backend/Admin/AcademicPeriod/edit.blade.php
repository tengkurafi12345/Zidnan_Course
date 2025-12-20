@extends('layouts.app')

@section('title', 'Edit Periode')

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

        <form action="{{ route('academic.period.update', $academicPeriod->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <h3>Edit Kelas Program</h3>

            <p>Nama</p>
            <input type="text" name="name" class="box" value="{{ old('name', $academicPeriod->name) }}">

            <p>Tanggal Mulai</p>
            <input type="date" name="start_date" class="box" value="{{ old('start_date', $academicPeriod->start_date) }}">

            <p>Tanggal Berakhir</p>
            <input type="date" name="end_date" class="box" value="{{ old('end_date', $academicPeriod->end_date) }}">
            
            <p>Status</p>
            <select name="status" class="box">
                <option value="active" {{ old('status', $academicPeriod->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $academicPeriod->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>


            <div class="row mt-5">
                <div class="col-md-12">
                    <a href="{{ route('academic.period.index') }}" class="btn btn-secondary">Kembali</a>
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
