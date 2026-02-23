{{-- <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'mytodo.my.id')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/style/style_index2.css') }}">
    @stack('styles')

    <style>
    #sidebar.hidden {
        display: none;
    }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="text-center py-3" style="background-color: #2196f3; color: white;">
        <h1>Mytodo</h1>
        <p>Catat perjalanan tugasmu dengan aplikasi todolist</p>
    </header>

    <!-- Layout -->
    <div id="layout" class="d-flex">
        <button id="toggleSidebar" class="btn btn-secondary m-2 position-absolute"
            style="z-index: 999; transition:0,5s;">☰</button>

        <!-- Sidebar -->
        <nav id="sidebar" class="bg-light p-3" style="width: 200px; transition: width 0.5s;">
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/dashboard') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/catatans/index') }}">Catatan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/keuangans/index') }}">Keuangan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/tasks/index') }}">Todolist User</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/users/index') }}">User Manager</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/admin_list/index') }}">Admin List</a>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/lembur') }}">Laporan user lembur</a>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/lembur/bonus') }}">update bonus</a>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/chat') }}">chat</a>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/profile') }}">profile</a>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/subscriptions') }}">langganan</a>

                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link p-0 text-start">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="container-fluid p-4" style="flex: 1;">
            @yield('content')
        </main>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 mytodo.my.id All rights reserved.</p>
        <p>Email: support@mytodo.com</p>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('hidden');
    });
    </script>
    <script src="{{ asset('assets/script/dashboard.js') }}"></script>
    @stack('scripts')
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        body {
            background: #f1f5f9;
            overflow-x: hidden;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #0f172a;
            color: white;
            transition: 0.3s;
            z-index: 1050;
            padding-top: 20px;
        }

        .sidebar .brand {
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #cbd5e1;
            text-decoration: none;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #1e293b;
            color: white;
        }

        .sidebar .active-link {
            background: #2563eb;
            color: white !important;
        }

        /* ================= CONTENT ================= */

        .main-content {
            margin-left: 250px;
            padding: 25px;
            transition: 0.3s;
        }

        .top-navbar {
            background: white;
            padding: 15px 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        /* ================= MOBILE ================= */

        @media (max-width: 991px) {

            .sidebar {
                left: -250px;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
                padding: 15px;
            }
        }

        /* ================= TABLE ================= */

        .table-responsive {
            overflow-x: auto;
        }

        /* ================= CARD ================= */

        .card-custom {
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: none;
        }

        /* ================= LOGOUT ================= */

        .logout-btn {
            border: none;
            background: transparent;
            color: #f87171;
            padding: 12px 20px;
            width: 100%;
            text-align: left;
        }

        .logout-btn:hover {
            background: #1e293b;
            color: white;
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- ================= SIDEBAR ================= -->
    <div class="sidebar" id="sidebar">

        <div class="brand">
            Admin Panel
        </div>

        <a href="{{ url('/admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active-link' : '' }}">
            <i class="fa fa-house me-2"></i> Home
        </a>

        <a href="{{ url('/admin/catatans/index') }}"
            class="{{ request()->is('admin/catatans*') ? 'active-link' : '' }}">
            <i class="fa fa-note-sticky me-2"></i> Catatan
        </a>

        <a href="{{ url('/admin/keuangans/index') }}"
            class="{{ request()->is('admin/keuangans*') ? 'active-link' : '' }}">
            <i class="fa fa-wallet me-2"></i> Keuangan
        </a>

        <a href="{{ url('/admin/tasks/index') }}" class="{{ request()->is('admin/tasks*') ? 'active-link' : '' }}">
            <i class="fa fa-list-check me-2"></i> Todolist User
        </a>

        <a href="{{ url('/admin/users/index') }}" class="{{ request()->is('admin/users*') ? 'active-link' : '' }}">
            <i class="fa fa-users me-2"></i> User Manager
        </a>

        <a href="{{ url('/admin/admin_list/index') }}"
            class="{{ request()->is('admin/admin_list*') ? 'active-link' : '' }}">
            <i class="fa fa-user-shield me-2"></i> Admin List
        </a>

        <a href="{{ url('/admin/lembur') }}" class="{{ request()->is('admin/lembur') ? 'active-link' : '' }}">
            <i class="fa fa-clock me-2"></i> Laporan Lembur
        </a>

        <a href="{{ url('admin/lembur/bonus') }}"
            class="{{ request()->is('admin/lembur/bonus') ? 'active-link' : '' }}">
            <i class="fa fa-gift me-2"></i> Update Bonus
        </a>

        <a href="{{ url('/admin/chat') }}" class="{{ request()->is('admin/chat') ? 'active-link' : '' }}">
            <i class="fa fa-comments me-2"></i> Chat
        </a>

        <a href="{{ url('admin/profile') }}" class="{{ request()->is('admin/profile') ? 'active-link' : '' }}">
            <i class="fa fa-id-card me-2"></i> Profile
        </a>

        <a href="{{ url('/admin/subscriptions') }}"
            class="{{ request()->is('admin/subscriptions*') ? 'active-link' : '' }}">
            <i class="fa fa-credit-card me-2"></i> Langganan
        </a>

        <!-- LOGOUT -->
        <div class="mt-auto position-absolute bottom-0 w-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-btn">
                    <i class="fa fa-right-from-bracket me-2"></i> Logout
                </button>
            </form>
        </div>

    </div>

    <!-- ================= MAIN CONTENT ================= -->

    <div class="main-content">

        <!-- TOP NAVBAR -->
        <div class="top-navbar d-flex justify-content-between align-items-center">

            <!-- Hamburger (Mobile Only) -->
            <button class="btn btn-outline-dark d-lg-none" onclick="toggleSidebar()">
                <i class="fa fa-bars"></i>
            </button>

            <div class="fw-bold">
                @yield('title')
            </div>

            <div>
                {{ auth()->user()->name ?? 'Admin' }}
            </div>

        </div>

        <!-- PAGE CONTENT -->
        @yield('content')

    </div>

    <!-- ================= SCRIPT ================= -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }

        // Optional: close sidebar when clicking outside (mobile)
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            if (window.innerWidth < 991) {
                if (!sidebar.contains(e.target) && !e.target.closest('button')) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>

    @stack('scripts')

</body>

</html>
