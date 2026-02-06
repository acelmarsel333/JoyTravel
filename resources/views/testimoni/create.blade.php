@extends('layouts.app')

@section('content')
<h3>Tambah Testimoni</h3>

<form action="{{ route('testimoni.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Isi Testimoni</label>
        <textarea name="isi" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label>Rating</label>
        <select name="rating" class="form-control" required>
            <option value="5">⭐⭐⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="2">⭐⭐</option>
            <option value="1">⭐</option>
        </select>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('testimoni.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>
@endsection
