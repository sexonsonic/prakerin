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
                        Data Kecamatan
                        
                    </div>
                    
                    <div class="card-body">
                        <div class="float-right">
                            <a href="{{ route('kecamatan.create') }}" class="btn btn-primary"
                                class="float-right"> 
                                Tambah Data
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Kode Kecamatan</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Nama Kota/Kabputen</th>
                                        <th>Nama Provinsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach($kecamatan as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->kode_kecamatan }}</td>
                                        <td>{{ $data->nama_kecamatan }}</td>
                                        <td>{{ $data->kota->nama_kota }}</td>
                                        <td>{{ $data->kota->provinsi->nama_provinsi }}</td>
                                        <td>
                                            <form action="{{route('kecamatan.destroy', $data->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('kecamatan.edit',$data->id)}}" class="btn btn-success  float-right"><b>Edit</b></a> 
                                                <!-- <a href="{{route('kecamatan.show',$data->id)}}" class="btn btn-info float-right"><b>Show</b></a> -->
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