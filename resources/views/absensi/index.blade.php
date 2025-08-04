@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Absensi Hari Ini</h2>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="text-red-600 mb-4">{{ session('error') }}</div>
    @endif

    <form action="{{ route('absensi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="block mb-2">Ambil Foto (Kamera):</label>
        <input type="file" name="image" accept="image/*" capture="environment" required class="mb-4">

        <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">
            {{ $absen && !$absen->waktu_pulang ? 'Absen Pulang' : 'Absen Masuk' }}
        </button>
    </form>

    @if($absen)
        <div class="mt-6">
            <p><strong>Waktu Masuk:</strong> {{ $absen->waktu_masuk }}</p>
            @if($absen->image_masuk)
                <img src="{{ asset('storage/'.$absen->image_masuk) }}" class="w-40 mt-2 rounded">
            @endif

            @if($absen->waktu_pulang)
                <p class="mt-4"><strong>Waktu Pulang:</strong> {{ $absen->waktu_pulang }}</p>
                @if($absen->image_pulang)
                    <img src="{{ asset('storage/'.$absen->image_pulang) }}" class="w-40 mt-2 rounded">
                @endif
            @endif
        </div>
    @endif
</div>
@endsection
