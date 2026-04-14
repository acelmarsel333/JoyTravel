@extends('layouts.app')

@section('content')
<div class="container">

<h3>Tambah Testimoni</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('testimoni.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Isi Testimoni</label>
        <textarea name="isi" class="form-control" rows="4" required>{{ old('isi') }}</textarea>
    </div>

    <div class="mb-3">
        <label>Rating</label>
        <select name="rating" class="form-control" required>
            <option value="" disabled selected>-- Pilih Rating --</option>
            <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (Sangat Baik)</option>
            <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (Baik)</option>
            <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐ (Cukup)</option>
            <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>⭐⭐ (Kurang)</option>
            <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>⭐ (Sangat Buruk)</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('testimoni.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>

</div>
@endsection
