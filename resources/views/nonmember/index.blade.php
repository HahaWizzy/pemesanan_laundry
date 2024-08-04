@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Data Laundry Non-Member</h1>
        <a href="{{ route('nonmember.create') }}" class="btn btn-primary mb-3">Tambah Data Laundry</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Customer</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>ID Pegawai</th>
                    <th>Keterangan</th>
                    <th>Status Laundry</th>
                    <th>Status Pembayaran</th>
                    <th>Lokasi Kirim</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_laundry_non_member as $d)
                    <tr>
                        <td>{{ $d->no_transaksi }}</td>
                        <td>{{ $d->tgl_transaksi }}</td>
                        <td>{{ $d->nama_customer }}</td>
                        <td>{{ $d->alamat }}</td>
                        <td>{{ $d->no_telp }}</td>
                        <td>{{ optional ($d->pegawai)->id_pegawai }}</td>
                        <td>{{ $d->keterangan }}</td>
                        <td>{{ $d->status_laundry }}</td>
                        <td>{{ $d->status_pembayaran }}</td>
                        <td>{{ $d->lokasi_kirim }}</td>
                        <td>
                            <a href="{{ route('nonmember.edit', $d->no_transaksi) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('nonmember.destroy', $d->no_transaksi) }}" method="POST" class="d-inline">
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
