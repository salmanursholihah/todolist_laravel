@extends('layouts.app')

@section('title', 'Pilih Paket Langganan')

@section('content')
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4">Pilih Paket Langganan</h2>
        <div class="row justify-content-center">
            <!-- Paket Basic -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Basic</h5>
                        <h6 class="card-price">Rp 29.000 <small>/bulan</small></h6>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>✔ 1 Perusahaan</li>
                            <li>✔ Hingga 10 Karyawan</li>
                            <li>✔ Fitur Absensi Dasar</li>
                        </ul>
                        <form action="{{ route('payment.process') }}" method="POST">
                            @csrf
                            <input type="hidden" name="package" value="basic">
                            <button type="submit" class="btn btn-primary w-100">Berlangganan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Paket Pro -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Pro</h5>
                        <h6 class="card-price">Rp 59.000 <small>/bulan</small></h6>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>✔ 3 Perusahaan</li>
                            <li>✔ Hingga 50 Karyawan</li>
                            <li>✔ Absensi + Lembur</li>
                            <li>✔ Laporan Ekspor</li>
                        </ul>
                        <form action="{{ route('payment.process') }}" method="POST">
                            @csrf
                            <input type="hidden" name="package" value="pro">
                            <button type="submit" class="btn btn-primary w-100">Berlangganan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Paket Premium -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Premium</h5>
                        <h6 class="card-price">Rp 99.000 <small>/bulan</small></h6>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>✔ Tanpa Batas Perusahaan</li>
                            <li>✔ Tanpa Batas Karyawan</li>
                            <li>✔ Fitur Lengkap + Dukungan Prioritas</li>
                        </ul>
                        <form action="{{ route('payment.process') }}" method="POST">
                            @csrf
                            <input type="hidden" name="package" value="premium">
                            <button type="submit" class="btn btn-primary w-100">Berlangganan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
