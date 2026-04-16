@extends('layouts.admin')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-warning">
        <h5>Edit Paket</h5>
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

        <form action="{{ route('admin.paket.update', $paket->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- NAMA --}}
            <div class="mb-3">
                <label>Nama Paket</label>
                <input type="text" name="nama_paket" class="form-control"
                       value="{{ old('nama_paket', $paket->nama_paket) }}" required>
            </div>

            {{-- HARGA --}}
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control"
                       value="{{ old('harga', $paket->harga) }}" required>
            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $paket->deskripsi) }}</textarea>
            </div>

            {{-- GAMBAR SAAT INI --}}
            @if($paket->galeri && $paket->galeri->isNotEmpty())
                <div class="mb-3">
                    <label>Gambar Saat Ini</label>
                    <div class="d-flex gap-2 flex-wrap">
                        @foreach($paket->galeri as $img)
                            <img src="{{ asset('storage/'.$img->gambar) }}"
                                 width="100" height="80"
                                 style="object-fit:cover; border-radius:8px;">
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- TAMBAH GAMBAR --}}
            <div class="mb-3">
                <label>Tambah Gambar</label>
                <input type="file" name="gambar[]" multiple class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin menambah gambar</small>
            </div>

            {{-- MAP --}}
            <div class="mb-3">
                <label>Map Embed</label>
                <textarea name="map_embed[0]" class="form-control"
                          placeholder="<iframe src='...'></iframe>">{{ old('map_embed.0', $paket->galeri->first()->map_embed ?? '') }}</textarea>
            </div>

            <button class="btn btn-success">Update</button>
            <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>

@endsection
