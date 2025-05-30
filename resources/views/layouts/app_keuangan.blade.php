<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'mytodo.my.id')</title>

    <!--js-->
    <link rel="stylesheet" href="{{ asset('assets/script/dasboard.js') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/style/.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    @stack('styles')
</head>

<body>
    <!-- Header -->
    <header style="text-align:center; padding:3px; background-color: #2196f3; color:white;">
        <h1>Mytodo</h1>
        <p>catat perjalanan tugasmu dengan aplikasi todolist</p>
    </header>

    <!-- Toggle Sidebar Button -->
    <button id="toggleSidebar" class="btn btn-secondary m-2">☰</button>

    <div style="display: flex;">
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-light p-3" style="width: 200px; transition: width 0.3s;">
            <ul class="nav flex-column">
                <li><a class="nav-link" href="{{ url('/dashboard') }}">Home</a></li>
                <li><a class="nav-link" href="{{ url('/tasks') }}">Todo</a></li>
                <li><a class="nav-link" href="{{ url('/setting') }}">Setting</a></li>
                <li><a class="nav-link" href="{{ url('/calendar') }}">calendar</a></li>
                <li><a class="nav-link" href="{{ url('keuangan') }}">keuangan</a></li>
                <li><a class="nav-link" href="{{ url('catatan') }}">catatan</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post" style="display:inline">
                        @csrf
                        <button type="submit" class="nav-link">
                            logout
                        </button>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="container" style="flex: 1;">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer style="text-align:center; margin-top:5px; margin-buttom:3px; background-color: #2196f3; color: white;">
        <p>&copy; mytodo ~ 2025</p>
    </footer>

    <!-- JS -->
    <script src="{{ asset('assets/script/dashboard.js') }}"></script>
    @stack('scripts')
</body>

</html>