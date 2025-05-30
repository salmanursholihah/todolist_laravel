@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/style/style_keuangan.css') }}">

@section('content')


<div class="container">
    <div class="content">
        <h2>Data Keuangan</h2>
        <form id="formTambah" action="{{ route('keuangan.store') }}" method="POST">
            @csrf
            <input type="date" name="date" required>
            <input type="text" name="deskripsi" placeholder="Deskripsi" required>
            <select name="type" required>
                <option value="masuk">Masuk</option>
                <option value="keluar">Keluar</option>
            </select>
            <input type="number" name="amount" placeholder="Jumlah" required>
            <button type="submit">Tambah</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Jenis</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                <td>{{ $row->date }}</td>
                <td>{{ $row->deskripsi }}</td>
                <td>{{ ucfirst($row->type) }}</td>
                <td>Rp{{ number_format($row->amount) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h5>Total Masuk: Rp{{ number_format($total_masuk) }}</h5>
    <h5>Total Keluar: Rp{{ number_format($total_keluar) }}</h5>
    <h5>Saldo: Rp{{ number_format($saldo) }}</h5>
</div>
@endsection