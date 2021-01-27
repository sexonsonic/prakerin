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
                        <p>Tambah Data Kasus</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('kasus2.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="">RW</label>
                                <select name="id_rw" class="form-control">
                                    @foreach ($rw as $data)
                                        <option value="{{$data->id}}">{{$data->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Positif</label>
                                <input type="text"name="jml_positif" class="form-control" id="exampleInputEmail1"  placeholder="Jumlah Positif">
                                @if($errors->has('jml_positif'))
                                    <span class="text-danger">{{ $errors->first('jml_positif') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Meninggal</label>
                                <input type="text" name="jml_meninggal" class="form-control" id="exampleInputEmail1"  placeholder="Jumlah Meninggal">
                                @if($errors->has('jml_meninggal'))
                                    <span class="text-danger">{{ $errors->first('jml_meninggal') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Sembuh</label>
                                <input type="text" name="jml_sembuh" class="form-control" id="exampleInputEmail1"  placeholder="Jumlah Sembuh">
                                @if($errors->has('jml_sembuh'))
                                    <span class="text-danger">{{ $errors->first('jml_sembuh') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"  placeholder="Jumlah Sembuh">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection