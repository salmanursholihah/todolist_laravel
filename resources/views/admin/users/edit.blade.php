@extends('layouts.app_admin')
@section('title', 'Edit User')

@section('content')
<div class="container" class="mb-4">
    <h2>Edit User</h2>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3"> <label class="form-label">Nama:</label><input type="text" name="name"
                value="{{ $user->name }}" class="form-control" required><br>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label><input type="email" name="email" value="{{ $user->email }}"
                class="form-control" required><br>
        </div>

        <div class="mb-3"> <label class="form-label">Role:</label>
            <select name="role" class="form-control">
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select><br>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection