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
                            <div class="col">
                                <livewire:kellive />
                            </div>
                            <center>
                                <h2>
                                    <p>-- Data Kelurahan --</p>
                                </h2>
                            </center>

                            <div class="form-group">
                                <label for="">Nama Kelurahan</label>
                                <input type="text" name="nama_kelurahan" class="form-control" id="exampleInputPassword1"
                                    placeholder="Nama Kelurahan">
                                @if ($errors->has('nama_kelurahan'))
                                    <span class="text-danger">{{ $errors->first('nama_kelurahan') }}</span>
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
