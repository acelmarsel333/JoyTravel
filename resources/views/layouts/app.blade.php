<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>JoyTravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .navbar-joy {
            background: linear-gradient(90deg, #2563eb, #1e40af);
        }

        .nav-link {
            color: #fff !important;
            font-weight: 500;
            padding: .5rem 1rem;
            border-radius: .5rem;
            transition: all .2s ease;
        }

        .nav-link:hover {
            background-color: rgba(255,255,255,.15);
        }

        .nav-link.active {
            background-color: #facc15;
            color: #1e293b !important;
            font-weight: 600;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-joy shadow-sm">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold fs-4 d-flex align-items-center gap-2"
           href="{{ route('home') }}">
            ✈️ JoyTravel
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#userNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="userNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2 mt-3 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}"
                       href="{{ route('tentang') }}">Tentang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('paket.user') ? 'active' : '' }}"
                       href="{{ route('paket.user') }}">Paket</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('testimoni.index') ? 'active' : '' }}"
                       href="{{ route('testimoni.index') }}">Testimoni</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}"
                       href="{{ route('kontak') }}">Kontak</a>
                </li>

                <!-- GUEST -->
                @guest
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-light btn-sm px-4 fw-semibold"
                           href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-light btn-sm px-4 fw-semibold"
                           href="{{ route('register') }}">
                            Register
                        </a>
                    </li>
                @endguest

                <!-- AUTH -->
                @auth
                    @if(auth()->user()->peran === 'admin')
                        <li class="nav-item ms-lg-3">
                            <a href="{{ route('admin.dashboard') }}"
                               class="btn btn-warning btn-sm fw-semibold px-4">
                                Dashboard
                            </a>
                        </li>
                    @endif

                    <li class="nav-item ms-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm fw-semibold px-4">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container my-5">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
