@extends('layouts.app')

@section('content')
<div class="detail-wrapper py-5">
    <div class="container">

        <div class="row g-5 align-items-start">

            <!-- IMAGE -->
            <div class="col-lg-7">
                <div class="glass-card p-4 rounded-5 shadow-xl overflow-hidden">

                    <!-- MAIN IMAGE -->
                    <div class="main-img-wrapper rounded-4 overflow-hidden mb-4 position-relative">
                        @if($paket->galeri && $paket->galeri->isNotEmpty())
                            <img id="mainImage"
                                 src="{{ asset('storage/'.$paket->galeri->first()->gambar) }}"
                                 class="w-100 main-img">
                        @else
                            <img src="https://via.placeholder.com/800x520"
                                 class="w-100 main-img">
                        @endif
                    </div>

                    <!-- THUMBNAIL -->
                    <div class="d-flex gap-3 flex-wrap">
                        @foreach($paket->galeri as $index => $img)
                            <img src="{{ asset('storage/'.$img->gambar) }}"
                                 class="thumb-img {{ $index === 0 ? 'active' : '' }}"
                                 onclick="changeImage(this)"
                                 alt="thumb">
                        @endforeach
                    </div>

                </div>
            </div>

            <!-- DETAIL -->
            <div class="col-lg-5">
                <div class="detail-card p-5 rounded-5 shadow-xl">

                    <h1 class="fw-bold mb-3">
                        {{ $paket->nama_paket }}
                    </h1>

                    <p class="text-muted mb-3">
                        <i class="bi bi-geo-alt-fill text-primary"></i>
                        {{ $paket->lokasi ?? 'Destinasi Indonesia' }}
                    </p>

                    <div class="mb-4">
                        <span class="text-muted">Mulai dari</span><br>
                        <span class="fs-2 fw-bold text-success">
                            Rp {{ number_format($paket->harga, 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="mb-4">
                        <strong>Durasi:</strong>
                        {{ $paket->durasi ?? '3 Hari 2 Malam' }}
                    </div>

                    <!-- DESKRIPSI -->
                    <div class="mb-4">
                        <h5>Deskripsi</h5>
                        <p class="text-muted">
                            {{ $paket->deskripsi }}
                        </p>
                    </div>

                    <!-- MAP -->
                    @if($paket->galeri && $paket->galeri->first()->map_embed)
                        <div class="mb-4">
                            <h5>Lokasi</h5>

                            <div class="map-wrapper">
                                {!! $paket->galeri->first()->map_embed !!}
                            </div>
                        </div>
                    @endif

                    <!-- BUTTON -->
                    <div class="mt-4">
                        <a href="{{ route('paket.user') }}"
                           class="btn btn-outline-secondary w-100 rounded-pill py-3">
                            ← Kembali
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<style>
/* BACKGROUND */
.detail-wrapper {
    background: linear-gradient(135deg, #f0f4f8, #e0e9f3);
}

/* CARD */
.detail-card {
    background: #fff;
}

/* IMAGE */
.main-img {
    height: 520px;
    object-fit: cover;
}

/* THUMBNAIL */
.thumb-img {
    width: 85px;
    height: 85px;
    object-fit: cover;
    border-radius: 14px;
    cursor: pointer;
    border: 3px solid transparent;
    transition: 0.3s;
}

.thumb-img:hover {
    transform: scale(1.1);
    border-color: #3b82f6;
}

.thumb-img.active {
    border-color: #2563eb;
}

/* 🔥 MAP FIX (PENTING) */
.map-wrapper {
    border-radius: 16px;
    overflow: hidden;
}

.map-wrapper iframe {
    width: 100% !important;
    height: 220px !important;
    border: 0;
}
</style>

<script>
function changeImage(el) {
    const mainImg = document.getElementById('mainImage');

    mainImg.style.opacity = '0';

    setTimeout(() => {
        mainImg.src = el.src;
        mainImg.style.opacity = '1';
    }, 200);

    document.querySelectorAll('.thumb-img').forEach(img => {
        img.classList.remove('active');
    });

    el.classList.add('active');
}
</script>

@endsection
