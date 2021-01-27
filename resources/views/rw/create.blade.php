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
                        <p>Tambah Data RW</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('rw.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama Kelurahan</label>
                                <select name="id_kelurahan" class="form-control">
                                    @foreach ($kelurahan as $data)
                                        <option value="{{$data->id}}">{{$data->nama_kelurahan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nomor RW</label>
                                <input type="text"name="nama" class="form-control" id="exampleInputEmail1"  placeholder="Nomor RW">
                                @if($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
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