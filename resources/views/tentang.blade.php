@extends('layouts.app')

@section('content')

<div class="container">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-2">Tentang JoyTravel</h1>
        <p class="text-muted mx-auto" style="max-width:600px;">
            Partner perjalanan wisata Anda yang aman, nyaman, dan terpercaya
        </p>
    </div>

    <div class="row g-4 align-items-center">

        <!-- KONTEN UTAMA -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">

                    <p class="fs-5">
                        <strong>JoyTravel</strong> adalah perusahaan travel yang bergerak
                        di bidang jasa perjalanan wisata domestik.
                        Kami berkomitmen memberikan pelayanan terbaik,
                        aman, dan nyaman bagi setiap pelanggan.
                    </p>

                    <p class="text-muted">
                        Dengan tim profesional dan berpengalaman, JoyTravel melayani
                        berbagai paket wisata ke destinasi favorit di Indonesia
                        dengan harga terjangkau dan transparan.
                    </p>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5 class="fw-bold">Visi</h5>
                            <p class="text-muted mb-0">
                                Menjadi perusahaan travel terpercaya dan pilihan utama masyarakat.
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h5 class="fw-bold">Misi</h5>
                            <ul class="text-muted mb-0">
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
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 bg-primary text-white">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-3">Kenapa JoyTravel?</h5>

                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">✔ Harga transparan & terjangkau</li>
                        <li class="mb-2">✔ Pelayanan ramah & profesional</li>
                        <li class="mb-2">✔ Destinasi wisata lengkap</li>
                        <li>✔ Perjalanan aman & nyaman</li>
                    </ul>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection
