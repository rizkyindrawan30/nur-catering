@extends('layouts.main')

@section('content')


<div class="page-content">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"> <i class="bi bi-justify"></i> Data Lauk</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th class="w-5 text-center"> <i class="bi bi-outlet"></i> </th>
                            <th>Nama Lauk</th>
                            <th>List Menu</th>
                            <th>Harga (Rp.)</th>
                            <th>Aksi <i class="bi bi-arrow-left-right"></i> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($lauk as $item)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td>{{ $item->nama_lauk}}</td>
                            <td>{!! $item->list !!}</td>
                            <td>{{ $item->harga}}</td>
                            <!-- <td><img src="{{ asset('storage/' .$item->foto) }}" alt="Lauk" width="50" srcset=""></td> -->
                            <td class="">
                                <form action="{{ route('Lauk.destroy', $item->id) }}" method="post">
                                    <a href="{{ route('Lauk.edit', $item->id) }}" class="btn btn-info pt-2">
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
                    {{ $lauk->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection