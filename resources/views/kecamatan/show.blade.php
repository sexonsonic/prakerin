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
                        <p>Tampil Data Kecamatan</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('kecamatan.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama Provinsi</label>
                                <input type="text" name="nama_provinsi" class="form-control" id="exampleInputPassword1" value="{{$kecamatan->kota->provinsi->nama_provinsi}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kota</label>
                                <input type="text" name="nama_kota" class="form-control" id="exampleInputPassword1" value="{{$kecamatan->kota->nama_kota}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Kode Kecamatan</label>
                                <input type="text"name="kode_kecamatan" class="form-control" id="exampleInputEmail1"  value="{{$kecamatan->kode_kecamatan}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <input type="text" name="nama_kecamatan" class="form-control" id="exampleInputPassword1" value="{{$kecamatan->nama_kecamatan}}" readonly>  
                            </div>
                            <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection