<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absenpintar - Demo Landing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style/style_index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7858281078425614"
     crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-#44889c shadow-sm py-4 ">
        <div class="container">
            <a class="navbar-brand" style="font-weight:bold; font-family:arial">Absen Pintar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse font-weight-bold" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">beranda</a></li>
                    <li class="nav-item"><a href="{{ url('/subscription/select-plan') }}" class="nav-link">Fitur</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="{{ url('/panduan') }}" class="nav-link">Panduan</a></li>
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


<footer style="background-color:#44889c; color:white; padding-top:10px; margin-top:5px; padding-buttom:4px;">  
  <div class="container">
    <div class="row">

      <!-- Logo dan alamat -->
      <div class="col-lg-3 col-md-6 mb-4">
        <img src="logo-uct.png" alt="Absen pintar Logo" style="width:150px;">
        <p class="mt-3">
          Jl. Ahmad Yani Perum PJKA No.4, RT.03/RW.02,<br> Magelang, Jawa Tengah
        </p>
        <p>📱 0812 3467 858</p>
        <p>📧 halo@uct.com</p>
        <div class="d-flex gap-2">
          <a href="#"><img src="{{ asset('storage/logo/logo-facebook.jpg') }}" width="24"></a>
          <a href="#"><img src="{{ asset('storage/logo/logo-twitter.jpg') }}" width="24"></a>
          <a href="https://www.tiktok.com/@ospod67?_t=ZS-8ycKl7yOd2G&_r=1"><img src="{{ asset('storage/logo/logo-tiktok.jpg') }}" width="24"></a>
          <a href="https://www.instagram.com/pt_utama_ciptatataasri?igsh=MTc1a3Vnem9qN2NvbQ=="><img src="{{ asset('storage/logo/logo-instagram.jpg') }}" width="24"></a>
          <a href="https://youtube.com/@ospod-milos?si=pJO2FPcFW9RLsaY9"><img src="{{ asset('storage/logo/logo-youtube.jpg') }}" width="24"></a>
          <a href="#"><img src="{{ asset('storage/logo/logo-linkedin.jpg') }}" width="24"></a>
        </div>
      </div>

      <!-- Menu links 1 -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5>Tentang Kami</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Tentang</a></li>
          <li><a href="#" class="text-white">Blog</a></li>
          <li><a href="#" class="text-white">FAQ</a></li>
          <li><a href="#" class="text-white">Jadwalkan Demo</a></li>
          <li><a href="#" class="text-white">Karir</a></li>
          <li><a href="#" class="text-white">Login</a></li>
        </ul>
      </div>

      <!-- Menu links 2 -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5>Layanan</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Cara Registrasi</a></li>
          <li><a href="#" class="text-white">Panduan Aplikasi</a></li>
          <li><a href="#" class="text-white">Syarat & Ketentuan</a></li>
          <li><a href="#" class="text-white">Kebijakan Privasi</a></li>
          <li><a href="#" class="text-white">Pengembalian Dana</a></li>
          <li><a href="#" class="text-white">Keamanan Layanan</a></li>
        </ul>
      </div>

      <!-- Google maps -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5>Lokasi</h5>
        <div class="ratio ratio-4x3">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3260.606862730542!2d110.21981317500169!3d-7.465586392545967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8f06c1ce38eb%3A0xb67783d2e0568c26!2sPJKA%204%20(BKW)!5e1!3m2!1sid!2sid!4v1754383919161!5m2!1sid!2sid"
            style="border:0;" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>
    </div>

    <hr class="border-secondary" />
    <div class="text-center mt-3" style="font-weight: bold;">
      &copy; 2025 Absen Pintar - Hak cipta dilindungi.
    </div>
  </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
   