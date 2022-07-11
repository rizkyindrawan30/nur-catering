<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn mb-3 mt-5 me-5" data-wow-delay="0.1s">
        <a href="/" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">Nur <span class="text-secondary">Cate</span>ring</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse me-5" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('home') }}#layanan" class="nav-item nav-link active text-dark">Layanan Kami</a>
                <a href="#menu" class="nav-item nav-link text-dark">Menu</a>
                <a href="{{ route('about') }}" class="nav-item nav-link text-dark">Tentang Kami</a>
                <a href="{{ route('home') }}#hubungikami" class="nav-item nav-link text-dark">Hubungi Kami</a>
            </div>
            @auth
            <div class="d-none d-lg-flex">
                <!-- <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                    <small class="fa fa-search text-body"></small>
                </a> -->
                <div class="nav-item dropdown">
                    <a class="btn-sm-square bg-white rounded-circle ms-3 nav-link" href="#">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">{{ Auth::guard('user')->user()->name }}</a>
                        <a href="#" class="dropdown-item">Setting</a>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </div>
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="{{ route('cart') }}">
                    <small class="fa fa-shopping-bag text-body"></small>
                </a>
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="{{ route('transaksi.index') }}">
                    <small class="fa fa-money-bill text-body"></small>
                </a>
            </div>
            @else
            <div class="d-none d-lg-flex ms-2">
                <a class="btn btn-outline-primary border-2 rounded-pill" href="/login">Masuk</a>
                <!-- <a class="btn btn-outline-primary border-2 rounded-pill ms-3" href="/register">Daftar</a> -->
            </div>
            @endauth
        </div>
    </nav>
</div>