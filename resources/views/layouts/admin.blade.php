<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel | JoyTravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f7fb;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        /* NAVBAR */
        .navbar-admin {
            background: linear-gradient(90deg, #1e3a8a, #2563eb);
        }

        .navbar-brand span {
            font-size: 0.75rem;
            letter-spacing: .5px;
        }

        .nav-link {
            color: #e5e7eb !important;
            font-weight: 500;
            padding: .5rem 1rem;
            border-radius: .5rem;
            transition: all .2s ease;
        }

        .nav-link:hover {
            background-color: rgba(255,255,255,.15);
            color: #ffffff !important;
        }

        .nav-link.active {
            background-color: #facc15;
            color: #1e293b !important;
            font-weight: 600;
        }

        /* CARD */
        .admin-card {
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0,0,0,.06);
        }

        /* PAGE HEADER */
        .page-title {
            font-weight: 700;
            color: #0f172a;
        }

        .page-subtitle {
            color: #64748b;
            font-size: .95rem;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-admin shadow-sm">
    <div class="container-fluid px-4">

        <!-- BRAND -->
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold"
           href="{{ route('admin.paket.index') }}">
            <span class="bg-white text-primary rounded-3 px-2 py-1 fw-bold">
                ADMIN
            </span>
            JoyTravel
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2 mt-3 mt-lg-0">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="bi bi-globe me-1"></i> Website
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.paket.index') }}"
                       class="nav-link {{ request()->is('admin/paket*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam me-1"></i> Paket
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('testimoni.index') }}" class="nav-link">
                        <i class="bi bi-chat-left-quote me-1"></i> Testimoni
                    </a>
                </li>

                <li class="nav-item ms-lg-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-light btn-sm px-4 fw-semibold">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-4">
        <h4 class="page-title mb-1">
            Dashboard Admin
        </h4>
        <p class="page-subtitle mb-0">
            Kelola konten dan data JoyTravel dengan mudah
        </p>
    </div>

    <!-- CONTENT SLOT -->
    <div class="admin-card p-4">
        @yield('content')
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
