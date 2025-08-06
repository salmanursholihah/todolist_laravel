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


        <footer class="footer">
  <div class="footer-top">
    <div class="footer-logo">
      <img src="logo-uct.png" alt="uct Logo" class="logo">
      <p>Jl. Ahmad Yani Perum PJKA No.4, RT.03/RW.02, 
        <br>Magelang, Kec. Magelang Utara, Kota Magelang, Jawa Tengah</p>
      <p><i class="whatsapp-icon">📱</i>08123467858</p>
      <p><i class="email-icon">📧</i> halo@uct.com</p>
      <div class="social-icons">
        <a href="#"><img src="{{ asset('storage/logo/logo-facebook.jpg')}}" alt="Facebook"></a>
        <a href="#"><img src="{{ asset('storage/logo/logo-twitter.jpg') }}" alt="Twitter"></a>
        <a href="https://www.tiktok.com/@ospod67?_t=ZS-8ycKl7yOd2G&_r=1"><img src="{{ asset('storage/logo/logo-tiktok.jpg') }}" alt="TikTok"></a>
        <a href="https://www.instagram.com/pt_utama_ciptatataasri?igsh=MTc1a3Vnem9qN2NvbQ=="><img src="{{ asset('storage/logo/logo-instagram.jpg') }}" alt="Instagram"></a>
        <a href="https://youtube.com/@ospod-milos?si=pJO2FPcFW9RLsaY9"><img src="{{ asset('storage/logo/logo-youtube.jpg') }}" alt="YouTube"></a>
        <a href="#"><img src="{{ asset('storage/logo/logo-linkedin.jpg') }}" alt="LinkedIn"></a>
      </div>
    </div>

    <div class="footer-links">
      <div>
        <h4>Tentang Kami</h4>
        <ul>
          <li><a href="#">Tentang</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Jadwalkan Demo</a></li>
          <li><a href="#">Karir</a></li>
          <li><a href="#">Login</a></li>
        </ul>
      </div>
      <div>
        <h4>Layanan</h4>
        <ul>
          <li><a href="#">Cara Registrasi</a></li>
          <li><a href="#">Panduan Aplikasi</a></li>
          <li><a href="#">Syarat & Ketentuan</a></li>
          <li><a href="#">Kebijakan Privasi</a></li>
          <li><a href="#">Pengembalian Dana</a></li>
          <li><a href="#">Keamanan Layanan</a></li>
        </ul>
      </div>
      <div>
        <h4>Fitur</h4>
        <ul>
          <li><a href="#">Absensi Online Gratis</a></li>
          <li><a href="#">Absensi Karyawan</a></li>
          <li><a href="#">Aplikasi Absensi Mobile</a></li>
          <li><a href="#">Employee Self Service</a></li>
        </ul>
      </div>

      <div>
        <h4>Lokasi</h4>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3260.606862730542!2d110.21981317500169!3d-7.465586392545967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8f06c1ce38eb%3A0xb67783d2e0568c26!2sPJKA%204%20(BKW)!5e1!3m2!1sid!2sid!4v1754383919161!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
  <br><br><br><br>

        <p style="font-weight: bold;">&copy; 2025 uctadiv - Hak cipta dilindungi.</p>
    </footer>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
