<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-purple">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('img/logo-menu-utama.png') }}" alt="" style="width: 100px; height: 40px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse show" id="navbarCollapse" style="">
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
                <a class="nav-link" href="{{ route('promo') }}">Promo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lowongan') }}">Lowongan</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
