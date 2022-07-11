<header>
    <nav class="navbar navbar-expand navbar-light" style="background-color: #87CEEB;">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown me-3">
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-black">Selamat Datang</h6>
                                <h6 class="font-weight-normal">{{ Auth::guard('admin')->user()->name }}</h6>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    <img src="{{ asset('storage/' .auth()->user()->photo) }}">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">Hallo, {{ Auth::guard('admin')->user()->name }}</h6>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('profil.detail', Auth::guard('admin')->user()->id) }}"><i class="icon-mid bi bi-person me-2"></i>Profil</a></li>
                        <li><a class="dropdown-item" href="{{ route('edit.profil', Auth::guard('admin')->user()->id) }}"><i class="bi bi-gear-wide-connected me-2"></i>Setting</a></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout
                                </button>
                                <!-- <a class="dropdown-item" href="#"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a> -->
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>