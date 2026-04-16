<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>JoyTravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP -->
    <link rel="icon" type="image/png" href="{{ asset('image/logo 2.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        /* NAVBAR PREMIUM */
        .navbar-joy {
            background: linear-gradient(135deg, #2563eb, #1e3a8a);
            backdrop-filter: blur(12px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            transition: all .3s ease;
        }

        /* EFFECT SCROLL */
        .navbar-joy.scrolled {
            padding-top: 6px;
            padding-bottom: 6px;
            background: rgba(37, 99, 235, 0.95);
        }

        /* LOGO */
        .navbar-brand img {
            height: 50px;
            width: 200px;
            transition: transform .3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.1) rotate(-0deg);
        }

        /* MENU */
        .nav-link {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
            padding: .5rem 1rem;
            border-radius: .6rem;
            position: relative;
            transition: all .25s ease;
        }

        .nav-link:hover {
            color: #fff !important;
            background: rgba(255,255,255,0.12);
            transform: translateY(-2px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, #facc15, #fde047);
            color: #1e293b !important;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(250, 204, 21, 0.4);
        }

        /* BUTTON LOGIN */
        .btn-outline-light {
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.6);
            transition: all .3s ease;
        }

        .btn-outline-light:hover {
            background: #fff;
            color: #1e3a8a;
            transform: translateY(-2px);
        }

        /* BUTTON REGISTER */
        .btn-light {
            border-radius: 999px;
            background: #fff;
            color: #1e3a8a;
            transition: all .3s ease;
        }

        .btn-light:hover {
            background: #facc15;
            color: #1e293b;
            transform: translateY(-2px);
        }

        /* DASHBOARD */
        .btn-warning {
            border-radius: 999px;
            box-shadow: 0 4px 12px rgba(255,193,7,0.4);
            transition: .3s;
        }

        .btn-warning:hover {
            transform: translateY(-2px) scale(1.03);
        }

        /* LOGOUT */
        .btn-danger {
            border-radius: 999px;
            transition: .3s;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-dark navbar-joy py-3">
    <div class="container">

        <!-- LOGO + TEXT -->
        <a class="navbar-brand fw-bold fs-5 d-flex align-items-center gap-2"
           href="{{ route('home') }}">
            <img src="{{ asset('image/logo icon.png') }}" alt="Logo JoyTravel" width="80" height="80">
            <span class="text-white fw-semibold"></span>
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

                &nbsp;&nbsp;

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
                        <!-- ADMIN -->
                        <li class="nav-item ms-lg-3">
                            <a href="{{ route('admin.dashboard') }}"
                            class="btn btn-warning btn-sm fw-semibold px-4">
                                Dashboard
                            </a>
                        </li>
                    @else
                        <!-- USER -->
                        <li class="nav-item d-flex align-items-center me-2">
                            <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-semibold">
                                {{ auth()->user()->name }}
                            </span>
                        </li>
                    @endif

                    <!-- LOGOUT (UNTUK SEMUA) -->
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

<!-- SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // EFFECT NAVBAR SAAT SCROLL
    window.addEventListener("scroll", function () {
        let navbar = document.getElementById("navbar");
        if (window.scrollY > 20) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });
</script>

</body>
</html>
