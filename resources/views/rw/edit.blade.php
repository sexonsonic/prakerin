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
                        <p>Edit Data RW</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('rw.update', $rw->id) }}" method="POST">
                        <input type="hidden" name="_method" value="put">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama Provinsi</label>
                                <input type="text" name="nama_provinsi" class="form-control" id="exampleInputPassword1" value="{{$rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kota / Kabupaten</label>
                                <input type="text" name="nama_kota" class="form-control" id="exampleInputPassword1" value="{{$rw->kelurahan->kecamatan->kota->nama_kota}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <input type="text" name="nama_kecamatan" class="form-control" id="exampleInputPassword1" value="{{$rw->kelurahan->kecamatan->nama_kecamatan}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kelurahan</label>
                                <select name="id_kelurahan" class="form-control">
                                    @foreach ($kelurahan as $data)
                                        <option value="{{ $data->id }}" {{ $data->id == $rw->id_kelurahan ? "selected" : "" }} >
                                            {{$data->nama_kelurahan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nomor RW</label>
                                <input type="text"name="nama" class="form-control" id="exampleInputEmail1"  value="{{ $rw->nama }}">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection