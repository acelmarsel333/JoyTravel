@extends('layouts.admin')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-warning">
        <h5>Edit Paket</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.paket.update', $paket->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Paket</label>
                <input type="text" name="nama_paket" class="form-control"
                       value="{{ $paket->nama_paket }}">
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control"
                       value="{{ $paket->harga }}">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $paket->deskripsi }}</textarea>
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

            {{-- UPLOAD --}}
            <div class="mb-3">
                <label>Tambah Gambar</label>
                <input type="file" name="gambar[]" multiple class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin menambah gambar</small>
            </div>

            {{-- MAP --}}
            <div class="mb-3">
                <label>Map Embed</label>
                <textarea name="map_embed[0]" class="form-control"
                          placeholder="<iframe src='...'></iframe>">{{ $paket->galeri->first()->map_embed ?? '' }}</textarea>
            </div>

            <button class="btn btn-success">Update</button>
            <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>

@endsection
