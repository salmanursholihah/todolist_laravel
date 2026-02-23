@extends('layouts.app_admin')
@section('content')
<div class="main-content">

    <div class="container-fluid">

        <!-- HEADER -->
        <div class="mb-4">
            <h3 class="fw-bold">Profile</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div>

        <div class="row g-4">

            <!-- LEFT SIDE - AVATAR -->
            <div class="col-12 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center">

                    @if ($user->avatar)
                        <img src="{{ asset('storage/avatars/' . $user->avatar) }}" class="rounded-circle mb-3"
                            width="120" height="120" style="object-fit: cover;">
                    @else
                        <img src="{{ asset('storage/avatars/default.png') }}" class="rounded-circle mb-3" width="120"
                            height="120" style="object-fit: cover;">
                    @endif

                    <h5 class="fw-bold mb-0">{{ $user->name }}</h5>
                    <small class="text-muted">{{ $user->email }}</small>

                </div>
            </div>

            <!-- RIGHT SIDE - FORM -->
            <div class="col-12 col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4">

                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama</label>
                            <input name="name" class="form-control" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input name="email" type="email" class="form-control"
                                value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Avatar -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                            @error('avatar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Password Baru
                                </label>
                                <input name="password" type="password" class="form-control"
                                    placeholder="Kosongkan jika tidak diubah">
                                @error('password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label fw-semibold">
                                    Konfirmasi Password
                                </label>
                                <input name="password_confirmation" type="password" class="form-control">
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4 rounded-pill">
                                Simpan Perubahan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection
