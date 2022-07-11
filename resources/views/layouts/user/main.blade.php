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

    <!-- Slide Bar -->
    @include('layouts.user.slidebar')

    <!-- Paket Start -->
    <div id="layanan" class="container-fluid bg-light bg-icon my-5 py-6">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Layanan Kami</h1>
                        <p>Harga Paket untuk 1 orang</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#nasikotak">Nasi Kotak</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#nasikuning">Nasi Kuning</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#nasibungkus">Nasi Bungkus</a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#nasitumpeng">Tumpeng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="nasikotak" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @foreach ($kotak as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('storage/'. $item->photo) }}" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4 border border-success">
                                    <a class="d-block h5 mb-2" href="{{ route('detail-paket', $item->id) }}#detail">{{ $item->nama_paket }}</a>
                                    <span class="text-primary me-1">{{ rupiah($item->harga) }}</span>
                                </div>
                                <div class="d-flex justify-content-center border border-warning">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="{{ route('detail-paket', $item->id) }}#detail"><i class="fa fa-eye text-primary me-2"></i>Detail Paket</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="nasikuning" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach ($bungkus as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('storage/'. $item->photo) }}" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4 border border-success">
                                    <a class="d-block h5 mb-2" href="{{ route('detail-paket', $item->id) }}">{{ $item->nama_paket }}</a>
                                    <span class="text-primary me-1">{{ rupiah($item->harga) }}</span>
                                </div>
                                <h6 class="lead" hidden>{{ $item->categorys->category }}</h6>
                                <div class="d-flex justify-content-center border border-warning">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="{{ route('detail-paket', $item->id) }}"><i class="fa fa-eye text-primary me-2"></i>Detail Paket</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="nasibungkus" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach ($bungkus as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('storage/'. $item->photo) }}" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4 border border-success">
                                    <a class="d-block h5 mb-2" href="{{ route('detail-paket', $item->id) }}">{{ $item->nama_paket }}</a>
                                    <span class="text-primary me-1">{{ rupiah($item->harga) }}</span>
                                </div>
                                <h6 class="lead" hidden>{{ $item->categorys->category }}</h6>
                                <div class="d-flex justify-content-center border border-warning">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="{{ route('detail-paket', $item->id) }}"><i class="fa fa-eye text-primary me-2"></i>Detail Paket</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="nasitumpeng" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @foreach ($tumpeng as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('storage/'. $item->photo) }}" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4 border border-success">
                                    <a class="d-block h5 mb-2" href="{{ route('detail-paket', $item->id) }}">{{ $item->nama_paket }}</a>
                                    <span class="text-primary me-1">{{ rupiah($item->harga) }}</span>
                                </div>
                                <h6 class="lead" hidden>{{ $item->categorys->category }}</h6>
                                <div class="d-flex justify-content-center border border-warning">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="{{ route('detail-paket', $item->id) }}"><i class="fa fa-eye text-primary me-2"></i>Detail Paket</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Paket End -->

    <!-- Menu Start -->
    <div id="menu" class="container-fluid bg-light bg-icon py-6 mb-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Menu</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($lauk as $item )
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <h3 class="mb-4 text-center">{{$item->nama_lauk}}</h3>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="mb-1">{!!$item->list!!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Menu End -->

    <!-- Hubungi Start -->
    <div id="hubungikami" class="container-xxl py-5">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Hubungi Kami</h1>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 border border-light shadow-lg text-center">
                <!-- <h4 class="text-light mb-4 text-dark">Address</h4> -->
                <p><i class="fa fa-map-marker-alt me-3 mt-3"></i>Jl. Jalak Putih 5 Atas, NO.29</p>
                <p><i class="fa fa-phone-alt me-3"></i>087 762 763 788</p>
                <!-- <p><i class="fa fa-envelope me-3"></i>info@example.com</p> -->
            </div>
        </div>
    </div>
    <!-- Hubungi End -->

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