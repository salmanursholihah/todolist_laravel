<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Mytodo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
<style>
    body {
        background: #f4f7fb;
        font-family: 'Poppins', sans-serif;
    }

    .sidebar {
        background: #ffffff;
        border-right: 1px solid #eef2f7;
        min-height: 100vh;
        box-shadow: 4px 0 20px rgba(0,0,0,0.03);
    }

    .sidebar h5 {
        font-weight: 600;
        color: #1f2937;
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #6b7280;
        padding: 10px 14px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .sidebar .nav-link:hover {
        background: #eef2ff;
        color: #2563eb;
        transform: translateX(4px);
    }

    .sidebar .nav-link.active {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: #fff;
    }

    main {
        padding: 30px;
    }

    /* Bottom nav mobile */
    .bottom-nav {
        display: none;
    }

    @media (max-width: 768px) {
        .sidebar {
            display: none;
        }

        main {
            padding-bottom: 90px;
        }

        .bottom-nav {
            display: flex;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #ffffff;
            border-top: 1px solid #e5e7eb;
            justify-content: space-around;
            padding: 10px 0;
            z-index: 50;
            box-shadow: 0 -5px 20px rgba(0,0,0,0.05);
        }

        .bottom-nav a {
            text-align: center;
            color: #6b7280;
            font-size: 0.75rem;
            transition: 0.3s;
        }

        .bottom-nav a.active {
            color: #2563eb;
            font-weight: 600;
        }

        .bottom-nav i {
            display: block;
            margin-bottom: 4px;
        }
    }
</style>
    @if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
    @endif
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar (Desktop) -->
        <aside class="sidebar p-3 d-none d-md-block" style="width: 250px;">
            <h5 class="fw-bold mb-4">Mytodo Dashboard</h5>
            <nav class="nav flex-column">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house me-2"></i> Beranda
                </a>
                <a href="{{ url('/jadwal') }}" class="nav-link {{ request()->is('jadwal') ? 'active' : '' }}">
                    <i class="fa-solid fa-calendar-days me-2"></i> Jadwal
                </a>
                <a href="{{ url('/aktivitas') }}" class="nav-link {{ request()->is('aktivitas') ? 'active' : '' }}">
                    <i class="fa-solid fa-list-check me-2"></i> Aktivitas
                </a>
                <a href="{{ url('/notifikasi') }}" class="nav-link {{ request()->is('notifikasi') ? 'active' : '' }}">
                    <i class="fa-solid fa-bell me-2"></i> Notifikasi
                </a>
                <a href="{{ url('/profile') }}" class="nav-link {{ request()->is('profil') ? 'active' : '' }}">
                    <i class="fa-solid fa-user me-2"></i> Profil
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-fill p-4">
            @yield('content')
        </main>
    </div>

    <!-- Bottom Navigation (Mobile) -->
    <nav class="bottom-nav">
        <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-house fa-lg"></i>
            <div>Beranda</div>
        </a>
        <a href="{{ url('/jadwal') }}" class="{{ request()->is('jadwal') ? 'active' : '' }}">
            <i class="fa-solid fa-calendar-days fa-lg"></i>
            <div>Jadwal</div>
        </a>
        <a href="{{ url('/aktivitas') }}" class="{{ request()->is('aktivitas') ? 'active' : '' }}">
            <i class="fa-solid fa-list-check fa-lg"></i>
            <div>Aktivitas</div>
        </a>
        <a href="{{ url('/notifikasi') }}" class="{{ request()->is('notifikasi') ? 'active' : '' }}">
            <i class="fa-solid fa-bell fa-lg"></i>
            <div>Notifikasi</div>
        </a>
        <a href="{{ url('/profil') }}" class="{{ request()->is('profil') ? 'active' : '' }}">
            <i class="fa-solid fa-user fa-lg"></i>
            <div>Profil</div>
        </a>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
