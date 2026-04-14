@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="py-5 mb-5 text-white hero-travel">
    <div class="container text-center">
        <h1 class="fw-bold display-6 mb-3">
            Jelajahi Indonesia Bersama <img src="{{ asset('image/logo panjang 2.png') }}" alt="JoyTravel" width="200" height="60px">
        </h1>
        <p class="lead mb-0">
            Paket perjalanan terbaik, nyaman & terpercaya
        </p>
    </div>
</section>

<div class="container pb-5">

    <!-- GRID PAKET -->
    <div class="row g-4">

        @foreach($paket as $p)
        <div class="col-lg-4 col-md-6">

            <div class="card border-0 h-100 rounded-4 shadow-sm paket-card overflow-hidden">

                <!-- IMAGE -->
                <div class="position-relative">
                    @if($p->galeri && $p->galeri->isNotEmpty())
                        <img src="{{ asset('storage/'.$p->galeri->first()->gambar) }}"
                            class="w-100 paket-img">
                    @else
                        <img src="https://via.placeholder.com/400x260"
                            class="w-100 paket-img">
                    @endif

                    <!-- OVERLAY -->
                    <div class="img-overlay"></div>

                    <!-- PRICE -->
                    <div class="price-tag">
                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                    </div>
                </div>

                <!-- BODY -->
                <div class="card-body p-4 d-flex flex-column">

                    <h5 class="fw-bold text-dark mb-2">
                        {{ $p->nama_paket }}
                    </h5>

                    <p class="text-muted small flex-grow-1">
                        {{ \Illuminate\Support\Str::limit($p->deskripsi, 100) }}
                    </p>

                    <div class="mt-3">
                        <a href="{{ route('paket.show', $p) }}" class="btn btn-primary w-100 fw-semibold rounded-pill">
                                Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- STYLE --}}
<style>
    /* HERO */
    .hero-travel {
        background: linear-gradient(
            rgba(30,58,138,.75),
            rgba(37,99,235,.75)
        ),
        url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1400&q=80');
        background-size: cover;
        background-position: center;
        border-radius: 0 0 2rem 2rem;
    }

    /* CARD */
    .paket-card {
        transition: all .35s ease;
    }

    .paket-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,.12);
    }

    .paket-img {
        height: 260px;
        object-fit: cover;
    }

    .img-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(0,0,0,.45),
            rgba(0,0,0,.05)
        );
    }

    /* PRICE TAG */
    .price-tag {
        position: absolute;
        bottom: 15px;
        left: 15px;
        background: rgba(255,255,255,.9);
        backdrop-filter: blur(6px);
        padding: 8px 16px;
        border-radius: 999px;
        font-weight: 700;
        color: #1e293b;
        box-shadow: 0 6px 18px rgba(0,0,0,.15);
    }
</style>

@endsection
