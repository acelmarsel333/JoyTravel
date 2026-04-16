@extends('layouts.admin')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5>Tambah Paket</h5>
    </div>

    <div class="card-body">

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.paket.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- NAMA --}}
            <div class="mb-3">
                <label>Nama Paket</label>
                <input type="text" name="nama_paket" class="form-control"
                       value="{{ old('nama_paket') }}" required>
            </div>

            {{-- HARGA --}}
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control"
                       value="{{ old('harga') }}" required>
            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi') }}</textarea>
            </div>

            {{-- GAMBAR --}}
            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="gambar[]" multiple class="form-control" accept="image/png, image/jpeg">
                <small class="text-danger">Jika gagal submit, gambar harus upload ulang</small>
            </div>

            {{-- MAP --}}
            <div class="mb-3">
                <label>Map Embed</label>
                <textarea name="map_embed[0]" class="form-control"
                          placeholder="<iframe src='...'></iframe>">{{ old('map_embed.0') }}</textarea>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
</div>

@endsection
