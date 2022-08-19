<nav class="navbar navbar-expand-lg bg-white navbar-aclc">
    <div class="container">
      <a class="navbar-brand" href={{ route('home') }}>
        <img src="images/logo_jardik.png" alt="" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href={{ route('home') }}
              >Beranda</a
            >
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
        <div class="nav-item">
          <a href={{ route('login') }} class="btn btn-outline-aclc px-5 d-block">
            Login
          </a >
        </div>
      </div>
    </div>
  </nav>