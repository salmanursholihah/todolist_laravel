@extends('layouts.app')

@section('title', 'Notifikasi Pengajuan')

@section('content')
<div class="max-w-3xl mx-auto mt-8">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Notifikasi Pengajuan</h2>

    @forelse($pengajuans as $item)
        <div class="bg-white shadow-md rounded-lg p-4 mb-4 border border-gray-100 hover:shadow-lg transition">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</p>
                    <h4 class="text-lg font-semibold text-gray-800">{{ ucfirst($item->jenis) }} 
                        <span class="ml-2 text-sm text-gray-500">({{ $item->waktu }})</span>
                    </h4>
                    <p class="text-gray-600 mt-1">{{ $item->alasan }}</p>
                    @if($item->bukti)
                        <a href="{{ asset('storage/'.$item->bukti) }}" target="_blank" 
                           class="text-blue-600 text-sm hover:underline mt-1 inline-block">Lihat Bukti</a>
                    @endif
                </div>
                <div>
                    @if($item->status == 'Approved')
                        <span class="bg-green-100 text-green-700 px-3 py-1 text-xs rounded-full">Approved</span>
                    @elseif($item->status == 'Rejected')
                        <span class="bg-red-100 text-red-700 px-3 py-1 text-xs rounded-full">Rejected</span>
                    @else
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 text-xs rounded-full">Pending</span>
                    @endif
                </div>
            </div>
            @if($item->catatan)
                <div class="mt-2 text-sm text-gray-500">
                    <span class="font-semibold text-gray-700">Catatan: </span>{{ $item->catatan }}
                </div>
            @endif
        </div>
    @empty
        <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 p-4 rounded">
            Belum ada pengajuan yang diajukan.
        </div>
    @endforelse
</div>
@endsection
