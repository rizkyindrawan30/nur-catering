@extends('layouts.main')

@section('content')
<div class="card">
    <h4 class="card-header text-center">
        {{ $title_content }}
    </h4>

    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <img src="{{ asset('storage/' .$profil->photo) }}" alt="Photo Profil" class=" rounded-2" width="150px">
            </div>
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>{{$profil->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$profil->email}}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>{{$profil->genders->gander}}</td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>{{$profil->phone}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{$profil->adderss}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection