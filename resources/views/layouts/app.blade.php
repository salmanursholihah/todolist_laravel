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
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            background: #fff;
            border-right: 1px solid #e5e7eb;
            min-height: 100vh;
        }
        .sidebar .nav-link {
            font-weight: 500;
            color: #374151;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: #d1fae5;
            color: #059669;
            border-radius: 8px;
        }
        .bottom-nav {
            display: none;
        }
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .bottom-nav {
                display: flex;
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background: #fff;
                border-top: 1px solid #e5e7eb;
                justify-content: space-around;
                padding: 0.5rem 0;
                z-index: 50;
            }
            .bottom-nav a {
                text-align: center;
                color: #374151;
                font-size: 0.8rem;
            }
            .bottom-nav a.active {
                color: #059669;
            }
        }
    </style>
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
