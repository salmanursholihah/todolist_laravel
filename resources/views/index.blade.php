<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mytodo.my.id</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="{{ asset('assets/style/style_index.css') }}">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7858281078425614"
     crossorigin="anonymous"></script>
</head>

<body>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-content">
            <h1>Selamat datang di mytodo.my.id</h1>
            <p>Solusi cerdas untuk mengelola tugas harian anda.</p>
            <a href="#" class="cta-button">Pelajari Lebih Lanjut</a>
        </div
    </header>
    <nav>
        <ul class="nav-links">
            <li><a href="">Beranda</a></li>
            <li><a href="">Tentang</a></li>
            <li><a href="">Fitur</a></li>
            <li><a href="">Kontak</a></li>
        </ul>
    </nav>

    <!-- Features Section -->
    <section id="features" class="features">
        <h2>Fitur Unggulan</h2>
        <div class="feature-list">
            <div class="feature">
                <h3>Manajemen Data</h3>
                <p>Kelola data Anda dengan aman dan mudah diakses.</p>
            </div>
            <div class="feature">
                <h3>Reminder harian</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, labore.</p>
            </div>
            <div class="feature">
                <h3>Laporan Real-time</h3>
                <p>Dapatkan analisis dan laporan kapan saja secara langsung.</p>
            </div>
        </div>
    </section>

    <br><br><br><br>

    <!-- CTA Section -->
    <section class="cta">
        <h2>Mulai Gunakan mytodo Sekarang</h2>
        <p>Gabung dan jadikan tugas anda terkelola</p><br><br>
        <a href="{{ route('register') }}" class="cta-button">Daftar Sekarang</a>
        <a href="{{ route('login') }}" class="cta-button">Login</a>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 mytodo.my.id All rights reserved.</p>
        <p>Email: support@mytodo.com</p>
    </footer>

</body>

</html>

