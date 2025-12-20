@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <style>
        .form-container-password {
            max-width: 420px;
            margin: 0 auto;
        }

        .form-container-password h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container-password p {
            margin: 15px 0 6px;
            font-weight: 500;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input.box {
            width: 100%;
            padding-right: 45px;
        }

        .password-wrapper .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.2rem;
            color: #666;
            transition: color 0.2s;
        }

        .password-wrapper .toggle-password:hover {
            color: #333;
        }

        .btn-primary {
            width: 100%;
            margin-top: 25px;
        }

        .alert {
            margin-bottom: 15px;
        }
    </style>


    <section class="form-container form-container-password">

        {{-- SUCCESS --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        @endif

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
        @endif

        <form action="{{ route('password.update') }}" method="post">
            @csrf
            @method('put')

            <h3>Change Password</h3>

            <p>Current Password</p>
            <div class="password-wrapper">
                <input type="password" name="current_password"
                    placeholder="Enter your current password"
                    class="box password-field">
                <i class="fas fa-eye toggle-password"></i>
            </div>

            <p>New Password</p>
            <div class="password-wrapper">
                <input type="password" name="password"
                    placeholder="Enter your new password"
                    class="box password-field">
                <i class="fas fa-eye toggle-password"></i>
            </div>

            <p>Confirm Password</p>
            <div class="password-wrapper">
                <input type="password" name="password_confirmation"
                    placeholder="Confirm your new password"
                    class="box password-field">
                <i class="fas fa-eye toggle-password"></i>
            </div>

            <input type="submit" value="Change Password" class="btn btn-primary">
        </form>
    </section>


    <script>
        document.querySelectorAll('.toggle-password').forEach(icon => {
            icon.addEventListener('click', () => {
                const input = icon.previousElementSibling;
    
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        });
    </script>
@endsection
