@extends('layouts.app')

@section('content')

<div class="row justify-content-center align-items-center" style="min-height:70vh;">

    <div class="col-md-4">

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            <!-- HEADER -->
            <div class="bg-primary text-white text-center py-4">
                <h4 class="fw-bold mb-1">Buat Akun Baru</h4>
                <small>Gabung bersama JoyTravel</small>
            </div>

            <!-- BODY -->
            <div class="card-body p-4">

                <form method="POST" action="/register">
                    @csrf

                    <!-- NAMA -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Nama Lengkap
                        </label>
                        <input type="text"
                               name="name"
                               class="form-control rounded-3"
                               placeholder="Nama lengkap"
                               required>
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Email
                        </label>
                        <input type="email"
                               name="email"
                               class="form-control rounded-3"
                               placeholder="contoh@email.com"
                               required>
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Password
                        </label>
                        <input type="password"
                               name="password"
                               class="form-control rounded-3"
                               placeholder="Minimal 8 karakter"
                               required>
                    </div>

                    <!-- BUTTON -->
                    <button class="btn btn-primary w-100 fw-semibold py-2 rounded-3">
                        Daftar
                    </button>
                </form>

                <!-- LOGIN LINK -->
                <div class="text-center mt-4">
                    <small class="text-muted">
                        Sudah punya akun?
                    </small><br>
                    <a href="/login" class="fw-semibold text-primary">
                        Login di sini
                    </a>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
