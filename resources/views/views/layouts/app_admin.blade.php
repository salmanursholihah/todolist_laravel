<!DOCTYPE html>
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
</head>

<body>
    <!-- Header -->
    <header class="text-center py-3" style="background-color: #2196f3; color: white;">
        <h1>Mytodo</h1>
        <p>Catat perjalanan tugasmu dengan aplikasi todolist</p>
    </header>

    <!-- Layout -->
    <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="bg-light p-3" style="width: 200px; transition: width 0.3s;">
            <button id="toggleSidebar" class="btn btn-secondary mb-3">☰</button>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/dashboard') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/catatans/index') }}">Catatan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/keuangans/index') }}">Keuangan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/tasks/index') }}">Todolist User</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/users/index') }}">User Manager</a></li>
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
    <footer class="text-center mt-3 py-2" style="background-color: #2196f3; color: white;">
        <p>&copy; Mytodo ~ 2025</p>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/script/dashboard.js') }}"></script>
    @stack('scripts')
</body>

</html>