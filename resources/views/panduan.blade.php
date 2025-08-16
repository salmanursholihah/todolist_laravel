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
<!-- Panduan Langganan -->
<div class="accordion-item">
    <h2 class="accordion-header" id="headingLangganan">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLangganan">
            4. Panduan Penggunaan Fitur Langganan
        </button>
    </h2>
    <div id="collapseLangganan" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
        <div class="accordion-body">
            <ol>
                <li>
                    Masuk ke fitur langganan
                    <br>
                    <img src="{{ asset('storage/logo/step1.png') }}" alt="Step 1 Masuk Fitur Langganan" class="img-fluid my-2">
                </li>
                <li>
                    Pilih paket langganan <br>
                    <small>Nb: pilih paket basic Rp.1000/bulan untuk uji coba</small>
                    <br>
                    <img src="{{ asset('storage/logo/step2.png') }}" alt="Step 2 Pilih Paket" class="img-fluid my-2">
                </li>
                <li>
                    Isi data perusahaan, alamat perusahaan, nama contact perusahaan dan nomor telephone
                    <br>
                    <img src="{{ asset('storage/logo/step3.png') }}" alt="Step 3 Isi Data Perusahaan" class="img-fluid my-2">
                </li>
                <li>
                    Lanjut checkout paket langganan dengan klik “lanjut checkout”
                    <br>
                </li>
                <li>
                    Pastikan data yang anda isi sudah benar
                    <br>
                </li>
                <li>
                    Kemudian klik bayar sekarang
                    <br>
                </li>
                <li>
                    Bayar dengan Midtrans
                    <br>
                </li>
                <li>
                    Pilih metode pembayaran
                    <br>
                    <img src="{{ asset('storage/logo/payment.png') }}" alt="Step 8 Pilih Metode" class="img-fluid my-2">
                </li>
                <li>
                    Jika menggunakan QRIS GoPay, copy barcode pembayaran kemudian ditempel di halaman berikut:
                    <br>
                    <a href="https://simulator.sandbox.midtrans.com/v2/qris/index" target="_blank">Simulator QRIS GoPay</a>
                    <br>
                    <img src="{{ asset('storage/logo/simulator.png') }}" alt="Step 9 QRIS GoPay" class="img-fluid my-2">
                </li>
                <li>
                    Tunggu proses pembayaran selesai, kemudian anda akan diarahkan ke halaman absensi
                    <br>
                </li>
            </ol>
        </div>
    </div>
</div>

    </div>
</div>

@endsection
