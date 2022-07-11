@extends('layouts.main')

@section('content')


<div class="page-content">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> <i class="bi bi-justify"></i> Data Laporan Pengeluaran & Pendapatan</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th class="w-5 text-center"> <i class="bi bi-outlet"></i> </th>
                            <th>Nama Order</th>
                            <th><i class="bi bi-calendar2-week-fill"></i> Tanggal </th>
                            <th>Jumlah Order</th>
                            <th>Pengeluaran(Rp.)</th>
                            <th>Pendapatan(Rp.)</th>
                            <th>Keuntungan <i class="bi bi-arrow-repeat"></i> </th>
                            <th class="text-center">Aksi <i class="bi bi-arrow-left-right"></i> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($laporan as $item)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td>{!! $item->order!!}</td>
                            <td>{{ $item->tanggal}}</td>
                            <td>{{ $item->jumlah_order}}</td>
                            <td>{{ $item->jumlah_pengeluaran}}</td>
                            <td>{{ $item->jumlah_pendapatan}}</td>
                            <td>{{ $item->keuntungan}}</td>
                            <td class="">
                                <form action="{{ route('LaporanPenjualan.destroy', $item->id) }}" method="post">
                                    <a href="{{ route('LaporanPenjualan.edit', $item->id) }}" class="btn btn-info pt-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger pt-2">
                                        <i class="bi bi-x-octagon-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt2 mb2">
                    {{ $laporan->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection