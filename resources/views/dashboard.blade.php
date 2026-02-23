@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
<style>
    .header-card {
        border-radius: 16px;
        background: #ffffff;
        border: none;
        padding: 1.2rem;
        margin-bottom: 1rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        transition: 0.3s;
    }

    .header-card:hover {
        transform: translateY(-3px);
    }

    .menu-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1.2rem;
        background: #ffffff;
        border-radius: 18px;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    }

    .menu-card i {
        transition: 0.3s;
    }

    .menu-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        background: #f0f9ff;
    }

    .menu-card:hover i {
        transform: scale(1.2);
    }

    .btn-primary-action {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 30px;
        padding: 14px 0;
        text-align: center;
        margin-top: 2rem;
        transition: 0.3s;
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
        border: none;
    }

    .btn-primary-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(37, 99, 235, 0.4);
    }

    .logout-card {
        margin-top: 2rem;
        text-align: center;
    }

    .btn-logout {
        background: #ef4444;
        color: white;
        border-radius: 25px;
        padding: 10px 25px;
        font-weight: 500;
        border: none;
        transition: 0.3s;
    }

    .btn-logout:hover {
        background: #dc2626;
        transform: translateY(-2px);
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

   <!-- Profil + Logout -->
<div class="header-card d-flex justify-content-between align-items-center">
    <div>
        <h6 class="fw-bold mb-0">{{ auth()->user()->name }}</h6>
        <small class="text-muted">{{ auth()->user()->email }}</small>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('profile.show') }}" class="btn btn-sm btn-outline-secondary">
            Lihat Profil
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-danger">
                <i class="fa-solid fa-right-from-bracket me-1"></i>
                Logout
            </button>
        </form>
    </div>
</div>

    <!-- Menu -->
    <div class="row text-center g-3">
        @php
            $menus = [
                ['icon'=>'fa-mug-hot text-secondary','label'=>'Istirahat','url'=>'/istirahat'],
                ['icon'=>'fa-couch text-primary','label'=>'Cuti','url'=>'/cuti'],
                ['icon'=>'fa-calendar-days text-danger','label'=>'Izin','url'=>'/izin'],
                ['icon'=>'fa-clock text-secondary','label'=>'Lembur','url'=>'/lembur'],
                ['icon'=>'fa-book text-warning','label'=>'Catatan','url'=>'/catatan'],
                ['icon'=>'fa-bell text-success','label'=>'Notifikasi','url'=>'/notifikasi'],
            ];
        @endphp

        @foreach($menus as $menu)
        <div class="col-6 col-md-2">
            <div class="menu-card">
                <i class="fa-solid {{ $menu['icon'] }} fa-2x mb-2"></i>
                <span>{{ $menu['label'] }}</span>
                <a href="{{ url($menu['url']) }}" class="stretched-link"></a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Tombol Presensi -->
    <a href="{{ url('/absensi') }}" class="btn-primary-action d-block text-center">
        Presensi
    </a>



<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-body text-center p-4">
                <h5 class="mb-3">Yakin ingin logout?</h5>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger px-4">
                        Ya, Logout
                    </button>
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                        Batal
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
