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
        <h2 class="mt-5">Transaksi</h2>
    </div>
    <div class="container-xxl py-2 align-content-center">
        <div class="row">
            @foreach ($transaksi as $item)
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-start">
                                <img src="{{ asset('storage/'. $photo->menu->photo) }}" alt="" width="100px">
                                <div class="d-flex flex-column bd-highlight ms-4">
                                    <span class="bd-highlight">{{ $item->transaksi_kode }}</span>
                                    <span class="bd-highlight">{{ rupiah($item->total_transaksi) }}</span>
                                    <span class="bd-highlight">
                                        <a class="btn btn-warning rounded-pill">
                                            <i class=" fa fa-spin fa-spinner"></i> {{ $item->status }}
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-end">
                                <!-- <form action="{{ route('cart.delete', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form> -->
                                <a href="{{ route('transaksi.detail', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
</body>

</html>