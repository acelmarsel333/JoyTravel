@extends('layouts.admin')

@section('content')

<!-- Bootstrap Icons (jika belum ada di layout admin) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

{{-- 🔥 NOTIFIKASI --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card border-0 shadow-lg rounded-4 overflow-hidden">

    <!-- Header -->
    <div class="card-header bg-white border-0 px-4 py-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-3">
                    <i class="bi bi-box-seam fs-3"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-1">Kelola Paket Travel</h4>
                    <p class="text-muted mb-0">Daftar semua paket perjalanan yang tersedia</p>
                </div>
            </div>

            <a href="{{ route('admin.paket.create') }}" 
               class="btn btn-primary fw-semibold px-4 py-2 rounded-3 shadow-sm">
                <i class="bi bi-plus-circle me-2"></i>
                Tambah Paket Baru
            </a>
        </div>
    </div>

    <!-- Body -->
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="25%">Nama Paket</th>
                        <th width="15%">Harga</th>
                        <th>Deskripsi</th>
                        <th class="text-center" width="12%">Gambar</th>
                        <th class="text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($paket as $p)
                    <tr class="align-middle">
                        <td>
                            <div class="fw-semibold fs-6">{{ $p->nama_paket }}</div>
                            <small class="text-muted">ID : {{ $p->id }}</small>
                        </td>

                        <td>
                            <div class="fw-bold text-success fs-5">
                                Rp {{ number_format($p->harga, 0, ',', '.') }}
                            </div>
                            <small class="text-muted">/ Orang</small>
                        </td>

                        <td>
                            <p class="mb-0 text-muted" style="max-width: 320px;">
                                {{ \Illuminate\Support\Str::limit(strip_tags($p->deskripsi), 90) }}
                            </p>
                        </td>

                        <td class="text-center">
                            @if($p->galeri && $p->galeri->isNotEmpty())
                                <div class="position-relative mx-auto" style="width: 85px; height: 60px;">
                                    <img src="{{ asset('storage/' . $p->galeri->first()->gambar) }}"
                                         class="img-thumbnail shadow-sm"
                                         style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;"
                                         alt="{{ $p->nama_paket }}">
                                </div>
                            @else
                                <div class="d-flex flex-column align-items-center text-muted">
                                    <i class="bi bi-image text-secondary fs-3"></i>
                                    <small class="mt-1">No Image</small>
                                </div>
                            @endif
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Edit -->
                                <a href="{{ route('admin.paket.edit', $p->id) }}" 
                                   class="btn btn-warning btn-sm rounded-3 shadow-sm"
                                   title="Edit Paket">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('admin.paket.destroy', $p->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus paket ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger btn-sm rounded-3 shadow-sm"
                                            title="Hapus Paket">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center">
                                <i class="bi bi-box-seam display-1 text-muted mb-3"></i>
                                <h5 class="text-muted">Belum ada paket travel</h5>
                                <p class="text-muted mb-3">Silakan tambahkan paket perjalanan pertama Anda.</p>
                                <a href="{{ route('admin.paket.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Tambah Paket
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer Info -->
    <div class="card-footer bg-white border-0 py-3 px-4 text-muted small">
        Total Paket: <strong>{{ $paket->count() }}</strong>
    </div>
</div>

@endsection