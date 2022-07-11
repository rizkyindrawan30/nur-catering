@extends('layouts.main')

@section('content')
<div class="page-heading">
    <h3> <i class="bi bi-justify"></i> {{ $title_content }}</h3>
</div>

<div class="page-content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('LaporanPenjualan.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input id="tanggal" type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
                            @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="jumlah_order">Jumlah order</label>
                            <input type="number" name="jumlah_order" class="form-control @error('jumlah_order') is-invalid @enderror" id="jumlah_order" value="{{ old('jumlah_order') }}" placeholder="Jumlah order...">
                            @error('jumlah_order')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="order">Deskripsi Pengeluaran</label>
                        <input id="order" type="hidden" name="order" value="{{ old('order') }}">
                        <trix-editor input="order" class="@error('order') is-invalid @enderror"></trix-editor>
                        @error('order')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="jumlah_pengeluaran">Pengeluaran</label>
                            <input type="number" name="jumlah_pengeluaran" class="form-control @error('jumlah_pengeluaran') is-invalid @enderror" id="jumlah_pengeluaran" onkeyup="sum();" placeholder="Jumlah Pengeluaran...">
                            @error('jumlah_pengeluaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="jumlah_pendapatan">Pendapatan</label>
                            <input type="number" name="jumlah_pendapatan" class="form-control @error('jumlah_pendapatan') is-invalid @enderror" id="jumlah_pendapatan" onkeyup="sum();" placeholder="Jumlah Pendapatan...">
                            @error('jumlah_pendapatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="keuntungan">Keuntungan</label>
                            <input type="number" name="keuntungan" class="form-control @error('keuntungan') is-invalid @enderror" id="keuntungan" onkeyup="sum();" readonly>
                            @error('keuntungan')
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
            const image = document.querySelector('#photo');
            const imgPreveiw = document.querySelector('.img-preview');

            imgPreveiw.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreveiw.src = oFREvent.target.result;
            }
        }

        function sum() {
            var pendapatan = document.getElementById('jumlah_pendapatan').value;
            var pengeluaran = document.getElementById('jumlah_pengeluaran').value;
            var jumlah = parseInt(pendapatan) - parseInt(pengeluaran);

            if (!isNaN(jumlah)) {
                document.getElementById('keuntungan').value = jumlah;
            }
        }
    </script>
    @endsection