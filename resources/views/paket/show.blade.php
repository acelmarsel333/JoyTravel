@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row g-5 align-items-start">

        <!-- GAMBAR -->
        <div class="col-md-6">
            <div class="rounded-4 overflow-hidden shadow-sm">
                @if($paket->gambar)
                    <img src="{{ asset('storage/'.$paket->gambar) }}"
                         class="w-100"
                         style="height:420px; object-fit:cover;">
                @else
                    <img src="https://via.placeholder.com/600x420"
                         class="w-100">
                @endif
            </div>
        </div>

        <!-- DETAIL -->
        <div class="col-md-6">

            <h2 class="fw-bold text-dark mb-3">
                {{ $paket->nama_paket }}
            </h2>

            <h4 class="text-primary fw-bold mb-4">
                Rp {{ number_format($paket->harga, 0, ',', '.') }}
            </h4>

            <p class="text-muted mb-4">
                {{ $paket->deskripsi }}
            </p>

            <div class="d-flex gap-3">
                <a href="{{ route('paket.user') }}"
                   class="btn btn-outline-secondary px-4">
                    ← Kembali
                </a>
            </div>

        </div>

    </div>

</div>

@endsection
