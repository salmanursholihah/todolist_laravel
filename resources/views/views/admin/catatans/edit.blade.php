@extends('layouts.app_admin')
@section('title', 'Edit Catatan')

@section('content')
<div class="container">
    <h2>Edit Catatan</h2>
    <form action="{{ route('admin.catatans.update', $catatan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3"> <label class="form-label">Judul:</label>
            <input type="text" name="title" value="{{ old('title', $catatan->title) }}" class="form-control"
                required><br>

        </div>

        <div class="mb-3"> <label class="form-label">Deskripsi:</label>
            <input type="text" name="description" value="{{ old('description', $catatan->description) }}"
                class="form-control" required><br>
        </div>
        <div class=" mb-3"> <label class="form-label">Gambar Lama:</label><br>
            @if ($catatan->image)
            <img src="{{ asset('storage/' . $catatan->image) }}" alt="Gambar catatan" width="150"><br>
            @else
            <p>Tidak ada gambar.</p>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Ganti Gambar:</label>
            <input type="file" name="image"><br><br>

        </div><button type=" submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection