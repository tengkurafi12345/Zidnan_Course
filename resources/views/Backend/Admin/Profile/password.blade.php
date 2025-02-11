@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<section class="form-container form-container-password">
    <form action="{{ route('password.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <h3>Change Password</h3>
        <p>Current Password</p>
        <input type="password" name="current_password" placeholder="enter your current password" maxlength="20" class="box">
        <p>new password</p>
        <input type="password" name="password" placeholder="enter your old password" maxlength="20" class="box">
        <p>confirm password</p>
        <input type="password" name="password_confirmation" placeholder="confirm your new password" maxlength="20" class="box">
        <input type="submit" value="Change Password" name="submit" class="btn">
    </form>
</section>
@endsection
