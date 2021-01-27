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
                        <p>Tambah Data Kota / Kabupaten</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('kota.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama Provinsi</label>
                                <select name="id_provinsi" class="form-control">
                                    @foreach ($provinsi as $data)
                                        <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kode Kota</label>
                                <input type="text"name="kode_kota" class="form-control" id="exampleInputEmail1"  placeholder="Kode Kota">
                                @if($errors->has('kode_kota'))
                                    <span class="text-danger">{{ $errors->first('kode_kota') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kota</label>
                                <input type="text" name="nama_kota" class="form-control" id="exampleInputPassword1" placeholder="Nama Kota">
                                @if($errors->has('nama_kota'))
                                    <span class="text-danger">{{ $errors->first('nama_kota') }}</span>
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