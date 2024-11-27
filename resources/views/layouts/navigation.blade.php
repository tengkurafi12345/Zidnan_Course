<div class="navbar">
    <div class="nav-links">
        <a href="/">Home</a>
        <a href="/course">Course</a>
        <a href="#siswa">Student</a>
        <a href="#guru">Teacher</a>
        <a href="#Testimonial">Testimonial</a>
    </div>
    <div class="auth-links">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Sing_Up</a>
                @endif
            @endauth
        @endif
    </div>
</div>
