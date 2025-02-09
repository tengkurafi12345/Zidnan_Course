<header class="header">
    <section class="flex">
        <a href="{{ route('dashboard') }}" class="logo">Zidnan Course</a>
        <form action="search.html" method="post" class="search-form">
            <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
            <button type="submit" class="fas fa-search"></button>
        </form>

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
        {{-- <h3 class="name">Rumah Tahfidz</h3>
        <p class="role">& Course</p> --}}
        {{-- <a href="{{ route('profile.edit') }}" class="btn">view profile</a> --}}
    </div>

    <nav class="navbar">
        <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
        <a href="{{ route('packet.index') }}"><i class="fas fa-sitemap"></i><span>Paket</span></a>
        <a href="{{ route('program.index') }}"><i class="fas fa-table"></i><span>Program</span></a>
        <a href="{{ route('teacher.index') }}"><i class="fas fa-chalkboard-user"></i><span>Guru</span></a>
        <a href="{{ route('student.index') }}"><i class="fas fa-child"></i><span>Siswa</span></a>
        <a href="contact.html"><i class="fas fa-headset"></i><span>contact us</span></a>
    </nav>
</div>
