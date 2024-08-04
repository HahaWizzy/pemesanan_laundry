@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Barang</h1>
        <form action="{{ route('barang.update', $barang->nama_barang) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" maxlength="150" required>
            </div>
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <select class="form-control" id="kode_barang" name="kode_barang" required>
                    <option value="">Pilih Kode Pembelian</option>
                    @foreach($pembelian_barang as $p)
                        <option value="{{ $p->id_pembelian }}" {{ $p->id_pembelian == $barang->kode_barang ? 'selected' : '' }}>
                            {{ $p->id_pembelian }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $barang->harga }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
