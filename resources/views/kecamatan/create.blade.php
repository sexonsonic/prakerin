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
                            <div class="col">
                                <livewire:keclive />
                            </div>
                            <center>
                                <h2>
                                    <p>-- Data Kecamatan --</p>
                                </h2>
                            </center>


                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <input type="text" name="nama_kecamatan" class="form-control" id="exampleInputPassword1"
                                    placeholder="Nama Kecamatan">
                                @if ($errors->has('nama_kecamatan'))
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
