@extends('layouts.app_admin')

@section('title','dashboard_admin')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/style/style_table_admin.css') }}">
@endpush

<div class="content">
    <h2>Data catatan masuk</h2>

    <table> @auth
        @if(auth()->user()->role === 'admin')

        <div>
            <a href="{{ route('catatan.export.excel') }}" class="btn btn-success">export excel</a>
            <a href="{{ route('catatan.export.pdf') }}" class="btn btn-primary">export pdf</a>
            <br><br>
            <!--export data perbulan-->
            <form method="POST" action="{{ route('export.perbulan') }}">
                @csrf
                <input type="number" name="month" value="{{ date('m') }}">
                <input type="number" name="year" value="{{ date('Y') }}">
                <button type="submit" class="btn btn-warning">Download PDF</button>
            </form>




        </div>
        <br>
        @endif
        @endauth



        <ul>
            <th>user ID</th>
            <th>name</th>
            <th>title</th>
            <th>deskripsi</th>
            <th>gambar</th>
            <th>create_at</th>
            <th>update_at</th>
            <th>aksi</th>
            @foreach($catatans as $catatan)
            <tr>
                <td>{{ $catatan->user_id }}</td>
                <td>{{ $catatan->user->name ?? 'username tidak ditemukan' }}</td>
                <td>{{ $catatan->title }}</td>
                <td>{{ $catatan->description }}</td>
                <td>
                    @foreach($catatan->images as $image)
                    <img src="{{ asset($image->image_path) }}" width="80" style="margin: 2px; border-radius: 4px;">
                    @endforeach
                </td>

                <td>{{ $catatan->created_at}}</td>
                <td>{{ $catatan->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.catatans.edit', $catatan->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.catatans.destroy', $catatan->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus user ini?')" class="btn btn-primary">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </ul>
    </table>
</div>


@endsection