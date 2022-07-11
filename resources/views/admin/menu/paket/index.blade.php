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
                            <th>Nama Paket Catering</th>
                            <th class="w-10"> <i class="bi bi-arrow-down-up"></i> Detail Isi Paket</th>
                            <th>Harga (Rp.)</th>
                            <th>Kategori</th>
                            <th>Foto</th>
                            <th class="text-center">Aksi <i class="bi bi-arrow-left-right"></i> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($paket as $item)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td>{{ $item->nama_paket }}</td>
                            <td>{!! $item->menu_paket !!}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->categorys->category }}</td>
                            <td> <img src="{{ asset('storage/' .$item->photo) }}" alt="Paket Menu" width="50" srcset=""> </td>
                            <td class="">
                                <a href="{{ route('paket.edit', $item->id) }}" class="btn btn-info pt-2">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="{{ route('paket.show', $item->id) }}" class="btn btn-info pt-2">
                                    <i class="bi bi-chevron-bar-expand"></i>
                                </a>
                                @csrf
                                <form action="{{ route('paket.destroy', $item->id) }}" method="post">
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
                    {{ $paket->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection