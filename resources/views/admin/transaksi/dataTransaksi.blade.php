@extends('layouts.main')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> <i class="bi bi-justify"></i> Data Paket Catering</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th class="w-5 text-center"><i class="bi bi-outlet"></i> </th>
                            <th>Kode Transaksi</th>
                            <th>Nama Penerima</th>
                            <th>Alamat</th>
                            <th>No HP/WA</th>
                            <th>Total Transaksi</th>
                            <th>Status</th>
                            <th class="text-center">Aksi <i class="bi bi-arrow-left-right"></i> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data_transaksi as $item)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td>{{ $item->transaksi_kode }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->kontak }}</td>
                            <td>{{ rupiah($item->total_transaksi) }}</td>
                            <td>
                                @if ($item->status == "Validasi")
                                <a class="btn btn-warning btn-sm rounded-pill">
                                    <i class="bi bi-hourglass-split mt-1"></i>
                                    {{ $item->status }}
                                </a>
                                @elseif ($item->status == "Gagal")
                                <a class="btn btn-danger btn-sm rounded-pill">
                                    <i class="bi bi-x-circle mt-1"></i>
                                    {{ $item->status }}
                                </a>
                                @elseif ($item->status == "Belum Bayar")
                                <a class="btn btn-danger btn-sm rounded-pill">
                                    <i class="bi bi-x-circle mt-1"></i>
                                    {{ $item->status }}
                                </a>
                                @elseif ($item->status == "Valid")
                                <a class="btn btn-success btn-sm rounded-pill">
                                    <i class="bi bi-check2-circle mt-1"></i>
                                    {{ $item->status }}
                                </a>
                                @endif
                            </td>
                            <td class=" d-flex justify-content-center">
                                @if ($item->status == "Validasi")
                                <a href="{{ route('set.status', $item->id) }}?status=Valid" class="btn btn-success me-2">
                                    <i class="bi bi-check2-circle"></i>
                                </a>
                                <a href="{{ route('set.status', $item->id) }}?status=Gagal" class="btn btn-danger me-2">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                                @elseif ($item->status == "Valid")
                                <a href="{{ route('set.status', $item->id) }}?status=Diproses" class="btn btn-success me-2">
                                    <i class="bi bi-check2-circle"></i>
                                </a>
                                @elseif ($item->status == "Diproses")
                                <a href="{{ route('set.status', $item->id) }}?status=Dikirim" class="btn btn-danger me-2">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                                @elseif ($item->status == "Diterima")
                                <a href="{{ route('set.status', $item->id) }}?status=Pesanan Selesai" class="btn btn-danger me-2">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                                @endif
                                <a href="{{ route('detail.data.transaksi', $item->id) }}" class="btn btn-info">
                                    <i class=" bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt2 mb2">
                    {{ $data_transaksi->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection