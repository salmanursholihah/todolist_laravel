<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'mytodo.my.id')</title>

    <!--js-->
    <link rel="stylesheet" href="{{ asset('assets/script/dasboard.js') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/style/style_index2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    @stack('styles')
</head>

<body>
    <!-- Header -->
    <header class="text-center py-3" style="background-color: #2196f3; color: white;">
        <h1>Mytodo</h1>
        <p>Catat perjalanan tugasmu dengan aplikasi todolist</p>
    </header>




    <!-- Main Content -->
    <main class="container" style="flex: 1;">
        @yield('content')
    </main>
    </div>

    <!-- Footer -->
  <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 mytodo.my.id All rights reserved.</p>
        <p>Email: support@mytodo.com</p>
    </footer>

    <!-- JS -->
    <script src="{{ asset('assets/script/dashboard.js') }}"></script>
    @stack('scripts')
</body>

</html>