@extends('layouts.app_landing')

@section('content')
<div class="container py-5">

    <h2 class="text-center mb-4 fw-bold">Daftar Artikel Blog</h2>

    @php
        // Total blog → sesuaikan dengan jumlah file kamu
        $totalBlogs = 7;

        // Judul artikel
        $titles = [
            1 => 'Ekonomi Kreatif & Peluang Kerja Baru',
            2 => 'Perkembangan Teknologi AI di Indonesia',
            3 => 'Panduan Kesehatan Digital di Era Modern',
            4 => 'Politik Sehat untuk Pemilih Pemula',
            5 => 'Pentingnya Absensi Realtime untuk Perusahaan',
            6 => 'Mengapa Sistem Absensi Digital Lebih Efisien?',
            7 => 'Inovasi Pendidikan Modern Berbasis Teknologi',
        ];

        // Short description (optional)
        $descriptions = [
            1 => 'Bagaimana ekonomi kreatif membuka peluang kerja baru bagi generasi muda.',
            2 => 'Dampak kecerdasan buatan terhadap bisnis dan kehidupan sehari-hari.',
            3 => 'Cara menjaga kesehatan dengan memanfaatkan teknologi digital.',
            4 => 'Memahami politik sehat dan peran generasi muda dalam demokrasi.',
            5 => 'Mengapa absensi realtime menjadi kebutuhan penting perusahaan.',
            6 => 'Kelebihan sistem absensi digital dibandingkan metode manual.',
            7 => 'Perkembangan teknologi yang mengubah dunia pendidikan modern.',
        ];

        // Thumbnail ilustrasi sederhana (bebas diganti)
        $images = [
            1 => 'https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?q=80&w=800',
            2 => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?q=80&w=800',
            3 => 'https://images.unsplash.com/photo-1587502534671-0d7a1f9f05b3?q=80&w=800',
            4 => 'https://images.unsplash.com/photo-1533973860717-d49dfd14cf64?q=80&w=800',
            5 => 'https://images.unsplash.com/photo-1581091870627-3a81e3c92e96?q=80&w=800',
            6 => 'https://images.unsplash.com/photo-1526378722484-bd91ca387e72?q=80&w=800',
            7 => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=800',
        ];
    @endphp

    <div class="row g-4">

        @for ($i = 1; $i <= $totalBlogs; $i++)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100 blog-card" style="transition: .3s">

                    <img src="{{ $images[$i] }}" class="card-img-top" alt="Blog Image {{ $i }}">

                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            {{ $titles[$i] }}
                        </h5>

                        <p class="card-text text-muted" style="font-size: 14px;">
                            {{ $descriptions[$i] }}
                        </p>

                        <a href="{{ route('blog.show', $i) }}" class="btn btn-primary btn-sm mt-2">
                            Baca Selengkapnya →
                        </a>
                    </div>

                </div>
            </div>
        @endfor

    </div>
</div>

<style>
    .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 0 20px rgba(0,0,0,0.12);
    }
</style>

@endsection
