@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Data Laundry Non-Member</h1>
        <form action="{{ route('nonmember.update', $data_laundry_non_member->no_transaksi) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="{{ $data_laundry_non_member->tgl_transaksi->format('Y-m-d') }}" required>
            </div>
            <div class="mb-3">
                <label for="nama_customer" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ $data_laundry_non_member->nama_customer }}" maxlength="150" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required>{{ $data_laundry_non_member->alamat }}</textarea>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telp</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $data_laundry_non_member->no_telp }}" maxlength="16" required>
            </div>
            <div class="mb-3">
                <label for="id_pegawai" class="form-label">ID Pegawai</label>
                <select class="form-control" id="id_pegawai" name="id_pegawai" required>
                    <option value="">Pilih Pegawai</option>
                    @foreach($pegawai as $p)
                        <option value="{{ $p->id_pegawai }}" {{ $data_laundry_non_member->id_pegawai == $p->id_pegawai ? 'selected' : '' }}>{{ $p->id_pegawai }}</option>
                    @endforeach
                </select>
                @error('id_pegawai')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $data_laundry_non_member->keterangan }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status_laundry" class="form-label">Status Laundry</label>
                <select class="form-select" id="status_laundry" name="status_laundry" required>
                    <option value="menunggu" {{ $data_laundry_non_member->status_laundry == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="diproses" {{ $data_laundry_non_member->status_laundry == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $data_laundry_non_member->status_laundry == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                <select class="form-select" id="status_pembayaran" name="status_pembayaran" required>
                    <option value="bayar" {{ $data_laundry_non_member->status_pembayaran == 'bayar' ? 'selected' : '' }}>Bayar</option>
                    <option value="belum" {{ $data_laundry_non_member->status_pembayaran == 'belum' ? 'selected' : '' }}>Belum</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="lokasi_kirim" class="form-label">Lokasi Kirim</label>
                <textarea class="form-control" id="lokasi_kirim" name="lokasi_kirim" required>{{ $data_laundry_non_member->lokasi_kirim }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('nonmember.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
