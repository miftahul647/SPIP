<nav class="navbar navbar-expand-lg bg-white navbar-aclc">
    <div class="container">
        <a class="navbar-brand" href={{ route('home') }}>
            <img src={{ asset('images/logo_jardik.png') }} alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                        href={{ route('home') }}>
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sekolah*') ? 'active' : '' }}" href="{{ route('sekolah') }}">
                        Sekolah
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"
                        href="{{ route('portal-dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                        role="button" 
                        data-bs-toggle="dropdown"
                    >
                        Program
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('collect-data') }}">Pengumpulan data Survey</a></li>
                    </ul>
                </li>
            </ul>
            @guest
                <div class="nav-item">
                    <a href={{ route('login') }} class="btn btn-outline-aclc px-5 d-block">
                        Login
                    </a>
                </div>
            @endguest


            @auth
                <ul class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            Hi, {{ Auth::user()->name }}
                            <img src="/images/icon-user.png" alt="" class="rounded-circle ms-3 profile-picture" />
                        </a>
                        <?php
                        if (Auth::user()->roles=== 'ADMIN') {
                        ?>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href={{ route('admin') }} class="dropdown-item">Dashboard</a>
                                </li>
                                <li>
                                    <a href={{ route('spip') }} class="dropdown-item">SPIP</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        Settings
                                    </a>

                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>

                                </li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        <?php
                        } else if(Auth::user()->roles === 'USER') {
                           ?>
                           <ul class="dropdown-menu">
                                <li>
                                    <a href={{ route('spip') }} class="dropdown-item">SPIP</a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        Settings
                                    </a>

                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>

                                </li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                           <?php 
                        }
                        ?>
                        
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
