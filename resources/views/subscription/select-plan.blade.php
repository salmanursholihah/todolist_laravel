@extends('layouts.app')

@section('content')
<h2>Pilih Paket Langganan</h2>
<form method="POST" action="{{ url('/subscription/select-plan') }}">
    @csrf
    @foreach ($plans as $plan)
        <label>
            <input type="radio" name="plan_id" value="{{ $plan->id }}" required>
            {{ $plan->name }} - Rp {{ number_format($plan->price,0,',','.') }} / {{ $plan->duration_month }} bulan
        </label><br>
    @endforeach
    <button type="submit">Lanjut</button>
</form>
@endsection