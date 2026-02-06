@extends('layouts.admin')

@section('content')

{{-- BOOTSTRAP ICONS --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">

    <!-- HEADER -->
    <div class="card-header bg-white border-0 px-4 py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

            <div>
                <h4 class="fw-bold text-dark mb-1">
                    📦 Kelola Paket Travel
                </h4>
                <p class="text-muted mb-0">
                    Daftar paket perjalanan yang tersedia di JoyTravel
                </p>
            </div>

            <a href="{{ route('admin.paket.create') }}"
               class="btn btn-primary fw-semibold px-4 shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah Paket
            </a>

        </div>
    </div>

    <!-- BODY -->
    <div class="card-body px-4 pb-4">

        <div class="table-responsive">
            <table class="table align-middle mb-0">

                <thead>
                    <tr class="bg-light">
                        <th class="text-uppercase text-secondary small fw-semibold">
                            Paket
                        </th>
                        <th class="text-uppercase text-secondary small fw-semibold">
                            Harga
                        </th>
                        <th class="text-uppercase text-secondary small fw-semibold">
                            Deskripsi
                        </th>
                        <th class="text-uppercase text-secondary small fw-semibold text-center">
                            Gambar
                        </th>
                        <th class="text-uppercase text-secondary small fw-semibold text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($paket as $p)
                    <tr class="border-bottom">

                        {{-- NAMA --}}
                        <td>
                            <div class="fw-semibold text-dark">
                                {{ $p->nama_paket }}
                            </div>
                            <small class="text-muted">
                                ID Paket: {{ $p->id }}
                            </small>
                        </td>

                        {{-- HARGA --}}
                        <td>
                            <span class="badge rounded-pill bg-success bg-opacity-10
                                         text-success fw-semibold px-3 py-2">
                                Rp {{ number_format($p->harga, 0, ',', '.') }}
                            </span>
                        </td>

                        {{-- DESKRIPSI --}}
                        <td class="text-muted" style="max-width:320px;">
                            {{ \Illuminate\Support\Str::limit($p->deskripsi, 90) }}
                        </td>

                        {{-- GAMBAR --}}
                        <td class="text-center">
                            @if($p->gambar)
                                <img src="{{ asset('storage/' . $p->gambar) }}"
                                     class="rounded-3 shadow-sm"
                                     width="75" height="55"
                                     style="object-fit:cover;">
                            @else
                                <span class="badge bg-secondary bg-opacity-10 text-secondary">
                                    Tidak ada
                                </span>
                            @endif
                        </td>

                        {{-- AKSI --}}
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">

                                <a href="{{ route('admin.paket.edit', $p->id) }}"
                                   class="btn btn-outline-warning btn-sm rounded-circle"
                                   title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.paket.destroy', $p->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus paket ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-outline-danger btn-sm rounded-circle"
                                        title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <div class="fs-1 mb-2">📭</div>
                            <div class="fw-semibold fs-5">
                                Belum ada paket travel
                            </div>
                            <small>
                                Silakan tambahkan paket baru
                            </small>
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection
