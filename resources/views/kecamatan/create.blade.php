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
                        <p>Tambah Data Kecamatan</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('kecamatan.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama Kota / Kabupaten</label>
                                <select name="id_kota" class="form-control">
                                    @foreach ($kota as $data)
                                        <option value="{{$data->id}}">{{$data->nama_kota}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kode Kecamatan</label>
                                <input type="text"name="kode_kecamatan" class="form-control" id="exampleInputEmail1"  placeholder="Kode Kecamatan">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <input type="text" name="nama_kecamatan" class="form-control" id="exampleInputPassword1" placeholder="Nama Kecamatan">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection