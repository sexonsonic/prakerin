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
                        <p>Tambah Data Provinsi</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('provinsi.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="">Kode Provinsi</label>
                                <input type="text"name="kode_provinsi" class="form-control" id="exampleInputEmail1"  placeholder="Kode Provinsi">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Provinsi</label>
                                <input type="text" name="nama_provinsi" class="form-control" id="exampleInputPassword1" placeholder="Nama Provinsi">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection