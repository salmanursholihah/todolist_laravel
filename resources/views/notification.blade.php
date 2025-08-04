@extends('layouts.app')

@section('title', 'Riwayat Pengajuan Lembur')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Notifikasi Pengajuan Lembur</h3>

    <a href="{{ route('lembur.create') }}" class="btn btn-primary mb-3">Ajukan Lembur</a>

    @forelse ($lemburs as $l)
        <div class="card shadow-sm mb-3 border">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="card-title mb-1">
                            Lembur - <span class="text-muted">{{ \Carbon\Carbon::parse($l->tanggal)->format('d M Y') }}</span>
                        </h5>
                        <p class="mb-1"><strong>Waktu:</strong> {{ $l->jam_mulai }} - {{ $l->jam_selesai }}</p>
                        <p class="mb-1"><strong>Alasan:</strong> {{ $l->alasan }}</p>

                        @if ($l->bukti)
                            <a href="{{ asset('bukti_lembur/' . $l->bukti) }}" 
                               target="_blank" class="text-primary small">📎 Lihat Bukti</a>
                        @endif
                    </div>

                    <!-- Status Badge -->
                    <div>
                        @if ($l->status == 'panding')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif ($l->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </div>
                </div>

                <!-- Catatan Admin -->
                @if ($l->status == 'rejected' && $l->catatan)
                    <div class="alert alert-danger mt-3 p-2 mb-0">
                        <strong>Catatan Admin:</strong> {{ $l->catatan }}
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            Belum ada pengajuan lembur.
        </div>
    @endforelse
</div>
@endsection
