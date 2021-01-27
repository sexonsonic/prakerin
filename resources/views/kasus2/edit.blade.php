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
                        <p>Edit Data Kasus</p>
                    </div>
                    
                    <div class="card-body">
                        <form action="{{ route('kasus2.update', $kasus2->id) }}" method="POST">
                        <input type="hidden" name="_method" value="put">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama Provinsi</label>
                                <input type="text" name="nama_provinsi" class="form-control" id="exampleInputPassword1" value="{{$kasus2->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kota / Kabupaten</label>
                                <input type="text" name="nama_kota" class="form-control" id="exampleInputPassword1" value="{{$kasus2->rw->kelurahan->kecamatan->kota->nama_kota}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <input type="text" name="nama_kecamatan" class="form-control" id="exampleInputPassword1" value="{{$kasus2->rw->kelurahan->kecamatan->nama_kecamatan}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Nama Kelurahan</label>
                                <input type="text" name="nama_kelurahan" class="form-control" id="exampleInputPassword1" value="{{$kasus2->rw->kelurahan->nama_kelurahan}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">RW</label>
                                <select name="id_rw" class="form-control">
                                    @foreach ($rw as $data)
                                        <option value="{{ $data->id }}" {{ $data->id == $kasus2->id_rw ? "selected" : "" }} >
                                            {{$data->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Positif</label>
                                <input type="text" name="jml_positif" class="form-control" id="exampleInputEmail1"  value="{{ $kasus2->jml_positif }}">
                                @if($errors->has('jml_positif'))
                                    <span class="text-danger">{{ $errors->first('jml_positif') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Meninggal</label>
                                <input type="text" name="jml_meninggal" class="form-control" id="exampleInputEmail1"  value="{{ $kasus2->jml_meninggal }}">
                                @if($errors->has('jml_meninggal'))
                                    <span class="text-danger">{{ $errors->first('jml_meninggal') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Sembuh</label>
                                <input type="text" name="jml_sembuh" class="form-control" id="exampleInputEmail1"  value="{{ $kasus2->jml_sembuh }}">
                                @if($errors->has('jml_sembuh'))
                                    <span class="text-danger">{{ $errors->first('jml_sembuh') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"  value="{{ $kasus2->tanggal }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection