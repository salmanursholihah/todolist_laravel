<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UCT Activity Plan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Style Custom -->
    <link rel="stylesheet" href="{{ asset('assets/style/style_index.css') }}">

    <!-- Google Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7858281078425614"
        crossorigin="anonymous"></script>


    <style>
        /* =========================
HEADER
========================= */

        .main-header {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 95%;
            max-width: 1200px;
            z-index: 1000;
            transition: all .3s ease;
        }

        .main-header.scrolled {
            top: 0;
            width: 100%;
            max-width: 100%;
            border-radius: 0;
            background: #ffffff;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .main-header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            transition: all .3s ease;
        }

        .main-header.scrolled nav {
            background: transparent;
            border: none;
            padding: 1.2rem 2rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            text-decoration: none;
            color: #2563eb;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 1.8rem;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            text-decoration: none;
            color: #475569;
            font-weight: 500;
            transition: .3s;
        }

        .nav-link:hover {
            color: #2563eb;
        }

        .contact-button {
            background: #2563eb;
            color: white;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 14px;
        }

        .contact-button:hover {
            background: #1e40af;
            color: white;
        }


        /* =========================
MAIN SPACING
========================= */

        main {
            padding-top: 130px;
        }


        /* =========================
FOOTER
========================= */

        .footer-link {
            text-decoration: none;
            color: #64748b;
            display: block;
            margin-bottom: 6px;
        }

        .footer-link:hover {
            color: #2563eb;
        }


        /* =========================
RESPONSIVE
========================= */

        @media(max-width:768px) {

            .nav-menu {
                display: none;
            }

            main {
                padding-top: 140px;
            }

        }
    </style>

</head>

<body>



    <!-- =========================
NAVBAR
========================= -->

    <header class="main-header">

        <nav class="container">

            <a href="#" class="logo">UCTA</a>

            <ul class="nav-menu">

                <li><a href="{{ url('/') }}" class="nav-link">Beranda</a></li>

                <li><a href="{{ url('/about') }}" class="nav-link">About</a></li>

                <li><a href="{{ url('/subscription/select-plan') }}" class="nav-link">Fitur</a></li>

                <li><a href="{{ url('/blog') }}" class="nav-link">Blog</a></li>

                <li><a href="{{ url('/panduan') }}" class="nav-link">Panduan</a></li>

                <li><a href="{{ url('/kontak') }}" class="nav-link">Kontak</a></li>

                <li><a href="{{ url('/dashboard') }}" class="nav-link">Activity</a></li>

                <li><a href="{{ url('/register') }}" class="nav-link">Daftar</a></li>

                <li><a href="{{ url('/login') }}" class="nav-link">Masuk</a></li>

                <li>
                    <a href="#" class="contact-button">Coba Gratis</a>
                </li>

            </ul>

        </nav>

    </header>



    <!-- =========================
MAIN CONTENT
========================= -->

    <main>

        @yield('content')

    </main>



    <!-- =========================
FOOTER
========================= -->

    <footer style="background:#f1f6ff; color:#1e293b; padding-top:40px; margin-top:60px; border-top:1px solid #e2e8f0;">

        <div class="container">

            <div class="row">


                <!-- Logo -->
                <div class="col-lg-3 col-md-6 mb-4">

                    <img src="{{ asset('storage/logo/logo-uct.png') }}" width="150">

                    <p class="mt-3" style="color:#64748b;">
                        Jl. Ahmad Yani Perum PJKA No.4,<br>
                        Magelang, Jawa Tengah
                    </p>

                    <p style="color:#64748b;">📱 0812 3467 858</p>
                    <p style="color:#64748b;">📧 halo@uct.com</p>

                </div>


                <!-- Tentang -->
                <div class="col-lg-3 col-md-6 mb-4">

                    <h5 style="color:#2563eb;font-weight:600;">Tentang Kami</h5>

                    <ul class="list-unstyled">

                        <li><a href="{{ url('/about') }}" class="footer-link">Tentang</a></li>

                        <li><a href="{{ url('/blog') }}" class="footer-link">Blog</a></li>

                        <li><a href="{{ url('/kontak') }}" class="footer-link">FAQ</a></li>

                        <li><a href="#" class="footer-link">Jadwalkan Demo</a></li>

                        <li><a href="{{ url('/login') }}" class="footer-link">Login</a></li>

                    </ul>

                </div>



                <!-- Layanan -->
                <div class="col-lg-3 col-md-6 mb-4">

                    <h5 style="color:#2563eb;font-weight:600;">Layanan</h5>

                    <ul class="list-unstyled">

                        <li><a href="{{ url('/panduan') }}" class="footer-link">Cara Registrasi</a></li>

                        <li><a href="{{ url('/panduan') }}" class="footer-link">Panduan Aplikasi</a></li>

                        <li>
                            <a href="https://sites.google.com/view/uctadiv/halaman-muka" class="footer-link">
                                Kebijakan Kami
                            </a>
                        </li>

                        <li>
                            <a href="https://sites.google.com/view/uctadivmyid/halaman-muka" class="footer-link">
                                Kebijakan Privasi
                            </a>
                        </li>

                    </ul>

                </div>



                <!-- Maps -->
                <div class="col-lg-3 col-md-6 mb-4">

                    <h5 style="color:#2563eb;font-weight:600;">Lokasi</h5>

                    <div class="ratio ratio-4x3" style="border-radius:10px;overflow:hidden;">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3260.606862730542!2d110.21981317500169!3d-7.465586392545967"
                            style="border:0;" allowfullscreen loading="lazy">
                        </iframe>

                    </div>

                </div>


            </div>


            <hr style="border-color:#e2e8f0;">


            <div class="text-center mt-3" style="color:#64748b;">

                © 2025 UCT Activity Plan - Hak cipta dilindungi.

            </div>

        </div>

    </footer>



    <!-- =========================
JS
========================= -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        window.addEventListener("scroll", function() {

            const header = document.querySelector(".main-header");

            if (window.scrollY > 50) {

                header.classList.add("scrolled");

            } else {

                header.classList.remove("scrolled");

            }

        });
    </script>


</body>

</html>
