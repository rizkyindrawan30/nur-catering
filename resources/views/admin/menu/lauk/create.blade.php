@extends('layouts.main')

@section('content')
<div class="page-heading">
    <h3> <i class="bi bi-justify"></i> {{ $title_content }}</h3>
</div>

<div class="page-content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('Lauk.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama_lauk">Nama Lauk</label>
                            <input id="nama_lauk" type="text" name="nama_lauk" class="form-control @error('nama_lauk') is-invalid @enderror" value="{{ old('nama_lauk') }}">
                            @error('nama_lauk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="harga">Harga (Rp.)</label>
                            <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" value="{{ old('harga') }}" placeholder="Jumlah order...">
                            @error('harga')
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
                            <label for="list">List Menu</label>
                            <input id="list" type="hidden" name="list" value="{{ old('list') }}">
                            <trix-editor input="list" class="@error('list') is-invalid @enderror"></trix-editor>
                            @error('list')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
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

    <script>
        function previewImage() {
            const image = document.querySelector('#foto');
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