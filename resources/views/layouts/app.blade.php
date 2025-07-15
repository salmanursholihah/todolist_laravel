<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'mytodo.my.id')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/style/style_index2.css') }}">
    @stack('styles')
</head>

<body>
    <!-- Overlay untuk mobile -->
    <div id="overlay"></div>

    <!-- Header -->
    <header class="text-center py-3" style="background: #2196f3; color: white;">
        <h1>Mytodo</h1>
        <p>Catat perjalanan tugasmu dengan aplikasi todolist</p>
    </header>

    <!-- Layout -->
    <div id="layout" class="d-flex">
        <button id="toggleSidebar" class="btn btn-secondary m-2 position-absolute" style="z-index: 999;">☰</button>

        <!-- Sidebar -->
        <nav id="sidebar" class="bg-light p-3">
            <ul class="nav flex-column mt-5">
                @auth
                <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/tasks') }}">Todo</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/calendar') }}">Calendar</a></li>
                @if(auth()->user()->email === 'dwidoraptucta@gmail.com')
                <li class="nav-item"><a class="nav-link" href="{{ url('keuangan') }}">Keuangan</a></li>
                @endif
                <li class="nav-item"><a class="nav-link" href="{{ url('catatan') }}">Catatan</a></li>
                @endauth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link p-0 m-0"
                            style="text-align: left;">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="container-fluid p-4" style="flex: 1;">
            @yield('content')
        </main>
    </div>

    <footer class="footer text-center mt-4">
        <p>&copy; 2025 mytodo.my.id All rights reserved.</p>
        <p>Email: support@mytodo.com</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    const toggle = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    toggle.addEventListener('click', function() {
        if (window.innerWidth < 768) {
            sidebar.classList.toggle('show');
            overlay.style.display = sidebar.classList.contains('show') ? 'block' : 'none';
        } else {
            sidebar.classList.toggle('hidden');
        }
    });

    overlay.addEventListener('click', function() {
        sidebar.classList.remove('show');
        overlay.style.display = 'none';
    });
    </script>

    @stack('scripts')
</body>

</html>