@extends('layouts.app')

@section('title', 'Course Create')

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
            </div>
        @endif

        <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Create Course</h3>

            <p>Code</p>
            <input type="text" name="code" placeholder="enter your current code" class="box" value="{{ old('code') }}">

            <p>Name</p>
            <input type="text" name="name" placeholder="enter your old text" class="box" value="{{ old('name') }}">

            <p>Price</p>
            <input type="number" name="price" placeholder="confirm your new text" class="box" value="{{ old('price') }}">

            <p>Description</p>
            <textarea name="description" placeholder="write your description" class="box">{{ old('description') }}</textarea>

            <p>Estimate Time </p>
            <input type="datetime-local" name="estimate_time" class="box" value="{{ old('estimate_time') }}">

            <p>Category </p>
            <select name="category_id" id="select">
                <option value="">--Please choose an option--</option>
                <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Bahasa Inggris</option>
                <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>Calistung</option>
                <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>Bahasa Arab</option>
                <option value="4" {{ old('category_id') == 4 ? 'selected' : '' }}>Tahfidz</option>
            </select>

            <p>Is Active </p>
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', 0) ? 'checked' : '' }}>

            <input type="submit" value="Create Course" class="btn">
        </form>
    </section>
@endsection
