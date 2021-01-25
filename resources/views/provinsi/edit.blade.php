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
                        <p>Edit Data Provinsi</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('provinsi.update', $provinsi->id) }}" method="POST">
                        <input type="hidden" name="_method" value="put">
                        @csrf
                            <div class="form-group">
                                <label for="">Kode Provinsi</label>
                                <input type="text"name="kode_provinsi" class="form-control" id="exampleInputEmail1"  value="{{ $provinsi->kode_provinsi }}">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Provinsi</label>
                                <input type="text" name="nama_provinsi" class="form-control" id="exampleInputPassword1" value="{{ $provinsi->nama_provinsi }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection