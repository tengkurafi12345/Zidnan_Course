    <nav class="navbar navbar-expand-lg navbar-dark" aria-label="Eighth navbar example" style="height: 90px">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo-menu-utama.png') }}" alt="" style="width: 100px; height: 40px">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav ms-5 me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('kursus') }}">Kursus</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('siswa') }}">Siswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('guru') }}">Tentor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('testimoni') }}">Testimoni</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Promo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Lowongan</a>
              </li>
            </ul>
            {{-- <form role="search">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            </form> --}}
          </div>
        </div>
      </nav>


{{-- <div class="navbar ">
    <div class="nav-links">
        <a href="/">Beranda</a>
        <a href="{{ route('kursus') }}">Paket</a>
        <a href="{{ route('siswa') }}">Siswa</a>
        <a href="{{ route('guru') }}">Tentor</a>
        <a href="{{ route('testimoni') }}">Testimonial</a>
        <a href="">Promo</a>
        <a href="">Lowongan</a>
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
</div> --}}
