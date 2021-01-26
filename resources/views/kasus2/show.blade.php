@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <p>Tampil Data Kasus</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('kasus2.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama Provinsi</label>
                                <input type="text" name="nama_provinsi" class="form-control" id="exampleInputPassword1" value="{{$kasus2->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kota / Kabupaten</label>
                                <input type="text" name="nama_kota" class="form-control" id="exampleInputPassword1" value="{{$kasus2->rw->kelurahan->kecamatan->kota->nama_kota}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <input type="text" name="nama_kecamatan" class="form-control" id="exampleInputPassword1" value="{{$kasus2->rw->kelurahan->kecamatan->nama_kecamatan}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kelurahan / Desa</label>
                                <input type="text" name="nama_Kelurahan" class="form-control" id="exampleInputPassword1" value="{{$kasus2->rw->kelurahan->nama_kelurahan}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">RW</label>
                                <input type="text"name="nama" class="form-control" id="exampleInputEmail1"  value="{{$kasus2->rw->nama}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Positif</label>
                                <input type="text" name="jml_positif" class="form-control" id="exampleInputEmail1"  value="{{$kasus2->jml_positif}} Orang" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Meninggal</label>
                                <input type="text"name="jml_meninggal" class="form-control" id="exampleInputEmail1"  value="{{$kasus2->jml_meninggal}} Orang" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Sembuh</label>
                                <input type="text"name="jml_Sembuh" class="form-control" id="exampleInputEmail1"  value="{{$kasus2->jml_sembuh}} Orang" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="text"name="tanggal" class="form-control" id="exampleInputEmail1"  value="{{$kasus2->tanggal}}" readonly>
                            </div>
                            <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection