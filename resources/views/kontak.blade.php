@extends('layouts.app')

@section('content')

<div class="container">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-2">Kontak Kami</h1>
        <p class="text-muted">
            Kami siap membantu perjalanan wisata Anda
        </p>
    </div>

    <div class="row g-4 justify-content-center">

        <!-- INFO KONTAK -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">

                    <p class="mb-4">
                        Silakan hubungi <strong>JoyTravel</strong> melalui informasi di bawah ini.
                        Tim kami akan dengan senang hati membantu Anda.
                    </p>

                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-start mb-3">
                            <span class="me-3 fs-4">📍</span>
                            <div>
                                <strong>Alamat</strong><br>
                                Jl. Inhoftank Gg. Panyeuseuhan
                                Rt 03 Rw 02 <br>Kel. Kebon Lega Kec. Bojongloa Kidul<br>
                                Kota Bandung, Jawa Barat, 40235
                            </div>
                        </li>

                        <li class="d-flex align-items-start mb-3">
                            <span class="me-3 fs-4">📧</span>
                            <div>
                                <strong>Email</strong><br>
                                joytravel@gmail.com
                            </div>
                        </li>

                        <li class="d-flex align-items-start">
                            <span class="me-3 fs-4">📞</span>
                            <div>
                                <strong>Telepon</strong><br>
                                0838-2953-0570
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection
