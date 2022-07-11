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
                    <form action="" method="post"></form>
                    <h1 class="display-5 mb-4">{{ $paket->nama_paket }}</h1>

                    <h6 class="lead mb-2">Detail isi paket:{!! $paket->menu_paket !!}</h6>
                    <h6 class="lead">Harga: Rp.{{ $paket->harga}}</h6>

                    @if ($paket->category_id == 1)
                    <input type="number" class="form-control" min="3" name="" value="3" />
                    @elseif ($paket->category_id == 2)
                    <input type="number" min="10" name="" value="10" />
                    @elseif ($paket->category_id == 1)
                    <input type="number" class="form-control" min="1" name="" value="1" />
                    @endif
                    <br>
                    <a href="#" class="btn btn-primary rounded-pill mt-3">Masukkan Keranjang</a>



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


    <script>
        $(document).on('click', '.number-spinner button', function() {
            var btn = $(this),
                oldValue = btn.closest('.number-spinner').find('input').val().trim(),
                newVal = 0;

            if (btn.attr('data-dir') == 'up') {
                newVal = parseInt(oldValue) + 1;
            } else {
                if (oldValue > 1) {
                    newVal = parseInt(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            btn.closest('.number-spinner').find('input').val(newVal);
        });
    </script>
    @include('layouts.user.script')
</body>

</html>