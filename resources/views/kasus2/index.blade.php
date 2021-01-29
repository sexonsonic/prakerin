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
                        Data Kasus Lokal
                        
                    </div>
                    
                    <div class="card-body">
                        <div class="float-right">
                            <a href="{{ route('kasus2.create') }}" class="btn btn-primary"
                                class="float-right"> 
                                Tambah Data
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Lokasi</th>
                                        <th>RW</th>
                                        <th>Kasus Positif</th>
                                        <th>Kasus Meninggal</th>
                                        <th>Kasus Sembuh</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach($kasus2 as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>
                                            Kelurahan : {{ $data->rw->kelurahan->nama_kelurahan }} <br>
                                            Kecamatan : {{ $data->rw->kelurahan->kecamatan->nama_kecamatan }} <br>
                                            Kota : {{ $data->rw->kelurahan->kecamatan->kota->nama_kota }} <br>
                                            Provinsi : {{ $data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi }}
                                        </td>
                                        <td>{{ $data->rw->nama }}</td>
                                        <td>{{ $data->jml_positif }}</td>
                                        <td>{{ $data->jml_meninggal}}</td>
                                        <td>{{ $data->jml_sembuh }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>
                                            <form action="{{route('kasus2.destroy', $data->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('kasus2.edit',$data->id)}}" class="btn btn-success  float-right"><b>Edit</b></a> 
                                                <!-- <a href="{{route('kasus2.show',$data->id)}}" class="btn btn-info float-right"><b>Show</b></a> -->
                                                <button type="submit" class="btn-danger btn float-right"><b>Delete</b></button>
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