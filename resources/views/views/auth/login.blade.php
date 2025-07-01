@extends('layouts.app_auth')

@section('title', 'login')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">login</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
        <a href="register">belum punya akun??</a>
        <a href="forgot-password">lupa password??</a>
    </form>
</div>
@endsection