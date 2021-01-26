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
                        <p>Tambah Data Kelurahan / Desa</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('kelurahan.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <select name="id_kecamatan" class="form-control">
                                    @foreach ($kecamatan as $data)
                                        <option value="{{$data->id}}">{{$data->nama_kecamatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kode Kelurahan</label>
                                <input type="text"name="kode_kelurahan" class="form-control" id="exampleInputEmail1"  placeholder="Kode Kelurahan">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kelurahan</label>
                                <input type="text" name="nama_kelurahan" class="form-control" id="exampleInputPassword1" placeholder="Nama Kelurahan">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection