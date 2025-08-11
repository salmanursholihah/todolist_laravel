@extends('layouts.app')

@section('content')
<h2>Checkout</h2>

<h3>Paket: {{ $plan->name }}</h3>
<p>Harga: Rp {{ number_format($plan->price,0,',','.') }}</p>

<h3>Detail yang diisi:</h3>
<ul>
    @foreach ($details as $key => $value)
        <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
    @endforeach
</ul>

<form method="POST" action="{{ route('subscription.payment') }}">
    @csrf
    <button type="submit">Bayar Sekarang</button>
</form>
@endsection