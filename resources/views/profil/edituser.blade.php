@extends('layouts.main')

@section('content')
<div class="page-heading">
    <h3>{{ $title_content }}</h3>
</div>

<div class="page-content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profil.update', $profil->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $profil->name) }}" placeholder="name profil">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $profil->email) }}" placeholder="Email profil">
                        </div>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="adderss">Alamat</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="adderss" value="{{ old('adderss', $profil->adderss) }}" placeholder="Alamat">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="phone">No Telepon</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone', $profil->phone) }}" placeholder="No Telepon">
                        </div>
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="photo" class="form-label">Foto Profil</label>
                        <input type="" name="oldImage" value="{{ $profil->photo }}" hidden>
                        @if ($profil->photo)
                        <img src="{{ asset('storage/' .$profil->photo) }}" alt="user image" class="img-preview img-fluid mb-3 col-sm-3 d-block">
                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-3">
                        @endif
                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" onchange="previewImage()" id="photo" multiple>
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#photo');
        const imgPreveiw = document.querySelector('.img-preview');

        imgPreveiw.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreveiw.src = oFREvent.target.result;
        }
    }
</script>
@endsection