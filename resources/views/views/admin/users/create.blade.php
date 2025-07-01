@extends('layouts.app_admin')
@section('title', 'Tambah User')

@section('content')
<div class="container" class="mb-4">
    <h2>Tambah User</h2>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-3"> <label class="form-label">Nama:</label><input type="text" name="name" required
                class="form-control"><br>
        </div>

        <div class="mb-3"> <label class="form-label">Email:</label><input type="email" name="email" class="form-control"
                required><br></div>

        <div class="mb-3"> <label class="form-label">Password:</label><input type="password" name="password"
                class="form-control" required><br>
        </div>

        <div class="mb-3"> <label class="form-label">Role:</label>
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select><br>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection