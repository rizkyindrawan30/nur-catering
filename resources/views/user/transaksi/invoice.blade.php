<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nur Catering - Melayani Pesan Antar Catering</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    @include('layouts.user.style')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    @include('layouts.user.navbar')
    <div class="container">
        <br><br><br><br><br>
        <h2 class="mt-5">Invoice - {{ $transaksi->transaksi_kode }}</h2>
    </div>
    <div class="container-xxl py-2 align-content-center">
        <div class="row">
            <div class="col-lg-5">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Nama Penerima</th>
                            <td>:</td>
                            <td>{{ $transaksi->nama }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td>{{ $transaksi->alamat }}</td>
                        </tr>
                        <tr>
                            <th>No HP/WA</th>
                            <td>:</td>
                            <td>{{ $transaksi->kontak }}</td>
                        </tr>
                        <tr>
                            <th>Nama Pembeli</th>
                            <td>:</td>
                            <td>{{ Auth::guard('user')->user()->name }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengiriman</th>
                            <td>:</td>
                            <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_pengiriman)->isoFormat('dddd, D MMMM Y') }}</td>
                        </tr>
                        <tr>
                            <th>Waktu Pengiriman</th>
                            <td>:</td>
                            <td>{{ $transaksi->waktu_pengiriman }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pemesanan</th>
                            <td>:</td>
                            <td>{{ \Carbon\Carbon::parse($transaksi->create_at)->isoFormat('dddd, D MMMM Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Pesanan</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($detail as $item)
                            <tr>
                                <td class="text-center">{{$no}}</td>
                                <td>{{$item->menu->nama_paket}}</td>
                                <td>{{$item->menu->categorys->category}}</td>
                                <td>{{rupiah($item->menu->harga)}}</td>
                                <td>{{$item->kuantitas}}</td>
                                <td>{{rupiah($item->total_harga)}}</td>
                            </tr>
                            <?php $no++ ?>
                            @endforeach
                        </tbody>
                        <tr>
                            <th colspan="5" class=" text-center">Total</th>
                            <td>{{ rupiah($transaksi->total_transaksi) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card mb-3">
                    <div class="card-header border-top bg-primary">
                        <h5>Bukti Pembayaran</h5>
                    </div>
                    <form action="{{ route('invoice.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="bukti_pembayaran" class="form-label">Uplaod Bukti Pembayaran</label>
                                <input class="form-control @error('bukti_pembayaran') is-invalid @enderror" type="file" name="bukti_pembayaran" id="bukti_pembayaran" multiple>
                                @error('bukti_pembayaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success rounded-pill">Bayar</button>
                        </div>
                    </form>
                </div>
                <div class="card mb-3">
                    <div class=" card-header">
                        <h5>Metode Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <ul>
                            <h5>
                                <li>Transfer Via Bank <img src="https://2.bp.blogspot.com/-lGvmflvsAt0/Vxw8r4FxYLI/AAAAAAAAXCU/_XDIiY_PEz4hpG__6jpxudPBusASFaVgwCLcB/s1600/Logo%2BBRI.png" alt="BRI Logo" width="35px"></li>
                            </h5>
                            <li style="list-style:none;">Pembayaran Catering dapat di transfer via Bank BRI.</li>
                            <li style="list-style:none;" class=" d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <a style="cursor: pointer;" class="" data-bs-toggle="modal" data-bs-target="#rekening">
                                    Lihat Rekening >>
                                </a>
                            </li>
                            <h5>
                                <li>Transfer Via <img src="https://1.bp.blogspot.com/-0kIXQp9QYBU/XytvNioamkI/AAAAAAAAClo/7p_vwM2w36Yp35CiWjpxF72C4tWJBACpgCLcBGAsYHQ/w1200-h630-p-k-no-nu/Logo%2BDana.png" alt="BRI Logo" width="60px"></li>
                            </h5>
                            <li style="list-style:none;">Pembayaran Catering dapat di transfer via Bank Dana.</li>
                            <li style="list-style:none;" class=" d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <a style="cursor: pointer;" class="" data-bs-toggle="modal" data-bs-target="#dana">
                                    Lihat Dana >>
                                </a>
                            </li>
                            <h5>
                                <li>Transfer Via <img src="https://1.bp.blogspot.com/-zqvCZXYnnfA/XciTU6Ikw_I/AAAAAAAABJc/TrUNMleviBsRtXgnDWzFEhZjxN03ET7_gCLcBGAsYHQ/s1600/Logo%2BOVO.png" alt="BRI Logo" width="35px"></li>
                            </h5>
                            <li style="list-style:none;">Pembayaran Catering dapat di transfer via Bank OVO.</li>
                            <li style="list-style:none;" class=" d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <a style="cursor: pointer;" class="" data-bs-toggle="modal" data-bs-target="#ovo">
                                    Lihat OVO >>
                                </a>
                            </li>
                            <h5>
                                <li>Transfer Via <img src="https://www.premiro.com/assets/images/aset/logo_metode/gopay-logo-new.png" alt="BRI Logo" width="80px"></li>
                            </h5>
                            <li style="list-style:none;">Pembayaran Catering dapat di transfer via Bank GoPay.</li>
                            <li style="list-style:none;" class=" d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <a style="cursor: pointer;" class="" data-bs-toggle="modal" data-bs-target="#gopay">
                                    Lihat GoPay >>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="rekening" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nomor Rekening</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>008801062989501</p>
                    <p>Atas Nama Nur Mahendri</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Dana -->
    <div class="modal fade" id="dana" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nomor Dana</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>087762763788</p>
                    <p>Atas Nama Nur Mahendri</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal OVO -->
    <div class="modal fade" id="ovo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nomor OVO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>087762763788</p>
                    <p>Atas Nama Nur Mahendri</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal GoPay -->
    <div class="modal fade" id="gopay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nomor GoPay</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>087762763788</p>
                    <p>Atas Nama Nur Mahendri</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn">
        <div class="container py-5">
            <div class="container-fluid copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; Copyright 2022
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <br>by: Rizky Indrawan Purwanto </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    @include('layouts.user.script')
</body>

</html>