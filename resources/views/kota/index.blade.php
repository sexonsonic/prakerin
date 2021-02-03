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
                        Data Kota & Kabupaten
                        
                    </div>
                    
                    <div class="card-body">
                        <a href="{{route('kota.create')}}" class="btn btn-success mb-3 float-right"><i class="fa fa-plus-circle"></i>
                                Tambah Data
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th><center>Nomor</center></th>
                                        <th><center>Kode Kota / Kabupaten</center></th>
                                        <th><center>Nama Kota / Kabupaten</center></th>
                                        <th><center>Nama Provinsi</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach($kota as $data)
                                    <tr>
                                        <th scope="row"><center>{{ $no++ }}</center></th>
                                        <td><center>{{ $data->kode_kota }}</center></td>
                                        <td><center>{{ $data->nama_kota }}</center></td>
                                        <td><center>{{ $data->provinsi->nama_provinsi }}</center></td>
                                        <td style="text-align: center;">
                                            <form action="{{route('kota.destroy',$data->id)}}" method="POST">
                                                @csrf
                                                <a href="{{route('kota.edit',$data->id)}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"> Edit</i></a> 
                                                <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-alt"> Hapus</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection