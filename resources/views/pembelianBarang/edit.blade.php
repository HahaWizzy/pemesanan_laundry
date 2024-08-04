@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Pembelian Barang</h1>
        <form action="{{ route('pembelian_barang.update', $pembelian_Barang->id_pembelian) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="number" class="form-control" id="kode_barang" name="kode_barang" value="{{ $pembelian_Barang->kode_barang }}" required>
            </div>
            <div class="mb-3">
                <label for="id_pegawai" class="form-label">ID Pegawai</label>
                <select class="form-control" id="id_pegawai" name="id_pegawai" required>
                    <option value="">Pilih Pegawai</option>
                    @foreach($pegawai as $p)
                        <option value="{{ $p->id_pegawai }}" {{ $p->id_pegawai == $pembelian_Barang->id_pegawai ? 'selected' : '' }}>
                            {{ $p->id_pegawai }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $pembelian_Barang->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $pembelian_Barang->jumlah }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pembelian_barang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
