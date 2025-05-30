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
    <header class="text-center p-3 bg-light">
        <h1>Mytodo</h1>
        <p>catat perjalanan tugasmu dengan aplikasi todolist</p>
    </header>


    <!-- Main Content -->
    <main class="container" style="flex: 1;">
        @yield('content')
    </main>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 mb-3">
        <p>&copy; mytodo ~ 2025</p>
    </footer>

    <!-- JS -->
    <script src="{{ asset('assets/script/dashboard.js') }}"></script>
    @stack('scripts')
</body>

</html>