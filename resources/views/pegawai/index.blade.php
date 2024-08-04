@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Daftar Pegawai</h1>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Password</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $p)
                    <tr>
                        <td>{{ $p->id_pegawai }}</td>
                        <td>{{ $p->nama_pegawai }}</td>
                        <td>{{ $p->password }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>{{ $p->jabatan }}</td>
                        <td>
                            <a href="{{ route('pegawai.edit', $p->id_pegawai) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('pegawai.destroy', $p->id_pegawai) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
