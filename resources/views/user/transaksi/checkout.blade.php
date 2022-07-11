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
        <h2 class="mt-5">Checkout</h2>
    </div>
    <div class="container-xxl py-2 align-content-center">
        <form action="{{ route('checkout.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row g-5 pt-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="card mb-3">
                        <div class=" card-header">
                            <h5>Data Pengiriman</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-2">
                                <label for="nama">Nama Penerima</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{old('nama')}}" placeholder="Nama Penerima">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="alamat">Alamat Penerima</label>
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{old('alamat')}}" placeholder="Alamat Penerima">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="kontak">No HP/WA Penerima</label>
                                <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror" id="kontak" value="{{old('kontak')}}" placeholder="kontak">
                                @error('kontak')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="nama_pembeli">Nama Pembeli</label>
                                <input type="text" class="form-control" id="nama_pembeli" value="{{ Auth::guard('user')->user()->name }}" disabled placeholder="Nama Penerima">
                            </div>
                            <div class="row">
                                <div class="form-group mb-2 col-7">
                                    <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
                                    <input type="date" class="form-control @error('tanggal_pengiriman') is-invalid @enderror" name="tanggal_pengiriman" id="tanggal_pengiriman" value="" placeholder="Nama Penerima">
                                    @error('tanggal_pengiriman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-2 col-5">
                                    <label for="waktu_pengiriman">Waktu Pengiriman</label>
                                    <input type="time" class="form-control @error('waktu_pengiriman') is-invalid @enderror" name="waktu_pengiriman" id="waktu_pengiriman" value="" placeholder="Nama Penerima">
                                    @error('waktu_pengiriman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Pengiriman</label><br>
                                <div class="form-check form-check-inline fs-5">
                                    <input class="form-check-input @error('jenis_pengiriman')is-invalid @enderror" type="radio" name="jenis_pengiriman" id="dikirim" value="Dikirim">
                                    <label class="form-check-label" for="dikirim">
                                        <i class="bi bi-truck"></i> Dikirim
                                    </label>
                                </div>
                                <div class="form-check form-check-inline fs-5">
                                    <input class="form-check-input @error('jenis_pengiriman')is-invalid @enderror" type="radio" name="jenis_pengiriman" id="diambil" value="Diambil">
                                    <label class="form-check-label" for="diambil">
                                        <i class="bi bi-house-door"></i> Diambil
                                    </label>
                                </div>
                                @error('jenis_pengiriman')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="card mb-5">
                        <div class="card-header">
                            <h5>Pemesanan</h5>
                        </div>
                        <div class="card-body p-4">
                            @foreach ($cart as $item)
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex justify-content-start">
                                    <img src="{{ asset('storage/' .$item->menu->photo) }}" width="70px" alt="foto menu" class="ms-4 rounded">
                                    <div class="d-flex flex-column bd-highlight ms-4">
                                        <span class="bd-highlight">{{ $item->menu->nama_paket }}</span>
                                        <span class="bd-highlight">{{ $item->menu->categorys->category }}</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="d-flex flex-column bd-highlight ms-4">
                                        <span class="bd-highlight">{{ $item->kuantitas }} item</span>
                                        <span class="bd-highlight">{{ rupiah($item->menu->harga) }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Jumlah Pembelian</h5>
                                <h5 class="card-title">{{ $jumlah }} item</h5>
                                <!-- <h5 class="card-title" id="jum_kuantitas"></h5> -->
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="card-text">Total Harga</h5>
                                <h5 class="card-text" id="total_harga">{{ rupiah($total_harga) }} </h5>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary rounded-pill px-5 py-2">Konfirmasi Pesanan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <br><br>

    <!-- Footer Start -->
    <!-- <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn">
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
    </div> -->
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    @include('layouts.user.script')
    <!-- Script Plus Minus -->
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

            $('.qty-input').change(function() {
                var total = 0;
                $('#total_menu').val(
                    ($('.qty-input').val())
                );
            });
            $('.qty-input').trigger('change');
        });
    </script>
    <script>
        $('input#w3934_txtQantity').before("<input type='button' value='-' class='qtyminus' field='w3934_txtQantity' />");
        $('input#w3934_txtQantity').after("<input type='button' value='+' class='qtyplus' field='w3934_txtQantity' />");

        $('.qtyplus').click(function(e) {
            e.preventDefault();
            fieldName = $(this).attr('field');
            var currentVal = parseInt($('#w3934_txtQantity').val());
            if (!isNaN(currentVal)) {
                $('#w3934_txtQantity').val(currentVal + 10);
            } else {
                $('#w3934_txtQantity').val(0);
            }
            $('#w3934_txtQantity').trigger('change');
        });
        $(".qtyminus").click(function(e) {
            e.preventDefault();
            fieldName = $(this).attr('field');
            var currentVal = parseInt($('#w3934_txtQantity').val());
            if (!isNaN(currentVal) && currentVal > 0) {
                $('#w3934_txtQantity').val(currentVal - 10);
            } else {
                $('#w3934_txtQantity').val(0);
            }
            $('#w3934_txtQantity').trigger('change'); // <----
        });

        // The change handler which I suppose you already have:
        $('#w3934_txtQantity').change(function() {
            $('#w3934_txtSubTotal').val('$' +
                (($('#w3934_txtQantity').val().replace(/\$/, '') *
                    $('#w3934_txtUnitPrice').val().replace(/\$/, '') +
                    +$('#w3934_txtAddlCharges').val().replace(/\$/, '') +
                    +$('#w3934_txtShip').val().replace(/\$/, '')
                ) || 0).toFixed(2)
            );
        });

        $('#w3934_txtQantity').trigger('change');
    </script>
</body>

</html>