@extends ('layouts.app_auth')
@section('title', 'forgot-password')
@section ('content')
<div class="containet mt-5 " style="max-width:400px">
    <h2 class="mb-4 text-center">Forgot password</h2>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-primary w-100">Kirim Link Reset</button>
    </form>
</div>
@endsection
