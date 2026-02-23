{{-- @extends('layouts.app_auth')

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
@endsection --}}


@extends('layouts.app_auth')

@section('title','Login')

@section('content')

<h2>Login</h2>
<p class="subtitle">Masuk ke akun anda untuk melanjutkan</p>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group">
        <input type="email" name="email" placeholder="Email" required>
    </div>

    <div class="form-group">
        <input type="password" name="password" placeholder="Password" required>
    </div>

    <button type="submit">Login</button>

    <div class="link">
        <a href="{{ route('password.request') }}">Lupa Password?</a>
    </div>

    <div class="link">
        Belum punya akun? <a href="{{ route('register') }}">Register</a>
    </div>
</form>

@endsection
