@extends('layouts.app')

@section('title', 'Pilih Paket Langganan')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Pilih Paket Langganan</h2>

    <div class="row justify-content-center">
        @foreach ($pakets as $paket)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title text-center">{{ $paket->nama }}</h5>
                            <p class="card-text text-center">{{ $paket->deskripsi }}</p>
                            <h4 class="text-center my-3">
                                Rp{{ number_format($paket->harga, 0, ',', '.') }} / {{ $paket->durasi }} hari
                            </h4>
                        </div>
                        <form action="{{ route('langganan.bayar') }}" method="POST">
                            @csrf
                            <input type="hidden" name="paket_id" value="{{ $paket->id }}">
                            <input type="hidden" name="type" value="{{ $paket->type }}"> {{-- prabayar / pascabayar --}}
                            <button type="submit" class="btn btn-primary w-100 mt-3">Pilih Paket</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
