<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="">
            <div class="d-flex justify-content-center mt-5">
                <img src="{{ asset('assets/images/logo/2nur catering.png') }}" width="100px">
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
                <br>
            </div>
            <p class="d-flex justify-content-center font-extrabold mt-3">Sistem Informasi Nur Catering</p>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title font-weight-normal">Dashboard</li>
                <li class="sidebar-item {{ ($title === "Dashboard") ? 'active' : '' }}">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title font-weight-normal">Paket</li>
                <li class="sidebar-item has-sub {{ ($title === "Menu"||$title === "Input Menu Paket"||$title === "Edit Menu Paket") ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-card-checklist"></i>
                        <span>Paket Catering</span>
                    </a>
                    <ul class="submenu {{ ($title === "Menu Paket"||$title === "Input Menu Paket"||$title === "Edit Menu Paket") ? 'active' : '' }}">
                        <li class="submenu-item {{ ($title === "Menu Paket") ? 'active' : '' }}">
                            <a href="{{ route('paket.index') }}">Tampil Paket Catering</a>
                        </li>
                        <li class="submenu-item {{ $title === "Input Menu Paket" ? 'active' : '' }}">
                            <a href="{{ route('paket.create') }}">Tambah Paket Catering</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title font-weight-normal">Lauk</li>
                <li class="sidebar-item has-sub {{ ($title === "Lauk"||$title === "Input Lauk"||$title === "Edit Lauk") ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-slack"></i>
                        <span>Data Lauk</span>
                    </a>
                    <ul class="submenu {{ ($title === "Data Lauk"||$title === "Input Data Lauk"||$title === "Edit Data Lauk") ? 'active' : '' }}">
                        <li class="submenu-item {{ ($title === "Data Lauk") ? 'active' : '' }}">
                            <a href="{{ route('Lauk.index') }}">Tampil Data Lauk</a>
                        </li>
                        <li class="submenu-item {{ $title === "Data Lauk" ? 'active' : '' }}">
                            <a href="{{ route('Lauk.create') }}">Tambah Data Lauk</a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-title font-weight-normal">Penjualan</li>
                <li class="sidebar-item has-sub {{ ($title === "Laporan"||$title === "Input Laporan Penjualan"||$title === "Edit Laporan Penjualan") ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-calculator-fill"></i>
                        <span>Laporan Penjualan</span>
                    </a>
                    <ul class="submenu {{ ($title === "Laporan Penjualan"||$title === "Input Laporan Penjualan"||$title === "Edit Laporan Penjualan") ? 'active' : '' }}">
                        <li class="submenu-item {{ ($title === "Laporan Penjualan") ? 'active' : '' }}">
                            <a href="{{ route('LaporanPenjualan.index') }}">Tampil Laporan Penjualan</a>
                        </li>
                        <li class="submenu-item {{ $title === "Input Laporan Penjualan" ? 'active' : '' }}">
                            <a href="{{ route('LaporanPenjualan.create') }}">Tambah Laporan Penjualan</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title font-weight-normal">Transaksi</li>
                <li class="sidebar-item {{ ($title === "Transaksi") ? 'active' : '' }}">
                    <a href="{{ route('data.transaksi') }}" class='sidebar-link'>
                        <i class="bi bi-calculator-fill"></i>
                        <span>Transaksi</span>
                    </a>
                </li>

                <!-- <li class="sidebar-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                            <button type="submit" class="btn btn-primary btn-lg btn-block btn-icon-split" id="btn-logout">
                                <span>Logout</span>
                            </button>
                        </div>
                    </form>
                </li> -->
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>