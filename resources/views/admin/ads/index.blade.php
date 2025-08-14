@extends('layouts.app_admin')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Manajemen Iklan</h4>
    <a href="{{ route('admin.ads.create') }}" class="btn btn-primary">Tambah Iklan</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Tipe</th>
            <th>Media</th>
            <th>Posisi</th>
            <th>Aktif</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ads as $ad)
        <tr>
            <td>{{ $ad->title }}</td>
            <td>{{ $ad->type }}</td>
  <td>
    @if($ad->type === 'image')
        <img src="{{ asset('storage/' . $ad->media_path) }}" 
             alt="{{ $ad->title }}" 
             class="img-fluid" 
             style="max-height: 150px;">
    @elseif($ad->type === 'video')
        <video controls style="max-height: 150px;">
            <source src="{{ asset('storage/' . $ad->media_path) }}" type="video/mp4">
            Browser Anda tidak mendukung video.
        </video>
    @elseif($ad->type === 'audio')
        <audio controls>
            <source src="{{ asset('storage/' . $ad->media_path) }}" type="audio/mpeg">
            Browser Anda tidak mendukung audio.
        </audio>
    @else
        {{ $ad->media_path }}
    @endif
</td>



            <td>{{ $ad->placement }}</td>
            <td>{{ $ad->is_active ? 'Ya' : 'Tidak' }}</td>
            <td>
                <a href="{{ route('admin.ads.edit', $ad) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.ads.destroy', $ad) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin hapus iklan?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
