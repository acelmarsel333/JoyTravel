@extends('layouts.app')

@section('content')

<div class="container my-5">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">
            Tentang Kami
        </span>
        <h1 class="fw-bold mb-2">
            Tentang <img src="{{ asset('image/logo panjang 2.png') }}" alt="JoyTravel" width="150px" height="50px">
        </h1>
        <p class="text-muted mx-auto fs-5" style="max-width:640px;">
            Partner perjalanan wisata Anda yang aman, nyaman, dan terpercaya
        </p>
    </div>

    <div class="row g-4 align-items-stretch">

        <!-- KONTEN UTAMA -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4 p-md-5">

                    <p class="fs-5 text-dark">
                        <strong><img src="{{ asset('image/logo panjang 2.png') }}" alt="JoyTravel" width="75" height="30px"></strong> adalah perusahaan travel yang bergerak
                        di bidang jasa perjalanan wisata domestik di Indonesia.
                        Kami berkomitmen memberikan pelayanan terbaik
                        dengan mengutamakan <strong>keamanan</strong> dan
                        <strong>kenyamanan</strong>.
                    </p>

                    <p class="text-muted">
                        Didukung oleh tim profesional dan berpengalaman,
                        JoyTravel menyediakan berbagai paket wisata ke destinasi
                        favorit dengan harga yang transparan dan terjangkau
                        untuk semua kalangan.
                    </p>

                    <hr class="my-4">

                    <div class="row g-4">
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-2">
                                🎯 Visi
                            </h5>
                            <p class="text-muted mb-0">
                                Menjadi perusahaan travel terpercaya dan
                                pilihan utama masyarakat Indonesia.
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h5 class="fw-bold mb-2">
                                🚀 Misi
                            </h5>
                            <ul class="text-muted mb-0 ps-3">
                                <li>Memberikan pelayanan terbaik</li>
                                <li>Menyediakan paket wisata berkualitas</li>
                                <li>Mengutamakan keamanan dan kenyamanan</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100"
                 style="background: linear-gradient(180deg, #2563eb, #1e40af);">
                <div class="card-body p-4 text-white">

                    <h5 class="fw-bold mb-3">
                        ⭐ Kenapa JoyTravel?
                    </h5>

                    <ul class="list-unstyled mb-0">
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-warning"></i>
                            Harga transparan & terjangkau
                        </li>
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-warning"></i>
                            Pelayanan ramah & profesional
                        </li>
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-warning"></i>
                            Destinasi wisata lengkap
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-warning"></i>
                            Perjalanan aman & nyaman
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection
