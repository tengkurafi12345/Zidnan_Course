<div class="navbar">
    <div class="nav-links">
        <a href="/">Utama</a>
        <a href="{{ route('kursus') }}">Kursus</a>
        <a href="{{ route('siswa') }}">Siswa</a>
        <a href="{{ route('guru') }}">Pengajar</a>
        <a href="{{ route('testimoni') }}">Testimonial</a>
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
