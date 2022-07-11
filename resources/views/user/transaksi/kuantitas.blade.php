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
        <h2 class="mt-5">Tambah Jumlah Pesanan</h2>
    </div>
    <div class="container-xxl py-2 align-content-center">
        <div class="row g-5 pt-5">
            <div class="col-lg-6 wow fadeIn">
                <img class="img-fluid align-content-center" src="{{ asset('storage/' . $find_cart->menu->photo) }}" width="350px">
            </div>
            <div class="col-lg-6 wow fadeIn">
                <form action="{{ route('cart.update', $find_cart->id) }}" method="post">
                    @csrf
                    @method('put')
                    <!-- <input type="text" name="status" value="keranjang" disabled> -->
                    <input type="number" name="harga" value="{{ $find_cart->harga }}" hidden>
                    <!-- tampilan -->
                    <h1 class="display-5 mb-4">{{ $find_cart->menu->nama_paket }}</h1>
                    <h6 class="lead mb-2">Detail isi paket:{!! $find_cart->menu->menu_paket !!}</h6>
                    <h1 class="display-5 mb-4">{{ $find_cart->menu->nama_find_cart }}</h1>
                    <h6 class="lead">Harga: {{ rupiah($find_cart->menu->harga)}}</h6>
                    <h6 class="lead">Jumlah Saat ini: {{ $find_cart->kuantitas}}</h6>
                    <div class="input-group quantity w-50">
                        <!-- Kurang Nomor-->
                        <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                            <span class="input-group-text btn-primary">-</span>
                        </div>
                        <input type="text" id="item_id" class="qty-input form-control kuantitas" name="kuantitas" maxlength="3" value="{{ $find_cart->kuantitas }}">
                        <!-- Tambah Nomor -->
                        <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                            <span class="input-group-text btn-primary">+</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill mt-4">Tambah Jumlah</button>
                </form>
            </div>
        </div>
    </div>

    <br><br>

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

    <!-- Modal Edit -->


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