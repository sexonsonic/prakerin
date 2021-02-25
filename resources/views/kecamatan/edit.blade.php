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
                        <p>Edit Data Kecamatan</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="POST">
                        <input type="hidden" name="_method" value="put">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama Provinsi</label>
                                <input type="text" name="nama_provinsi" class="form-control" id="exampleInputPassword1" value="{{$kecamatan->kota->provinsi->nama_provinsi}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kota</label>
                                <select name="id_kota" class="form-control">
                                    @foreach ($kota as $data)
                                        <option value="{{ $data->id }}" {{ $data->id == $kecamatan->id_kota ? "selected" : "" }} >
                                            {{$data->nama_kota}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <input type="text" name="nama_kecamatan" class="form-control" id="exampleInputPassword1" value="{{ $kecamatan->nama_kecamatan }}">
                                @if($errors->has('nama_kecamatan'))
                                    <span class="text-danger">{{ $errors->first('nama_kecamatan') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection