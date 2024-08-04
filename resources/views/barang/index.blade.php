@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Data Barang</h1>
        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $b)
                    <tr>
                        <td>{{ $b->nama_barang }}</td>
                        <td>{{ $b->kode_barang }}</td>
                        <td>{{ $b->harga }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $b->nama_barang) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('barang.destroy', $b->nama_barang) }}" method="POST" class="d-inline">
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
