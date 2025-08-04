@extends('layouts.admin')

@section('title', 'Data Absensi')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Absensi</h1>

    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-3">
            <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <select name="user_id" class="form-select">
                <option value="">-- Semua Pegawai --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pegawai</th>
                <th>Tanggal</th>
                <th>Jam Datang</th>
                <th>Jam Pulang</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($absensis as $absen)
                <tr>
                    <td>{{ $absen->user->name }}</td>
                    <td>{{ $absen->tanggal }}</td>
                    <td>{{ $absen->jam_datang ?? '-' }}</td>
                    <td>{{ $absen->jam_pulang ?? '-' }}</td>
                    <td>{{ ucfirst($absen->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $absensis->withQueryString()->links() }}
</div>
@endsection
