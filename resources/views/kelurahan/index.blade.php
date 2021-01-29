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
                        Data Kelurahan / Desa
                        
                    </div>
                    
                    <div class="card-body">
                        <div class="float-right">
                            <a href="{{ route('kelurahan.create') }}" class="btn btn-primary"
                                class="float-right"> 
                                Tambah Data
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Kode Kelurahan/Desa</th>
                                        <th>Nama Kelurahan/Desa</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Nama Kota/Kabputen</th>
                                        <th>Nama Provinsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach($kelurahan as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->kode_kelurahan }}</td>
                                        <td>{{ $data->nama_kelurahan }}</td>
                                        <td>{{ $data->kecamatan->nama_kecamatan}}</td>
                                        <td>{{ $data->kecamatan->kota->nama_kota }}</td>
                                        <td>
                                            <form action="{{route('kelurahan.destroy', $data->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('kelurahan.edit',$data->id)}}" class="btn btn-success  float-right"><b>Edit</b></a> 
                                                <a href="{{route('kelurahan.show',$data->id)}}" class="btn btn-info float-right"><b>Show</b></a>
                                                <button type="submit" class="btn btn-danger float-right"><b>Delete</b></button>
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