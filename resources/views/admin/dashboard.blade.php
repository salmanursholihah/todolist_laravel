@extends('layouts.app_admin')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/style/style_table_admin.css') }}">
@endpush

@section('title','dashboard')
@section('content')


<body>


    <div class="card-container">
        <div class="card">
            <a href="tasks/index" style="text-decoration: none; color: inherit;">
                <i class="fa-solid fa-users"></i>
                <h4>Laporan Task</h4>
                <p style="font-weight:bold; font-size:10pt;">{{ $tasks->count() }} Data</p>
                {{-- hanya tampil jumlah --}}
            </a>
        </div>

        <div class="card">
            <a href="users/index" style="text-decoration: none; color: inherit;">
                <i class="fa-solid fa-users"></i>
                <h4>Users</h4>
                <p style="font-weight:bold; font-size:10pt;">{{ $users->count() }} Data</p>
                {{-- hanya tampil jumlah --}}
            </a>
        </div>


        <div class="card">
            <a href="keuangans/index" style="text-decoration: none; color: inherit;">
                <i class="fa-solid fa-calculator"></i>
                <h4>Keuangan</h4>
                <p style="font-weight:bold; font-size:10pt;">{{ $keuangans->count() }} Data</p>
                {{-- hanya tampil jumlah --}}
            </a>
        </div>
    </div>


    <div class="content">

    </div>

    @endsection