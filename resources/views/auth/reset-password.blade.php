@extends('layouts.app_auth')
@section('title', 'reset-password')
@section ('content')
<div class="container mt-5" style="max-width:400px;">
    <h2 class="mb-4 text-center">Reset password</h2>
    <form method="POST" action="{{ route('password.update') }}"">
        @csrf

        <div class=" mb-3">
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ request()->email }}">

</div>
<div class="mb-3">
    <label for="password-baru" class="form-label">Password baru</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password Baru" required>
    <label for="konfirmasi-password" class="form-label">konfirmasi password</label>
    <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Ulangi Password"
        required>

</div>
<button type="submit" class="btn btn-primary btn-priary w-100">Reset Password</button>
</form>
</div>
@endsection