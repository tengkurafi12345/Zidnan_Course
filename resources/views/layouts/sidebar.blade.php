<header class="header">
    <section class="flex">
        <a href="{{ route('dashboard') }}" class="logo">Zidnan Course</a>


        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="toggle-btn" class="fas fa-sun"></div>
        </div>

        <div class="profile">
            <img src="{{ asset('assets/image/BE/Zidnan.jpg') }}" class="image" alt="">
            @if (auth()->check())
                <h3 class="name">{{ Auth::user()->name }}</h3>
                <p class="role">{{ Auth::user()->email }}</p>
            @endauth
            <a href="{{ route('profile.edit') }}" class="btn">view profile</a>
            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="option-btn">Log Out</a>
            </form>

    </div>
</section>
</header>

<div class="side-bar">
<div id="close-btn">
    <i class="fas fa-times"></i>
</div>

<div class="profile">
    <img src="{{ asset('assets/image/BE/Zidnan.jpg') }}" class="image" alt="">
</div>

<nav class="navbar">
    <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
    @if (auth()->user()->hasRole('admin'))
        <a class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <span><i class="fas fa-boxes-stacked"></i> Master Data</span>
            <i class="fas fa-sort-down" id="masterDataIcon"></i>
        </a>
        <div class="collapse" id="collapseExample">
            <a href="{{ route('packet.index') }}" class="navbar-child"><i class="fas fa-sitemap"></i><span>Paket</span></a>
            <a href="{{ route('program.index') }}" class="navbar-child"><i class="fas fa-table"></i><span>Program</span></a>
            <a href="{{ route('teacher.index') }}" class="navbar-child"><i class="fas fa-chalkboard-user"></i><span>Guru</span></a>
            <a href="{{ route('student.index') }}" class="navbar-child"><i class="fas fa-child"></i><span>Siswa</span></a>
        </div>
        <a href="{{ route('packet.combination.index') }}"><i class="fas fa-boxes-packing"></i><span>Paket Kombinasi</span></a>
        <a href="{{ route('teacher.placement.index') }}"><i class="fas fa-person-chalkboard"></i><span>Penempatan Guru</span></a>
        <a href="{{ route('teacher.meeting.attendance.index') }}"><i class="fas fa-clipboard-user"></i><span>Absensi Guru</span></a>
        <a href="{{ route('job.vacancy.index') }}"><i class="fas fa-user-tie"></i><span>Lowongan</span></a>
        <a href="{{ route('job.application.index') }}"><i class="fas fa-person-walking-arrow-right"></i><span>Pelamar</span></a>

    @elseif (auth()->user()->hasRole('teacher'))
        <a href="{{ route('meeting.setup.index') }}"><i class="fa-solid fa-clipboard-list"></i><span>Pengaturan Absensi</span></a>
        <a href="{{ route('meeting.attendance.index') }}"><i class="fa-solid fa-clipboard-check"></i><span>Absensi</span></a>
    @endif

</nav>
</div>
