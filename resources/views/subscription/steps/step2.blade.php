@extends('layouts.app')

@section('content')
<h2>Step 2: Kontak</h2>
<form method="POST" action="{{ url('/subscription/step/2') }}">
    @csrf
    <label>Nama Kontak</label><br>
    <input type="text" name="contact_person" required><br>

    <label>Telepon</label><br>
    <input type="text" name="phone" required><br>

    <button type="submit">Lanjut Checkout</button>
</form>
@endsection