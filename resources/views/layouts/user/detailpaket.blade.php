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

    @include('layouts.user.slidebar')

    <div class="container" id="detail">
        <h1 class=" mt-5 text-center">Detail Paket</h1>
    </div>
    <div class="container-xxl py-2 align-content-center">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-2 pe-0">
                        <img class="img-fluid align-content-center" src="{{ asset('storage/' . $paket->photo) }}" width="500px">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">{{ $paket->nama_paket }}</h1>

                    <h6 class="lead mb-2">Detail isi paket:{!! $paket->menu_paket !!}</h6>
                    <h6 class="lead">Harga: {{ rupiah($paket->harga) }}</h6>

                    <!-- <a href="{{ route('cart', $paket->id) }}" class="btn btn-primary rounded-pill px-4 mt-3">Pesan Sekarang</a> -->
                    <!-- Button trigger modal -->
                    <a href="{{ route('cart', $paket->id) }}" class="btn btn-primary rounded-pill px-4 mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Masukkan Keranjang
                    </a>
                    <a href="{{ route('checkout', $paket->id) }}" class="btn btn-primary rounded-pill px-4 mt-3" data-bs-toggle="modal" data-bs-target="#pesan">
                        Pesan Sekarang
                    </a>

                    <!-- Modal Pesan Sekarang -->
                    <div class="modal fade" id="pesan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Pesan Sekarang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('pesan.sekarang') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img class="img-fluid align-content-center" src="{{ asset('storage/' . $paket->photo) }}" width="300px">
                                            </div>
                                            <div class="col-lg-6">
                                                <!-- hidden -->
                                                <input type="text" name="user_id" value="{{ Auth::guard('user')->user()->id }}" hidden>
                                                <input type="text" name="menu_id" value="{{ $paket->id }}" hidden>
                                                <br>
                                                <!-- <input type="text" name="status" value="keranjang" disabled> -->
                                                <input type="number" name="harga" value="{{ $paket->harga }}" hidden>
                                                <!-- tampilan -->
                                                <h1 class="display-5 mb-4">{{ $paket->nama_paket }}</h1>
                                                <h6 class="lead mb-2">Detail isi paket:{!! $paket->menu_paket !!}</h6>
                                                <h6 class="lead">Harga: {{ rupiah($paket->harga)}}</h6>
                                                @if ($paket->category_id == 1)
                                                <div class="input-group quantity w-50">
                                                    <!-- Kurang Nomor-->
                                                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                        <span class="input-group-text btn-primary">-</span>
                                                    </div>
                                                    <input type="text" id="item_id" class="qty-input form-control kuantitas" name="kuantitas" maxlength="3" min="3" value="3">
                                                    <!-- Tambah Nomor -->
                                                    <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                                        <span class="input-group-text btn-primary">+</span>
                                                    </div>
                                                </div>
                                                @elseif ($paket->category_id == 2)
                                                <div class="input-group quantity w-50">
                                                    <!-- Kurang Nomor-->
                                                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                        <span class="input-group-text btn-primary">-</span>
                                                    </div>
                                                    <input type="text" id="item_id" class="qty-input form-control kuantitas" name="kuantitas" maxlength="3" min="10" value="10">
                                                    <!-- Tambah Nomor -->
                                                    <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                                        <span class="input-group-text btn-primary">+</span>
                                                    </div>
                                                </div>
                                                @elseif ($paket->category_id == 3)
                                                <div class="input-group quantity w-50">
                                                    <!-- Kurang Nomor-->
                                                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                        <span class="input-group-text btn-primary">-</span>
                                                    </div>
                                                    <input type="text" id="item_id" class="qty-input form-control kuantitas" name="kuantitas" maxlength="3" min="1" value="1">
                                                    <!-- Tambah Nomor -->
                                                    <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                                        <span class="input-group-text btn-primary">+</span>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Keranjang -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Masukkan Keranjang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('addcart') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img class="img-fluid align-content-center" src="{{ asset('storage/' . $paket->photo) }}" width="300px">
                                            </div>
                                            <div class="col-lg-6">
                                                <!-- hidden -->
                                                <input type="text" name="user_id" value="{{ Auth::guard('user')->user()->id }}" hidden>
                                                <input type="text" name="menu_id" value="{{ $paket->id }}" hidden>
                                                <br>
                                                <!-- <input type="text" name="status" value="keranjang" disabled> -->
                                                <input type="number" name="harga" value="{{ $paket->harga }}" hidden>
                                                <!-- tampilan -->
                                                <h1 class="display-5 mb-4">{{ $paket->nama_paket }}</h1>
                                                <h6 class="lead mb-2">Detail isi paket:{!! $paket->menu_paket !!}</h6>
                                                <h6 class="lead">Harga: {{ rupiah($paket->harga)}}</h6>
                                                @if ($paket->category_id == 1)
                                                <div class="input-group quantity w-50">
                                                    <!-- Kurang Nomor-->
                                                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                        <span class="input-group-text btn-primary">-</span>
                                                    </div>
                                                    <input type="text" id="item_id" class="qty-input form-control kuantitas" name="kuantitas" maxlength="3" min="3" value="3">
                                                    <!-- Tambah Nomor -->
                                                    <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                                        <span class="input-group-text btn-primary">+</span>
                                                    </div>
                                                </div>
                                                @elseif ($paket->category_id == 2)
                                                <div class="input-group quantity w-50">
                                                    <!-- Kurang Nomor-->
                                                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                        <span class="input-group-text btn-primary">-</span>
                                                    </div>
                                                    <input type="text" id="item_id" class="qty-input form-control kuantitas" name="kuantitas" maxlength="3" min="3" value="10">
                                                    <!-- Tambah Nomor -->
                                                    <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                                        <span class="input-group-text btn-primary">+</span>
                                                    </div>
                                                </div>
                                                @elseif ($paket->category_id == 3)
                                                <div class="input-group quantity w-50">
                                                    <!-- Kurang Nomor-->
                                                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                        <span class="input-group-text btn-primary">-</span>
                                                    </div>
                                                    <input type="text" id="item_id" class="qty-input form-control kuantitas" name="kuantitas" maxlength="3" min="1" value="1">
                                                    <!-- Tambah Nomor -->
                                                    <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                                        <span class="input-group-text btn-primary">+</span>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary">Masukkan Kerajang</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <!-- Plus Minus -->
    <script>
        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();
                var incre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(incre_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 1000) {
                    value++;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }
                $('.qty-input').trigger('change');
            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var decre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(decre_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }
                $('.qty-input').trigger('change');
            });
        });
    </script>
</body>

</html>