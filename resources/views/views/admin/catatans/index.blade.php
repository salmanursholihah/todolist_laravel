@extends('layouts.app_admin')

@section('title','dashboard_admin')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/style/style_table_admin.css') }}">
@endpush

<div class="content">
    <h2>Data catatan masuk</h2>

    <table> @auth
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.catatans.create') }}" class="btn btn-primary mb-3">Tambah catatan</a>
        <div>
            <a href="{{ route('catatan.export.excel') }}" class="btn btn-success">export excel</a>
            <a href="{{ route('catatan.export.pdf') }}" class="btn btn-primary">export pdf</a>
        </div>
        <br>
        @endif
        @endauth



        <ul>
            <th>user ID</th>
            <th>name</th>
            <th>title</th>
            <th>deskripsi</th>
            <th>gambar</th>
            <th>create_at</th>
            <th>update_at</th>
            <th>aksi</th>
            @foreach($catatans as $catatan)
            <tr>
                <td>{{ $catatan->user_id }}</td>
                <td>{{ $catatan->user->name ?? 'username tidak ditemukan' }}</td>
                <td>{{ $catatan->title }}</td>
                <td>{{ $catatan->description }}</td>
                <td>{{ $catatan->image }}</td>
                <td>{{ $catatan->created_at}}</td>
                <td>{{ $catatan->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.catatans.edit', $catatan->id) }}">Edit</a>
                    <form action="{{ route('admin.catatans.destroy', $catatan->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </ul>
    </table>
</div>


@endsection