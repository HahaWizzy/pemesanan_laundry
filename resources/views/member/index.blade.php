@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Daftar Member</h1>
        <a href="{{ route('member.create') }}" class="btn btn-primary mb-3">Tambah Member</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Member</th>
                    <th>No Identitas</th>
                    <th>Nama Member</th>
                    <th>Password</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Tanggal Join</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($member as $m)
                    <tr>
                        <td>{{ $m->member_id }}</td>
                        <td>{{ $m->no_identitas }}</td>
                        <td>{{ $m->nama_member }}</td>
                        <td>{{ $m->password }}</td>
                        <td>{{ $m->alamat }}</td>
                        <td>{{ $m->no_hp }}</td>
                        <td>{{ $m->tgl_join }}</td>
                        <td>
                            <a href="{{ route('member.edit', $m->member_id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('member.destroy', $m->member_id) }}" method="POST" class="d-inline">
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
