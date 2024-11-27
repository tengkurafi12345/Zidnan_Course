@extends('layouts.app')

@section('title', 'Course Create')
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

        <form action="{{ route('course.update', $course->id) }}" method="PUT" enctype="multipart/form-data">
            @csrf
            <h3>Edit Course</h3>

            <p>Code</p>
            <input type="text" name="code" placeholder="enter your current code" class="box"
                value="{{ $course->code ?? old('code') }}">

            <p>Name</p>
            <input type="text" name="name" placeholder="enter your old text" class="box"
                value="{{ $course->name ?? old('name') }}">

            <p>Price</p>
            <input type="number" name="price" placeholder="confirm your new text" class="box"
                value="{{ $course->price ?? old('price') }}">

            <p>Description</p>
            <textarea name="description" placeholder="write your description" class="box">{{ $course->description ?? old('description') }}</textarea>

            <p>Estimate Time </p>
            <input type="datetime-local" name="estimate_time" class="box"
                value="{{ $course->estimate_time ?? old('estimate_time') }}">

            <p>Category </p>
            <select name="category_id" id="select">
                <option value="">--Please choose an option--</option>
                <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Bahasa Inggris</option>
                <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>Calistung</option>
                <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>Bahasa Arab</option>
                <option value="4" {{ old('category_id') == 4 ? 'selected' : '' }}>Tahfidz</option>
            </select>

            <p>Is Active </p>
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', 0) ? 'checked' : '' }}>

            <input type="submit" value="Update Course" class="btn">
        </form>
    </section>
@endsection
