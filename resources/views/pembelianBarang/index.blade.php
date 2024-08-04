@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Data Pembelian Barang</h1>
        <a href="{{ route('pembelian_barang.create') }}" class="btn btn-primary mb-3">Tambah Pembelian</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>ID Pegawai</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembelian_barang as $p)
                    <tr>
                        <td>{{ $p->kode_barang }}</td>
                        <td>{{ optional($p->pegawai)->id_pegawai }}</td>
                        <td>{{ $p->tanggal }}</td>
                        <td>{{ $p->jumlah }}</td>
                        <td>
                            <a href="{{ route('pembelian_barang.edit', $p->id_pembelian) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('pembelian_barang.destroy', $p->id_pembelian) }}" method="POST" class="d-inline">
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
