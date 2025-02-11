@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <section class="user-profile">
        <h1 class="heading">your profile</h1>
        <div class="info">
            <div class="user">
                <img src="{{ asset('assets/image/BE/teacher10.jpg') }}" alt="">

                <h2>{{ $user->name }}</h2>
                <h3>{{ $user->email }}</h3>
                <p>Admin</p>
                <a href="{{ route('profile.password') }}" class="inline-btn">Change Password</a>
            </div>

            <div class="form-container form-container-profile">
                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <h3>update profile</h3>
                    <p>Name</p>
                    <input type="text" name="name" value="{{ auth()->user() ? auth()->user()->name : ''}}"  maxlength="50" class="box">
                    <p>Email</p>
                    <input type="email" name="email" value="{{ auth()->user() ? auth()->user()->email : ''}}" maxlength="50" class="box">
                    <input type="submit" value="update profile" name="submit" class="btn">
                </form>
            </div>
        </div>
    </section>
@endsection
