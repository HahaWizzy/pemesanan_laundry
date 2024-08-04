@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Member</h1>
        <form action="{{ route('member.update', $member->member_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="no_identitas" class="form-label">No Identitas</label>
                <input type="text" class="form-control" id="no_identitas" name="no_identitas" value="{{ $member->no_identitas }}" maxlength="16" required>
            </div>
            <div class="mb-3">
                <label for="nama_member" class="form-label">Nama Member</label>
                <input type="text" class="form-control" id="nama_member" name="nama_member" value="{{ $member->nama_member }}" maxlength="150" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required>{{ $member->alamat }}</textarea>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $member->no_hp }}" maxlength="15" required>
            </div>
            <div class="mb-3">
                <label for="tgl_join" class="form-label">Tanggal Join</label>
                <input type="date" class="form-control" id="tgl_join" name="tgl_join" value="{{ $member->tgl_join }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('member.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
