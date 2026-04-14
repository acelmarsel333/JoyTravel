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

        /* NAVBAR SERAGAM */
        .navbar-joy {
            position: sticky;
            top: 0;
            z-index: 999;
            padding: 12px 0;

            /* WARNA FIX */
            background: linear-gradient(135deg, #2563eb, #1e3a8a);

            /* EFFECT PREMIUM */
            backdrop-filter: blur(10px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        /* LOGO */
        .navbar-brand img {
            height: 40px;
            transition: .3s;
        }

        .navbar-brand:hover img {
            transform: scale(1.1);
        }

        /* TEXT MENU */
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            padding: .5rem 1rem;
            border-radius: .6rem;
            transition: all .25s ease;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.15);
            transform: translateY(-2px);
        }

        /* ACTIVE */
        .nav-link.active {
            background: linear-gradient(135deg, #facc15, #fde047);
            color: #1e293b !important;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(250, 204, 21, 0.5);
        }

        /* BUTTON */
        .btn-outline-light,
        .btn-light,
        .btn-warning,
        .btn-danger {
            border-radius: 999px;
            transition: all .3s ease;
        }

        .btn-outline-light {
            border: 1px solid rgba(255,255,255,0.7);
            color: #fff;
        }

        .btn-outline-light:hover {
            background: #fff;
            color: #1e3a8a;
        }

        .btn-light {
            background: #fff;
            color: #1e3a8a;
        }

        .btn-light:hover {
            background: #facc15;
            color: #1e293b;
        }

        .btn-warning:hover,
        .btn-danger:hover {
            transform: translateY(-2px);
        }

        /* MOBILE */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: linear-gradient(135deg, #2563eb, #1e3a8a);
                padding: 15px;
                border-radius: 12px;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-joy">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold"
           href="{{ route('home') }}">
            <img src="{{ asset('image/logo icon.png') }}" alt="Logo">
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2 mt-3 mt-lg-0">
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                       href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.paket.index') ? 'active' : '' }}"
                       href="{{ route('admin.paket.index') }}">Paket</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.testimoni.index') ? 'active' : '' }}"
                       href="{{ route('admin.testimoni.index') }}">Testimoni</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Website</a>
                </li>
                

                <!-- GUEST -->
                @guest
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-light btn-sm px-4"
                           href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-light btn-sm px-4"
                           href="{{ route('register') }}">Register</a>
                    </li>
                @endguest

                <!-- AUTH -->
                @auth
                    <li class="nav-item ms-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm px-4">
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
