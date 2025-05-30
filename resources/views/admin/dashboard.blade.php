@extends('layouts.app_admin')

@section('title','dashboard')
@section('content')


<body>


    <div class="container">
        <div class="content">
            <h2>Data User</h2>
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            </table>

            <h2>Data Tugas</h2>
            <ul>
                @foreach($tasks as $task)
                <li>{{ $task->title }} - dibuat oleh User ID: {{ $task->user_id }}</li>
                @endforeach
            </ul>
            <h2>Data catatan masuk</h2>
            <ul>
                @foreach($catatans as $catatan)
                <li>{{ $catatan->title }} - dibuat oleh User ID: {{ $catatan->user_id }}</li>
                @endforeach
            </ul>


            <h2>laporan keuangan</h2>
            <ul>
                @foreach($keuangans as $keuangan)
                <li>{{ $keuangan->deskripsi }} -laporan tanggal {{ $keuangan->date }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    @endsection