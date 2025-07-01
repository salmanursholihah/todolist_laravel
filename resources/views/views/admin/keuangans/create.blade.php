@extends('layouts.app_admin')

@section('content')
<div class="container mt-4">
    <h2>Tambah Data Keuangan</h2>

    <form action="{{ route('admin.keuangans.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
            @error('date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="{{ old('deskripsi') }}" required>
            @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipe</label>
            <select name="type" class="form-select" required>
                <option value="">-- Pilih Tipe --</option>
                <option value="masuk" {{ old('type') == 'masuk' ? 'selected' : '' }}>masuk</option>
                <option value="keluar" {{ old('type') == 'keluar' ? 'selected' : '' }}>keluar</option>
            </select>
            @error('type') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" required>
            @error('amount') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.keuangans.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection