@extends('layouts.main')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> <i class="bi bi-justify"></i> Data Paket Catering</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-5">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Nama Penerima</th>
                                <td>:</td>
                                <td>{{ $transaksi->nama }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>{{ $transaksi->alamat }}</td>
                            </tr>
                            <tr>
                                <th>No HP/WA</th>
                                <td>:</td>
                                <td>{{ $transaksi->kontak }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pembeli</th>
                                <td>:</td>
                                <td>{{ $transaksi->user_id }}</td>
                            </tr>
                            <tr>
                                <th>Status Transaksi</th>
                                <td>:</td>
                                <td>
                                    @if ($transaksi->status == "Valid")
                                    <a href="" class="btn btn-success btn-sm rounded-pill">
                                        {{ $transaksi->status }}
                                    </a>
                                    @elseif ($transaksi->status == "Validasi")
                                    <a href="" class="btn btn-warning btn-sm rounded-pill">
                                        {{ $transaksi->status }}
                                    </a>
                                    @elseif ($transaksi->status == "Gagal")
                                    <a href="" class="btn btn-danger btn-sm rounded-pill">
                                        {{ $transaksi->status }}
                                    </a>
                                    @elseif ($transaksi->status == "Belum Bayar")
                                    <a href="" class="btn btn-danger btn-sm rounded-pill">
                                        {{ $transaksi->status }}
                                    </a>
                                    @elseif ($transaksi->status == "Diproses")
                                    <a href="" class="btn btn-danger btn-sm rounded-pill">
                                        {{ $transaksi->status }}
                                    </a>
                                    @elseif ($transaksi->status == "Dikirim")
                                    <a href="" class="btn btn-danger btn-sm rounded-pill">
                                        {{ $transaksi->status }}
                                    </a>
                                    @elseif ($transaksi->status == "Diambil")
                                    <a href="" class="btn btn-danger btn-sm rounded-pill">
                                        {{ $transaksi->status }}
                                    </a>
                                    @elseif ($transaksi->status == "Diterima")
                                    <a href="" class="btn btn-danger btn-sm rounded-pill">
                                        {{ $transaksi->status }}
                                    </a>
                                    @elseif ($transaksi->status == "Pesanan Selesai")
                                    <a href="" class="btn btn-danger btn-sm rounded-pill">
                                        {{ $transaksi->status }}
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengiriman</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_pengiriman)->isoFormat('dddd, D MMMM Y') }}</td>
                            </tr>
                            <tr>
                                <th>Waktu Pengiriman</th>
                                <td>:</td>
                                <td>{{ $transaksi->waktu_pengiriman }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pemesanan</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($transaksi->create_at)->isoFormat('dddd, D MMMM Y') }}</td>
                            </tr>
                            <tr>
                                <th>Buktu Pembayaran</th>
                                <td>:</td>
                                <td>
                                    <img src="{{ asset('storage/' .$transaksi->bukti_pembayaran) }}" alt="Bukti Transaksi" width="200px">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Pesanan</th>
                                    <th>Jenis</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($detail as $item)
                                <tr>
                                    <td class="text-center">{{$no}}</td>
                                    <td>{{$item->menu->nama_paket}}</td>
                                    <td>{{$item->menu->categorys->category}}</td>
                                    <td>{{rupiah($item->menu->harga)}}</td>
                                    <td>{{$item->kuantitas}}</td>
                                    <td>{{rupiah($item->total_harga)}}</td>
                                </tr>
                                <?php $no++ ?>
                                @endforeach
                            </tbody>
                            <tr>
                                <th colspan="5" class=" text-center">Total</th>
                                <td>{{ rupiah($transaksi->total_transaksi) }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('set.status', $transaksi->id) }}?status=Valid" class="btn btn-success rounded-pill">
                            <i class="bi bi-check2-circle mt-1"></i> Valid
                        </a>
                        <a href="{{ route('set.status', $transaksi->id) }}?status=Gagal" class="btn btn-danger rounded-pill">
                            <i class="bi bi-x-circle mt-1"></i> Gagal
                        </a>
                        <a href="{{ route('set.status', $transaksi->id) }}?status=Validasi" class="btn btn-warning rounded-pill">
                            <i class="bi bi-hourglass-split mt-1"></i> Validasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection