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
                        Data RW
                        
                    </div>
                    
                    <div class="card-body">
                        <div class="float-right">
                            <a href="{{ route('rw.create') }}" class="btn btn-primary"
                                class="float-right"> 
                                Tambah Data
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>RW</th>
                                        <th>Nama Kelurahan/Desa</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Nama Kota/Kabputen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach($rw as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->kelurahan->nama_kelurahan }}</td>
                                        <td>{{ $data->kelurahan->kecamatan->nama_kecamatan}}</td>
                                        <td>{{ $data->kelurahan->kecamatan->kota->nama_kota }}</td>
                                        <td>
                                            <form action="{{route('rw.destroy', $data->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('rw.edit',$data->id)}}" class="btn btn-success  float-right"><b>Edit</b></a> 
                                                <a href="{{route('rw.show',$data->id)}}" class="btn btn-info float-right"><b>Show</b></a>
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