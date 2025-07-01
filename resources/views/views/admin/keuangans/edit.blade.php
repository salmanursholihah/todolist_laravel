@extends('layouts.app_admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Keuangan</h2>

    <form action="{{ route('admin.keuangans.update', $keuangan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $keuangan->date) }}" required>
            @error('date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control"
                value="{{ old('deskripsi', $keuangan->deskripsi) }}" required>
            @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipe</label>
            <select name="type" class="form-select" required>
                <option value="masuk" {{ old('type', $keuangan->type) == 'masuk' ? 'selected' : '' }}>Pemasukan
                </option>
                <option value="keluar" {{ old('type', $keuangan->type) == 'keluar' ? 'selected' : '' }}>Pengeluaran
                </option>
            </select>
            @error('type') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" name="amount" class="form-control" value="{{ old('amount', $keuangan->amount) }}"
                required>
            @error('amount') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.keuangans.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection