@extends('layouts.app_admin')

@section('title', 'dashboard_admin')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Lembur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3 class="mb-4">Daftar Pengajuan Lembur</h3>
<div>
                <!-- Export data per bulan -->
            <form method="POST" action="{{ route('export.perbulan') }}">
                @csrf
                <input type="number" name="month" value="{{ date('m') }}">
                <input type="number" name="year" value="{{ date('Y') }}">
                <button type="submit" class="btn btn-warning">Download PDF</button>
            </form>

            <!-- Form export per user -->
            <form action="{{ route('admin.lembur.export_puser') }}" method="POST">
                @csrf
                <label for="user_id">Pilih User:</label>
                <select name="user_id" id="user_id">
                    @if(isset($users) && count($users))
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                    @else
                    <option value="">Tidak ada user tersedia</option>
                    @endif
                </select>
                <button type="submit">Export PDF</button>
            </form>

</div>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if($lemburs->isEmpty())
    <div class="alert alert-info">Belum ada pengajuan lembur.</div>
  @else
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Pegawai</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Alasan</th>
            <th>Bukti</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lemburs as $lembur)
            <tr>
                <td>{{ $lembur->user->name }}</td>
                <td>{{ $lembur->tanggal }}</td>
                <td>{{ $lembur->jam_mulai }} - {{ $lembur->jam_selesai }}</td>
                <td>{{ $lembur->alasan }}</td>
                <td>
                    @if ($lembur->bukti)
                        <a href="{{ asset('storage/' . $lembur->bukti) }}" target="_blank">Lihat Bukti</a>
                    @else
                        Tidak Ada
                    @endif
                </td>
                <td>
                    @if ($lembur->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif ($lembur->status == 'approved')
                        <span class="badge bg-success">Approved</span>
                    @elseif ($lembur->status == 'rejected')
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </td>
                <td>
                    @if ($lembur->status == 'pending')
                        <form action="{{ route('admin.lembur.approve', $lembur->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form action="{{ route('admin.lembur.reject', $lembur->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <input type="hidden" name="catatan" value=" Rejected by admin">
                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    @else
                        -
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

  @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection