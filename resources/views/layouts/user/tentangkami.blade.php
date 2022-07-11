<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nur Catering - Melayani Pesan Antar Catering</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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

    <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <h1 class="display-5 mb-3">Tentang Kami</h1>
    </div>

    <div class="container">
        <h3 class=" text-black">Masih bingung pesan makan catering?</h3>
        <h5 class="d-flex justify-content font-weight-normal" style="color:#696969; "> Anda tinggal di kawasan Singaraja? Akan menggelar Acara,
            tapi tak ada waktu untuk menyiapkan hidangan? Jangan khawatir lagi !!
            Kami hadir untuk berkontribusi menyiapkan hidangan. Sudah berpengalaman dalam menjalani bisnis kuliner
            tak perlu cemas lagi serahkan semua pada Nur Catering.
        </h5>
    </div>
    <br></br>
    <div class="container">
        <h3 class=" text-black">Tentang Nur Catering</h3>
        <h5 class="d-flex justify-content font-weight-normal" style="color:#696969; "> Nur Catering telah melayani berbagai pesanan Catering dari Tahun 2015, kami selalu
            menggunakan bahan-bahan yang segar dan berkualitas serta alat-alat pendukung yang sudah terjamin bebas dari kuman.
            Bagi anda yang ingin bekerja dengan Nur Catering bisa, Hubungi kami di nomor WhatsApp 087 762 763 788, atau datangi alamat kami, Jl. Jalak Putih 5atas, No.29, Kalurahan Banyuasri, Kecamatan Buleleng, Bali.
        </h5>
    </div>
    <br></br>
    <div class="container">
        <h3 class=" text-black">Nur Catering, Menyediakan</h3>
        <h5 class="d-flex justify-content font-weight-normal" style="color:#696969; "> Nur Catering menyediakan pesanan, Nasi Kotak, Nasi Bungkus dan Tumpeng</h5>
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
</body>

</html>