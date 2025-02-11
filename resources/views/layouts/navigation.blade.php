<div class="navbar">
    <div class="nav-links">
        <a href="/">Beranda</a>
        <a href="{{ route('kursus') }}">Paket</a>
        <a href="{{ route('siswa') }}">Siswa</a>
        <a href="{{ route('guru') }}">Tentor</a>
        <a href="{{ route('testimoni') }}">Testimonial</a>
        <a href="">Promo</a>
        <a href="">Lowongan</a>
    </div>
    {{-- <div class="auth-links">
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
    </div> --}}
</div>
