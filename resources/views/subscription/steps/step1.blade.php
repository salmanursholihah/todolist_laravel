@extends('layouts.app')

@section('content')
<h2>Step 1: Data Perusahaan</h2>
<form method="POST" action="{{ url('/subscription/step/1') }}">
    @csrf
    <label>Nama Perusahaan</label><br>
    <input type="text" name="company_name" required><br>

    <label>Alamat Perusahaan</label><br>
    <textarea name="company_address" required></textarea><br>

    <button type="submit">Lanjut Step 2</button>
</form>
@endsection