@extends('layouts.app_landing')

@section('content')
    <section id="about" class="section py-5">
        <div class="container">

            <!-- Title with animation -->
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="fw-bold display-5 mb-3">Tentang <span class="text-primary">Absen Pintar</span></h2>
                <p class="text-muted fs-5">Solusi absensi digital yang modern, praktis, dan efisien</p>
            </div>

            <div class="row align-items-center gy-4">

                <!-- Image Section -->
                <div class="col-lg-6" data-aos="zoom-in">
                    <div class="position-relative">
                        <img src="{{ asset('assets/image/ilustrasi.jpeg') }}"
                            class="img-fluid rounded-4 shadow-lg about-img-hover" alt="About Us">

                        <!-- Light shadow/overlay -->
                        <span class="about-overlay"></span>
                    </div>
                </div>

                <!-- Text Section -->
                <div class="col-lg-6" data-aos="fade-left">
                    <p class="fs-5">
                        Selamat datang di blog resmi <strong>Absen Pintar</strong>.<br><br>
                        Kami menyediakan solusi absensi online yang dirancang untuk mempermudah
                        proses presensi secara modern dan efisien.
                        Blog ini hadir sebagai sumber informasi, panduan, dan wawasan seputar:
                    </p>

                    <ul class="fs-5">
                        <li>Absensi digital & pengelolaannya</li>
                        <li>Manajemen SDM modern</li>
                        <li>Teknologi produktivitas kerja</li>
                        <li>Tren digitalisasi perkantoran</li>
                    </ul>

                    <p class="fs-5">
                        Kami percaya transformasi digital dimulai dari hal sederhana seperti absensi
                        yang terintegrasi dan mudah diakses.
                        Karena itu, kami menghadirkan solusi yang praktis, efisien, dan terjangkau
                        untuk berbagai skala kebutuhan.
                    </p>

                    <div class="mt-4">
                        <a href="{{ url('/about') }}" class="btn btn-primary btn-lg px-4 py-2 shadow-sm">
                            Baca Artikel Terbaru
                        </a>
                    </div>
                </div>
            </div>

            <!-- Highlight Quote -->
            <div class="mt-5">
                <div class="p-4 bg-light rounded-4 shadow-sm text-center" data-aos="fade-up">
                    <h4 class="mb-0 fst-italic text-secondary">
                        “Transformasi digital dimulai dari absensi yang sederhana namun bermakna.”
                    </h4>
                </div>
            </div>

        </div>
    </section>

    {{-- Custom CSS --}}
    <style>
        .about-img-hover {
            transition: transform .4s ease, box-shadow .4s ease;
            border-radius: 15px;
        }

        .about-img-hover:hover {
            transform: scale(1.05);
            box-shadow: 0 25px 40px rgba(0, 0, 0, 0.15);
        }

        .about-overlay {
            position: absolute;
            inset: 0;
            border-radius: 15px;
            background: rgba(0, 0, 0, 0.15);
            opacity: 0;
            transition: opacity .3s ease;
        }

        .about-img-hover:hover+.about-overlay {
            opacity: 1;
        }
    </style>
@endsection
