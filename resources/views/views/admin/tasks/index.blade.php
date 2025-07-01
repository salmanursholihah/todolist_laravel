@extends('layouts.app_admin')

@section('title','dashboard_admin')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/style/style_table_admin.css') }}">

@endpush
<div class="content">
    <table>
        <h2>Data Tugas</h2>
        <div>
            <a href="{{ route('tasks.export.excel') }}" class="btn btn-success">export excel</a>
            <a href="{{ route('tasks.export.pdf') }}" class="btn btn-primary">export pdf</a>
        </div>
        <br>

        <ul>
            <th>user ID</th>
            <th>name</th>
            <th>title</th>
            <th>create_at</th>
            <th>update_at</th>
            <th>aksi</th>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->user_id }}</td>
                <td>{{ $task->user->name ?? 'username tidak di temukan' }}</td>
                <td>{{ $task->title }}</td>
                <td>{{  $task->created_at}}</td>
                <td>{{ $task->updated_at }}</td>
                <td>{{ $task->is_done }}</td>


            </tr>
            @endforeach
        </ul>
    </table>
</div>

@endsection