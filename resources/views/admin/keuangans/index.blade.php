@extends('layouts.app_admin')

@section('title','dashboard_admin')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/style/style_table_admin.css') }}">

@endpush

<div class="content">
    <table>
        <h2>Laporan Keuangan</h2>

        @auth
        @if(auth()->user()->role === 'admin')

        <div>
            <a href="{{ route('keuangan.export.excel') }}" class="btn btn-success">export excel</a>
            <a href="{{ route('keuangan.export.pdf') }}" class="btn btn-primary">export pdf</a>
        </div>
        <br>

        @endif
        @endauth


        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>deskripsi</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keuangans as $keuangan)
            <tr>
                <td>{{ $keuangan->id }}</td>
                <td>{{ $keuangan->user->name ?? 'username tidak ditemukan' }}</td>
                <td>{{ $keuangan->deskripsi }}</td>
                <td>{{ $keuangan->type }}</td>
                <td>{{ $keuangan->amount }}</td>
                <td>{{ $keuangan->created_at }}</td>
                <td>{{ $keuangan->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.keuangans.edit', $keuangan->id) }}"  class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.keuangans.destroy', $keuangan->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus user ini?')" class="btn btn-primary">Hapus</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection