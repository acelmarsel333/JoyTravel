@extends('layouts.admin')

@section('content')

<style>
    .stat-card {
        border-radius: 1.2rem;
        padding: 1.8rem;
        color: #fff;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    .stat-icon {
        font-size: 2.5rem;
        opacity: 0.9;
    }

    .stat-title {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
    }

    .gradient-blue {
        background: linear-gradient(135deg, #3b82f6, #1e3a8a);
    }

    .gradient-green {
        background: linear-gradient(135deg, #22c55e, #15803d);
    }

    .gradient-yellow {
        background: linear-gradient(135deg, #facc15, #ca8a04);
        color: #1e293b;
    }

    .dashboard-header {
        margin-bottom: 1.5rem;
    }

    .dashboard-subtitle {
        color: #64748b;
        font-size: 0.95rem;
    }
</style>

<!-- HEADER -->
<div class="dashboard-header">
    <h4 class="fw-bold mb-1">Dashboard Admin</h4>
    <p class="dashboard-subtitle">
        Ringkasan data dan statistik JoyTravel
    </p>
</div>

<div class="row g-4">

    <!-- TOTAL PAKET -->
    <div class="col-md-4">
        <div class="stat-card gradient-blue">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-title">Total Paket</div>
                    <div class="stat-value">{{ $totalPaket }}</div>
                </div>
                <i class="bi bi-box-seam stat-icon"></i>
            </div>
        </div>
    </div>

    <!-- TOTAL TESTIMONI -->
    <div class="col-md-4">
        <div class="stat-card gradient-green">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-title">Total Testimoni</div>
                    <div class="stat-value">{{ $totalTestimoni }}</div>
                </div>
                <i class="bi bi-chat-left-text stat-icon"></i>
            </div>
        </div>
    </div>

    <!-- RATING -->
    <div class="col-md-4">
        <div class="stat-card gradient-yellow">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stat-title">Rata-rata Rating</div>
                    <div class="stat-value">
                        {{ number_format($rataRata, 1) }}
                    </div>
                </div>
                <i class="bi bi-star-fill stat-icon"></i>
            </div>

            <!-- BINTANG -->
            <div class="mt-2">
                @php
                    $full = floor($rataRata);
                    $half = ($rataRata - $full) >= 0.5 ? 1 : 0;
                    $empty = 5 - $full - $half;
                @endphp

                @for($i = 0; $i < $full; $i++)
                    <i class="bi bi-star-fill"></i>
                @endfor

                @if($half)
                    <i class="bi bi-star-half"></i>
                @endif

                @for($i = 0; $i < $empty; $i++)
                    <i class="bi bi-star"></i>
                @endfor
            </div>
        </div>
    </div>

</div>

<!-- OPTIONAL INFO -->
<div class="mt-5">
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h6 class="fw-bold mb-2">Informasi</h6>
        <p class="text-muted mb-0">
            Dashboard ini menampilkan ringkasan jumlah paket wisata,
            total testimoni pelanggan, serta rata-rata penilaian yang diberikan.
        </p>
    </div>
</div>

@endsection
