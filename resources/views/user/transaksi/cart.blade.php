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
        <h2 class="mt-5">Keranjang</h2>
    </div>
    <div class="container-xxl py-2 align-content-center">
        <div class="row g-5 pt-5">
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.1s">
                @if (count($cart) > 0)
                @foreach ($cart as $index => $item)
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-start">
                                <img src="{{ asset('storage/' .$item->menu->photo) }}" width="70px" alt="foto menu" class="ms-4 rounded">
                                <div class="d-flex flex-column bd-highlight ms-4">
                                    <span class="bd-highlight">{{ $item->menu->nama_paket }}</span>
                                    <span class="bd-highlight">{{ $item->menu->categorys->category }}</span>
                                    <span class="bd-highlight">Jumlah : {{ $item->kuantitas }}</span>
                                </div>
                                <div class="d-flex flex-column bd-highlight ms-4">
                                    <span class="bd-highlight">{{ rupiah($item->menu->harga) }}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-end">
                                <form action="{{ route('cart.delete', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                <span class="border border-left bg-dark border-dark h-50 ms-2 me-2"></span>
                                <a href="{{ route('cart.edit', $item->id) }}" class="btn btn-primary">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center mt-4">
                    <a href="{{ route('home')}}#layanan" class="btn btn-info bd-highlight rounded-pill w-25">Belanja Lagi</a>
                </div>
                @elseif (count($cart) == 0)
                <div class="d-flex justify-content-center align-content-center flex-column bd-highlight">
                    <div class="d-flex justify-content-center">
                        <h3 class="card-title">Keranjang Kosong</h3>
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('assets/images/Wavy_Bus-26_Single-11.jpg') }}" width="300px" alt="">
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <a href="{{ route('home')}}#layanan" class="btn btn-info bd-highlight rounded-pill w-25">Cari Menu</a>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="card">
                    <div class="card-body p-4">
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
                            <a href="{{ route('checkout') }}" class="btn btn-primary rounded-pill px-5 py-2">CheckOut</a>
                        </div>
                    </div>
                </div>
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