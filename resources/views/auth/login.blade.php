@extends('layouts.app')

@section('content')

<div class="row justify-content-center align-items-center" style="min-height:70vh;">

    <div class="col-md-4">

        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            <!-- HEADER -->
            <div class="bg-primary text-white text-center py-4">
                <h4 class="fw-bold mb-1">Selamat Datang</h4>
                <small>Login ke JoyTravel</small>
            </div>

            <!-- BODY -->
            <div class="card-body p-4">

                @if(session('error'))
                    <div class="alert alert-danger small">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="/login">
                    @csrf

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
                               placeholder="********"
                               required>
                    </div>

                    <!-- BUTTON -->
                    <button class="btn btn-primary w-100 fw-semibold py-2 rounded-3">
                        Login
                    </button>
                </form>

                <!-- REGISTER -->
                <div class="text-center mt-4">
                    <small class="text-muted">
                        Belum punya akun?
                    </small><br>
                    <a href="/register" class="fw-semibold text-primary">
                        Daftar sekarang
                    </a>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
