@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
<style>
.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.card-hover {
    transition: all 0.3s ease;
}

.welcome-card {
    background: linear-gradient(135deg, #42a5f5, #1e88e5);
    color: white;
    border-radius: 15px;
}

.icon-circle {
    width: 60px;
    height: 60px;
    background-color: #e3f2fd;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin-right: 15px;
}
</style>
@endpush

@section('content')
<div class="container">
    <!-- Welcome Card -->

    <!-- Dashboard Cards -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card card-hover shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-circle">
                        <i class="fa-solid fa-list-check fa-xl text-primary"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Tugas</h5>
                        <p class="card-text text-muted">Kelola to-do list harianmu.</p>
                        <a href="{{ url('/tasks') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-hover shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-circle">
                        <i class="fa-solid fa-wallet fa-xl text-success"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Keuangan</h5>
                        <p class="card-text text-muted">Catat pengeluaran dan pemasukan.</p>
                        <a href="{{ url('/keuangan') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-hover shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-circle">
                        <i class="fa-solid fa-calendar-days fa-xl text-danger"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Kalender</h5>
                        <p class="card-text text-muted">Lihat kegiatanmu dalam tampilan kalender.</p>
                        <a href="{{ url('/calendar') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-hover shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-circle">
                        <i class="fa-solid fa-book fa-xl text-warning"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Catatan</h5>
                        <p class="card-text text-muted">Tulis ide atau hal penting lainnya.</p>
                        <a href="{{ url('/catatan') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-hover shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-circle">
                        <i class="fa-solid fa-gear fa-xl text-secondary"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Pengaturan</h5>
                        <p class="card-text text-muted">Kelola preferensi dan akun Anda.</p>
                        <a href="{{ url('/setting') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection