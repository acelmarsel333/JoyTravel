@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<div class="row align-items-center py-5">
    <div class="col-md-6 mb-4 mb-md-0">
        <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill">
            #TravelTerpercaya
        </span>

        <h1 class="fw-bold display-5 mb-3">
            Jelajahi Indonesia Bersama <span class="text-primary">JoyTravel</span>
        </h1>

        <p class="lead text-muted mb-4">
            Solusi perjalanan wisata terbaik dengan pelayanan profesional,
            destinasi favorit, dan harga yang ramah di kantong.
        </p>

        <div class="d-flex gap-3">
            <a href="{{ route('paket.user') }}"
               class="btn btn-primary btn-lg rounded-pill px-4 fw-semibold">
                Lihat Paket Travel
            </a>

            <a href="{{ route('kontak') }}"
               class="btn btn-outline-secondary btn-lg rounded-pill px-4">
                Kontak Kami
            </a>
        </div>
    </div>

    <div class="col-md-6 text-center">
        <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee" class="img-fluid rounded-4 shadow mx-auto d-block"
        style="max-width: 400px;" alt="Travel JoyTravel">
    </div>
</div>

<!-- DIVIDER -->
<hr class="my-5">

<!-- KEUNGGULAN -->
<div class="row text-center mb-5">
    <div class="col-md-4 mb-4">
        <div class="p-4 h-100 rounded-4 shadow-sm bg-white">
            <div class="fs-1 mb-3">🌴</div>
            <h5 class="fw-bold">Destinasi Favorit</h5>
            <p class="text-muted mb-0">
                Bali, Lombok, Yogyakarta, dan berbagai destinasi impian lainnya.
            </p>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="p-4 h-100 rounded-4 shadow-sm bg-white">
            <div class="fs-1 mb-3">💰</div>
            <h5 class="fw-bold">Harga Terbaik</h5>
            <p class="text-muted mb-0">
                Paket wisata terjangkau, transparan, dan tanpa biaya tersembunyi.
            </p>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="p-4 h-100 rounded-4 shadow-sm bg-white">
            <div class="fs-1 mb-3">🤝</div>
            <h5 class="fw-bold">Pelayanan Profesional</h5>
            <p class="text-muted mb-0">
                Tim berpengalaman siap membantu perjalanan Anda dari awal hingga akhir.
            </p>
        </div>
    </div>
</div>

<!-- CTA BAWAH -->
<div class="bg-primary text-white rounded-4 p-5 text-center shadow">
    <h3 class="fw-bold mb-3">
        Siap Memulai Perjalanan Impian?
    </h3>
    <p class="mb-4">
        Temukan paket wisata terbaik bersama JoyTravel sekarang juga.
    </p>
    <a href="{{ route('paket.user') }}"
       class="btn btn-light btn-lg rounded-pill fw-semibold px-5">
        Lihat Semua Paket
    </a>
</div>

@endsection
