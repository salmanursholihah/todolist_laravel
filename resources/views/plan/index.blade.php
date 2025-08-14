@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Paket Langganan</h1>
    <ul>
        @foreach($plans as $plan)
            <li>{{ $plan->name }} - Rp{{ number_format($plan->price) }}</li>
        @endforeach
    </ul>
</div>
@endsection
