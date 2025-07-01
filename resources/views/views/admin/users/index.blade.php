@extends('layouts.app_admin')

@section('title', 'Dashboard Admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/style/style_table_admin.css') }}">
@endpush

@section('content')
<div class="content">
    <h2>Data User</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @auth
    @if(auth()->user()->role === 'admin')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Tambah User</a>
    @endif
    @endauth
    <div>
        <a href="{{ route('users.export.excel') }}" class="btn btn-success">export excel</a>
        <a href="{{ route('users.export.pdf') }}" class="btn btn-primary">export pdf</a>
    </div>
    <br>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                <td>{{ $user->updated_at->format('d M Y H:i') }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection