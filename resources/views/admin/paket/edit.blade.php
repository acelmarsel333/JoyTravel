@extends('layouts.admin')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-warning">
        <h5 class="mb-0">Edit Paket</h5>
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
                <textarea name="deskripsi" class="form-control"
                          rows="4">{{ $paket->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label>Gambar Paket</label>
                <input type="file" name="gambar" class="form-control">
            </div>

            @if($paket->gambar)
                <div class="mb-3">
                    <label>Gambar Saat Ini</label><br>
                    <img src="{{ asset('storage/' . $paket->gambar) }}"
                         width="150" class="rounded">
                </div>
            @endif

            <button class="btn btn-success">Update</button>
            <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

@endsection
