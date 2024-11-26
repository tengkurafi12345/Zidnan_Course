<div class="navbar">
    <div class="nav-links">
        <a href="/">Home</a>
        <a href="/course">Course</a>
        <a href="#siswa">Siswa</a>
        <a href="#guru">Guru</a>
        <a href="#blog">Blog</a>
        <a href="#Testimonial">Testimonial</a>
        <a href="#Buku & Media">Buku & Media</a>
    </div>
    <div class="auth-links">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif
    </div>
</div>
