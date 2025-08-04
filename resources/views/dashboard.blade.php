@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
<style>
    .header-card {
        border-radius: 10px;
        background: #fff;
        border: 1px solid #e5e7eb;
        padding: 1rem;
        margin-bottom: 1rem;
    }

    .menu-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .menu-card:hover {
        background: #f0f9ff;
        transform: translateY(-4px);
    }

    .btn-primary-action {
        background-color: #00c851;
        color: white;
        font-weight: bold;
        font-size: 1.1rem;
        border-radius: 25px;
        padding: 12px 0;
        text-align: center;
        margin-top: 1rem;
    }
</style>
@endpush

@section('content')
<div class="container">

    <!-- Header Info -->
    <div class="header-card d-flex align-items-center">
        <img src="{{ asset('storage/logo/logo_company.jpeg') }}" alt="Logo" class="me-3" width="50">
        <div>
            <h5 class="fw-bold mb-0">uctadiv - PT Utama Cipta Tata Asri</h5>
            <small class="text-muted">Catat perjalananmu dengan aplikasi uctadiv</small>
        </div>
    </div>

    <!-- Jadwal Hari Ini -->
    <div class="header-card d-flex justify-content-between">
        <span class="fw-bold">Jadwal Anda Hari Ini</span>
        <div>
            <span class="fw-bold">08:00</span>
            <span class="mx-2">-</span>
            <span class="fw-bold">17:00</span>
        </div>
    </div>

    <!-- Profil Public -->
    <div class="header-card d-flex justify-content-between align-items-center">
        <div>
            <h6 class="fw-bold mb-0">{{ auth()->user()->name ?? 'Guest User' }}</h6>
            <small class="text-muted">{{ auth()->user()->email ?? 'Public Visitor' }}</small>
        </div>
        <button class="btn btn-sm btn-outline-secondary" >Lihat Profil</button>
    </div>

    <!-- Menu Utama -->
    <div class="row text-center g-3">
        <div class="col-6 col-md-2">
            <div class="menu-card">
            <i class="fa-duotone fa-solid fa-mug-hot fa-2x text-secondary mb-2"></i>
                <span>istirahat</span>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="menu-card">
                <i class="fa-solid fa-couch fa-2x text-primary mb-2"></i>
                <span>cuti</span>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="menu-card">
                <i class="fa-solid fa-calendar-days fa-2x text-danger mb-2"></i>
                <span>izin</span>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="menu-card">
                <i class="fa-solid fa-clock fa-2x text-secondary mb-2"></i>
                <span>lembur</span>
                <a href="{{ url('/lembur') }}" class="stretched-link"></a>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="menu-card">
                <i class="fa-solid fa-book fa-2x text-warning mb-2"></i>
                <span>Catatan</span>
                <a href="{{ url('/catatan') }}" class="stretched-link"></a>
            </div>

        </div>
        <div class="col-6 col-md-2">
            <div class="menu-card">
                <i class="fa-solid fa-bell fa-2x text-success mb-2"></i>
                <span>Notifikasi</span>
            </div>
        </div>
    </div>

    <!-- Tombol Utama -->
    <a href="{{ url('/absensi') }}" class="btn-primary-action d-block text-center">Presensi </a>
</div>
@endsection
