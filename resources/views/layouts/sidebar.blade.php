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
            <a href="{{ route('profile.edit') }}" class="btn btn-purple">view profile</a>
            <a href="{{ route('profile.password') }}" class="btn btn-purple">change password</a>
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
@php
    $masterDataActive = request()->routeIs(
        'academic.period.*',
        'program-class.*',
        'lesson.level.*',
        'program.*',
        'teacher.*',
        'student.*',
    );
@endphp

<nav class="navbar">

    {{-- ADMIN --}}
    @if (auth()->user()->hasRole('admin'))

        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i><span>Dashboard</span>
        </a>

        {{-- MASTER DATA --}}
        <a class="d-flex justify-content-between align-items-center {{ $masterDataActive ? 'active' : '' }}"
            data-bs-toggle="collapse" data-bs-target="#masterDataCollapse" role="button">
            <span>
                <i class="fas fa-boxes-stacked"></i> Master Data
            </span>
            <i class="fas fa-sort-down"></i>
        </a>

        <div class="collapse {{ $masterDataActive ? 'show' : '' }}" id="masterDataCollapse">

            <a href="{{ route('academic.period.index') }}"
                class="navbar-child {{ request()->routeIs('academic.period.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i><span>Periode</span>
            </a>

            <a href="{{ route('program-class.index') }}"
                class="navbar-child {{ request()->routeIs('program-class.*') ? 'active' : '' }}">
                <i class="fas fa-cube"></i><span>Kelas Program</span>
            </a>

            <a href="{{ route('lesson.level.index') }}"
                class="navbar-child {{ request()->routeIs('lesson.level.*') ? 'active' : '' }}">
                <i class="fas fa-sitemap"></i><span>Jenjang Les</span>
            </a>

            <a href="{{ route('program.index') }}"
                class="navbar-child {{ request()->routeIs('program.*') ? 'active' : '' }}">
                <i class="fas fa-table"></i><span>Program</span>
            </a>

            <a href="{{ route('teacher.index') }}"
                class="navbar-child {{ request()->routeIs('teacher.*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-user"></i><span>Guru</span>
            </a>

            <a href="{{ route('student.index') }}"
                class="navbar-child {{ request()->routeIs('student.*') ? 'active' : '' }}">
                <i class="fas fa-child"></i><span>Siswa</span>
            </a>
        </div>

        {{-- MENU LAIN --}}
        <a href="{{ route('packet.combination.index') }}"
            class="{{ request()->routeIs('packet.combination.*') ? 'active' : '' }}">
            <i class="fas fa-boxes-packing"></i><span>Paket Kombinasi</span>
        </a>

        <a href="{{ route('teacher-placement.index') }}"
            class="{{ request()->routeIs('teacher-placement.*') ? 'active' : '' }}">
            <i class="fas fa-person-chalkboard"></i><span>Penempatan Guru</span>
        </a>

        <a href="{{ route('teacher-meeting-attendance.index') }}"
            class="{{ request()->routeIs('teacher-meeting-attendance.*') ? 'active' : '' }}">
            <i class="fas fa-clipboard-user"></i><span>Absensi Guru</span>
        </a>

        <a href="{{ route('job.vacancy.index') }}"
            class="{{ request()->routeIs('job.vacancy.*') ? 'active' : '' }}">
            <i class="fas fa-user-tie"></i><span>Lowongan</span>
        </a>

        <a href="{{ route('job.application.index') }}"
            class="{{ request()->routeIs('job.application.*') ? 'active' : '' }}">
            <i class="fas fa-person-walking-arrow-right"></i><span>Pelamar</span>
        </a>

        <a href="{{ route('promotion.index') }}" class="{{ request()->routeIs('promotion.*') ? 'active' : '' }}">
            <i class="fas fa-bullhorn"></i><span>Promosi</span>
        </a>

        {{-- TEACHER --}}
    @elseif(auth()->user()->hasRole('teacher'))
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i><span>Dashboard</span>
        </a>

        <a href="{{ route('meeting.setup.index') }}"
            class="{{ request()->routeIs('meeting.setup.*') ? 'active' : '' }}">
            <i class="fa-solid fa-clipboard-list"></i><span>Pengaturan Absensi</span>
        </a>

        <a href="{{ route('meeting.attendance.index') }}"
            class="{{ request()->routeIs('meeting.attendance.*') ? 'active' : '' }}">
            <i class="fa-solid fa-clipboard-check"></i><span>Absensi</span>
        </a>

        {{-- GUARDIAN --}}
    @elseif(auth()->user()->hasRole('guardian'))
        <a href="{{ route('guardian.dashboard') }}"
            class="{{ request()->routeIs('guardian.dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i><span>Dashboard</span>
        </a>

        <a href="{{ route('guardian.report.learning') }}"
            class="{{ request()->routeIs('guardian.report.learning') ? 'active' : '' }}">
            <i class="fas fa-clipboard-list"></i><span>Laporan Pembelajaran</span>
        </a>

        <a href="{{ route('guardian.report.payment') }}"
            class="{{ request()->routeIs('guardian.report.payment') ? 'active' : '' }}">
            <i class="fas fa-receipt"></i><span>Laporan Pembayaran</span>
        </a>

    @endif
</nav>

</div>
