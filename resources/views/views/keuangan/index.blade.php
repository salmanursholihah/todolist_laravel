@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Data Keuangan Anda</h2>

    {{-- Tampilkan alert sukses jika ada --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Form Input Data --}}
    <div class="card mb-4" style="background-color:rgb(10, 99, 104);">
        <div class="card-header" style="color: black; font-weight: bold;">Tambah Transaksi</div>
        <div class="card-body">
            <form action="{{ route('keuangan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="date" class="form-label" style="color: black; font-weight: bold;">Tanggal</label>
                    <input type="date" name="date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label" style="color: black; font-weight: bold;">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label" style="color: black; font-weight: bold;">Jenis
                        Transaksi</label>
                    <select name="type" class="form-select" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="masuk">Masuk</option>
                        <option value="keluar">Keluar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label" style="color: black; font-weight: bold;">Jumlah (Rp)</label>
                    <input type="number" name="amount" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>

    {{-- Hitung total --}}
    @php
    $total_masuk = $keuangans->where('type', 'masuk')->sum('amount');
    $total_keluar = $keuangans->where('type', 'keluar')->sum('amount');
    $saldo = $total_masuk - $total_keluar;
    @endphp

    <div class="mb-4">
        <p><strong>Total Masuk:</strong> Rp{{ number_format($total_masuk, 0, ',', '.') }}</p>
        <p><strong>Total Keluar:</strong> Rp{{ number_format($total_keluar, 0, ',', '.') }}</p>
        <p><strong>Saldo:</strong> Rp{{ number_format($saldo, 0, ',', '.') }}</p>
    </div>

    {{-- Tabel Data --}}

    <div>
        <a href="{{ route('keuangan.export.excel') }}" class="btn btn-success">export excel</a>
        <a href="{{ route('keuangan.export.pdf') }}" class="btn btn-primary">export pdf</a>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($keuangans as $item)
            <tr>
                <td>{{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <span class="badge bg-{{ $item->type === 'masuk' ? 'success' : 'danger' }}">
                        {{ ucfirst($item->type) }}
                    </span>
                </td>
                <td>Rp{{ number_format($item->amount, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('keuangan.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <form action="{{ route('keuangan.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Belum ada data keuangan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection