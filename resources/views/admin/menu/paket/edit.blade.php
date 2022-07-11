@extends('layouts.main')

@section('content')
<div class="page-heading">
    <h3>{{ $title_content }}</h3>
</div>

<div class="page-content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('paket.update', $paket->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama_paket">Nama Paket</label>
                            <input type="text" name="nama_paket" class="form-control @error('nama_paket') is-invalid @enderror" id="nama_paket" value="{{ old('nama_paket', $paket->nama_paket) }}" placeholder="Nama Paket">
                            @error('nama_paket')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="harga">Harga Paket (Rp)</label>
                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" value="{{ old('harga', $paket->harga) }}" placeholder="Harga Paket">
                        </div>
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="category">Categori</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category">
                                <option value="">-- Pilih Categori--</option>
                                @foreach ($categorys as $item)
                                <option value="{{ $item->id }}" {{old('category_id') == $item->id||$paket->category_id == $item->id ? 'selected' : null}}>{{ $item->category }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="menu_paket">Detail Isi Paket</label>
                            <input id="menu_paket" type="hidden" name="menu_paket" value="{{ old('menu_paket', $paket->menu_paket) }}">
                            <trix-editor input="menu_paket" class="@error('menu_paket') is-invalid @enderror"></trix-editor>
                            @error('menu_paket')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="photo" class="form-label">Foto Paket</label>
                        <input type="hidden" name="oldImage" value="{{ $paket->photo }}">
                        @if ($paket->photo)
                        <img src="{{ asset('storage/' .$paket->photo) }}" alt="Menu Paket" class="img-preview img-fluid mb-3 col-sm-3 d-block">
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