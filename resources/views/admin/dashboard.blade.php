@extends('layouts.app_admin')

@section('title', 'Dashboard Admin')

@push('styles')
<style>
    .stat-card {
        border-radius: 18px;
        padding: 20px;
        color: white;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        font-size: 28px;
        opacity: 0.8;
    }

    .card-custom {
        border-radius: 18px;
        border: none;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }

    @media (max-width: 576px) {
        .stat-card {
            margin-bottom: 15px;
        }
    }
</style>
@endpush

@section('content')

<div class="container-fluid">

    <!-- ================= STATISTIC CARDS ================= -->
    <div class="row g-4 mb-4">

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card bg-primary">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Users</h6>
                        <h3 class="fw-bold">{{ $totalUsers ?? 0 }}</h3>
                    </div>
                    <i class="fa fa-users stat-icon"></i>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card bg-success">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Catatan</h6>
                        <h3 class="fw-bold">{{ $totalCatatan ?? 0 }}</h3>
                    </div>
                    <i class="fa fa-note-sticky stat-icon"></i>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card bg-warning text-dark">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Keuangan</h6>
                        <h3 class="fw-bold">Rp {{ number_format($totalKeuangan ?? 0) }}</h3>
                    </div>
                    <i class="fa fa-wallet stat-icon"></i>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card bg-danger">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Task</h6>
                        <h3 class="fw-bold">{{ $totalTask ?? 0 }}</h3>
                    </div>
                    <i class="fa fa-list-check stat-icon"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- ================= CHART & ACTIVITY ================= -->
    <div class="row g-4">

        <!-- Chart -->
        <div class="col-12 col-lg-7">
            <div class="card card-custom p-4">
                <h5 class="mb-3">Statistik Aktivitas</h5>
                <canvas id="activityChart" height="120"></canvas>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-12 col-lg-5">
            <div class="card card-custom p-4">
                <h5 class="mb-3">Aktivitas Terbaru</h5>

                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Aktivitas</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentActivities ?? [] as $activity)
                            <tr>
                                <td>{{ $activity->user->name ?? '-' }}</td>
                                <td>{{ $activity->description }}</td>
                                <td>{{ $activity->created_at->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">
                                    Belum ada aktivitas
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('activityChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [{
                label: 'Aktivitas Mingguan',
                data: [12, 19, 8, 15, 10, 7, 14],
                borderWidth: 3,
                tension: 0.4,
                fill: false
            }]
        }
    });
</script>
@endpush
