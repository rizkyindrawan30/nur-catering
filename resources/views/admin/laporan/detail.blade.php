@extends('layouts.main')


<div class="page-heading">
    <h3>{{ $title_content }}</h3>
</div>


@section('content')
<div class="card">
    <div class="card-body p-4">
        <div class=" table-responsive">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/' . $paket->photo) }}" class="img-preview border border-primary mb-3 rounded-circle @error('ft') is-invalid @enderror" width="150" height="150">
            </div>
            <table class="table table-striped table-bordered table-hover">
                <tbody>
                    <tr>
                        <td>Nama Paket</td>
                        <td>{{ $paket-> nama_paket }}</td>
                    </tr>
                    <tr>
                        <td>Isi Paket</td>
                        <td>{{ $paket->menu_paket }}</td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>{{ $paket->harga}}</td>
                    </tr>
                    <tr>
                        <td>Tempekan</td>
                        <td>{{ $paket->category_id}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection