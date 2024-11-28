<div class="navbar">
    <div class="nav-links">
        <a href="/">Home</a>
        <a href="{{ route('kursus') }}">Course</a>
        <a href="{{ route('siswa') }}">Student</a>
        <a href="{{ route('guru') }}">Teacher</a>
        <a href="{{ route('testimoni') }}">Testimonial</a>
    </div>
    <div class="auth-links">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Sign_Up</a>
                @endif
            @endauth
        @endif
    </div>
</div>
