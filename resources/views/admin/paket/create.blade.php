@extends('layouts.admin')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5>Tambah Paket</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.paket.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Nama Paket</label>
                <input type="text" name="nama_paket" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="gambar[]" multiple class="form-control">
            </div>

            <div class="mb-3">
                <label>Map Embed</label>
                <textarea name="map_embed[0]" class="form-control"
                          placeholder="<iframe src='...'></iframe>"></textarea>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

@endsection
