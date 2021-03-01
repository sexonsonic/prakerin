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
                        <a href="{{ route('rt.create') }}" class="btn btn-success mb-3 float-right"><i
                                class="fa fa-plus-circle"></i>
                            Tambah Data
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nomor</center>
                                        </th>
                                        <th>
                                            <center>RT</center>
                                        </th>
                                        <th>
                                            <center>RW</center>
                                        </th>
                                        <th>
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($rt as $data)
                                        <tr>
                                            <th scope="row">
                                                <center>{{ $no++ }}</center>
                                            </th>
                                            <td>
                                                <center>{{ $data->nama }}</center>
                                            </td>
                                            <td>
                                                <center>{{ $data->rw->nama }}</center>
                                            </td>

                                            <td style="text-align: center;">
                                                <form action="{{ route('rt.destroy', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('rt.edit', $data->id) }}"
                                                        class="btn btn-outline-primary btn-sm"><i class="fa fa-edit">
                                                            Edit</i></a>
                                                    <a href="{{ route('rt.show', $data->id) }}"
                                                        class="btn btn-outline-warning btn-sm"><i class="fa fa-eye"></i>
                                                        Detail</a>
                                                    <button type="submit" onclick="return confirm('Apakah Anda Yakin ?')"
                                                        class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-alt">
                                                            Hapus</i></button>
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
