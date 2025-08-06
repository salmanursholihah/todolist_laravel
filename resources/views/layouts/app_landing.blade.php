<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uctadiv - Demo Landing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style/style_index.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-4">
        <div class="container">
            <a class="navbar-brand" style="font-weight:bold; font-family:arial">Uctadiv ~ Mytodo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse font-weight-bold" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">beranda</a></li>
                    <li class="nav-item"><a href="#fitur" class="nav-link">Fitur</a></li>
                    <li class="nav-item"><a href="#fitur" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="#panduan" class="nav-link">Panduan</a></li>
                    <li class="nav-item"><a href="/kontak" class="nav-link">Kontak</a></li>
                    <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link">Absensi</a></li>
                    <li class="nav-item"><a href="{{  url('/register')}}" class="nav-link">Daftar</a></li>
                    <li class="nav-item"><a href="{{ url('/login') }}" class="nav-link">Masuk</a></li>
                    <li class="nav-item">
                        <a href="#" class="btn btn-primary">Coba Gratis</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>


<footer class="bg-dark text-white pt-5 pb-4">
  <div class="container">
    <div class="row">

      <!-- Tentang Kami -->
      <div class="col-md-3 col-12 mb-4">
        <h5>Tentang Kami</h5>
        <p>UCTAdiv adalah platform absensi online pintar yang membantu perusahaan mencatat kehadiran karyawan secara efisien dan akurat.</p>
      </div>

      <!-- Menu Navigasi -->
      <div class="col-md-3 col-12 mb-4">
        <h5>Menu</h5>
        <ul class="list-unstyled">
          <li><a href="#home" class="text-white">Beranda</a></li>
          <li><a href="#fitur" class="text-white">Fitur</a></li>
          <li><a href="#blog" class="text-white">Blog</a></li>
          <li><a href="#contact" class="text-white">Kontak</a></li>
        </ul>
      </div>

      <!-- Kontak -->
      <div class="col-md-3 col-12 mb-4">
        <h5>Kontak</h5>
        <ul class="list-unstyled">
          <li>Email: info@uctadiv.com</li>
          <li>Telp: 0812-3456-7890</li>
          <li>Alamat: Jl. Contoh No. 123</li>
        </ul>
      </div>

      <!-- Google Maps -->
      <div class="col-md-3 col-12 mb-4">
        <h5>Lokasi</h5>
        <div class="ratio ratio-4x3">
          <iframe
            src="https://maps.google.com/maps?q=Jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
            allowfullscreen
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </div>
    </div>

    <hr class="border-secondary" />
    <div class="text-center mt-3">
      &copy; 2025 UCTAdiv. All rights reserved.
    </div>
  </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
