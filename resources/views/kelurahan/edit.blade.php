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
                        <p>Edit Data Kelurahan / Desa</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('kelurahan.update', $kelurahan->id) }}" method="POST">
                        <input type="hidden" name="_method" value="put">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama Provinsi</label>
                                <input type="text" name="nama_provinsi" class="form-control" id="exampleInputPassword1" value="{{$kelurahan->kecamatan->kota->provinsi->nama_provinsi}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kota / Kabupaten</label>
                                <input type="text" name="nama_kota" class="form-control" id="exampleInputPassword1" value="{{$kelurahan->kecamatan->kota->nama_kota}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <select name="id_kecamatan" class="form-control">
                                    @foreach ($kecamatan as $data)
                                        <option value="{{ $data->id }}" {{ $data->id == $kelurahan->id_kecamatan ? "selected" : "" }} >
                                            {{$data->nama_kecamatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kode Kelurahan</label>
                                <input type="text"name="kode_kelurahan" class="form-control" id="exampleInputEmail1"  value="{{ $kelurahan->kode_kelurahan }}">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kelurahan</label>
                                <input type="text" name="nama_kelurahan" class="form-control" id="exampleInputPassword1" value="{{ $kelurahan->nama_kelurahan }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection