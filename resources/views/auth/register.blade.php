<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="">
                        <img src="assets/images/logo/2nur catering.png" width="200px">
                    </div>
                    <h4 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold">Nur Catering</span></h4>
                    <p class="text-muted">Silakan Register Telebih dahulu</p>

                    <form action="/register" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="name" class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('name') }}">
                            <div class="form-control-icon @error('name') pb-4 @enderror">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                            <div class="form-control-icon @error('email') pb-4 @enderror">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <select name="gender" class="form-control form-control-xl @error('gender') is-invalid @enderror" id="basicSelect">
                                <option value="">Jenis Kelamain</option>
                                @foreach ($genders as $item)
                                <option value="{{ $item->id }}" {{ old('gender') == $item->id ? 'selected' : null }}>
                                    {{ $item->gander }}
                                </option>
                                @endforeach
                            </select>
                            <div class="form-control-icon @error('gender') pb-4 @enderror">
                                <i class="bi bi-people"></i>
                            </div>
                            @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password">
                            <div class="form-control-icon @error('password') pb-4 @enderror">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Register</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Sudah memiliki akun ? <a href="/login" class="font-bold">Masuk</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>

    </div>
</body>

</html>