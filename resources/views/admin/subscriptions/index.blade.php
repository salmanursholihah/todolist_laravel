@extends('layouts.app_Admin')

@section('title', 'Daftar Subscription')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Daftar Subscription</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Plan</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>Expired At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscriptions as $sub)
            <tr>
                <td>{{ $sub->id }}</td>
                <td>{{ $sub->user->name ?? '-' }}</td>
                <td>{{ $sub->plan->name ?? '-' }}</td>
                <td>{{ $sub->status }}</td>
                <td>{{ $sub->start_date?->format('d-m-Y H:i') ?? '-' }}</td>
                <td>{{ $sub->expired_at?->format('d-m-Y H:i') ?? '-' }}</td>
                <td>
                    @if($sub->status !== 'active')
                    <form action="{{ route('admin.subscriptions.activate', $sub->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-success" type="submit">Aktifkan</button>
                    </form>
                    @else
                        <span class="badge bg-success">Aktif</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
