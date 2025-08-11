@extends('layouts.app_landing')

@section('title', 'Panduan Penggunaan')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Panduan Penggunaan Aplikasi</h1>

    <div class="accordion" id="panduanAccordion">

        <!-- Panduan 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    1. Cara Registrasi Akun
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#panduanAccordion">
                <div class="accordion-body">
                    <ol>
                        <li>Kunjungi halaman <a href="{{ url('/register') }}">Register</a>.</li>
                        <li>Isi data seperti nama, email, dan password.</li>
                        <li>Klik tombol "Daftar".</li>
                        <li>Akun berhasil dibuat dan siap digunakan.</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Panduan 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                    2. Cara Melakukan Absensi
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
                <div class="accordion-body">
                    <ol>
                        <li>Login ke aplikasi.</li>
                        <li>Pilih menu “Absensi”.</li>
                        <li>Tekan tombol "Absen Masuk" atau "Absen Pulang".</li>
                        <li>Sistem akan menyimpan data lokasi dan waktu absensi.</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Panduan 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                    3. Reset Password
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
                <div class="accordion-body">
                    <ol>
                        <li>Klik link “Lupa Password?” di halaman login.</li>
                        <li>Masukkan email terdaftar dan klik Kirim.</li>
                        <li>Cek email Anda untuk tautan reset password.</li>
                        <li>Buat password baru dan login kembali.</li>
                    </ol>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
