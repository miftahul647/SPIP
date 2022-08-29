<nav class="navbar navbar-expand-lg bg-white navbar-aclc">
    <div class="container">
        <a class="navbar-brand" href={{ route('home') }}>
            <img src="images/logo_jardik.png" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href={{ route('home') }}>Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pendidikan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sekolah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Survey</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
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
                {{-- <div class="nav-item">
              Hi, {{ Auth::user()->name }}
              <a class="btn btn-outline-aclc px-5 d-block" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div> --}}
                <ul class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
							Hi, {{ Auth::user()->name }}
                            <img src="/images/icon-user.png" alt="" class="rounded-circle ms-3 profile-picture" />
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href={{ route('admin') }} class="dropdown-item">Dashboard</a>
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
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
