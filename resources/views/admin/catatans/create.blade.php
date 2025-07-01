@extends('layouts.app_admin')
@section('title', 'Tambah Catatan')

@section('content')
<div class="container mt-4">
    <h2>Tambah Catatan</h2>
    <form action="{{ route('admin.catatans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div> @error('name') <small class="text-danger">{{ $message }}</small> @enderror


        <div class="mb-3"><label class="form-label">Title:</label>
            <input type=" text" name="title" value="{{ old('title') }}" class="form-control" required>
        </div> @error('title') <small class="text-danger">{{ $message }}</small> @enderror


        <div class="mb-3"><label class="form-label">Deskripsi:</label>
            <input type="text" name="description" class="form-control" value="{{ old('description') }}" required>
        </div> @error('description') <small class="text-danger">{{ $message }}</small> @enderror


        <div class="mb-3"><label class="form-label">Gambar:</label>
            <input type="file" name="image" class="form-control">
        </div> @error('image') <small class="text-danger">{{ $message }}</small> @enderror

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection