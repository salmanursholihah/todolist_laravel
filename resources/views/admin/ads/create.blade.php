@extends('layouts.app_admin')

@section('content')
<h1>Create New Ad</h1>

<form action="{{ route('admin.ads.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title') }}" required>
    </div>

    <div>
        <label>Type</label>
        <select name="type" required>
            <option value="image" {{ old('type') == 'image' ? 'selected' : '' }}>Image</option>
            <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video</option>
        </select>
    </div>

    <div>
        <label>Placement</label>
        <input type="text" name="placement" value="{{ old('placement') }}">
    </div>

    <div>
        <label>Media</label>
        <input type="file" name="media_path">
    </div>

    <div>
        <label>Link URL</label>
        <input type="url" name="link_url" value="{{ old('link_url') }}">
    </div>

    <div>
        <label>Duration (detik)</label>
        <input type="number" name="duration" value="{{ old('duration', 5) }}">
    </div>

    <div>
        <label>Weight</label>
        <input type="number" name="weight" value="{{ old('weight', 1) }}">
    </div>

    <div>
        <label>Autoplay</label>
        <input type="checkbox" name="autoplay" value="1" {{ old('autoplay') ? 'checked' : '' }}>
    </div>

    <div>
        <label>Mute</label>
        <input type="checkbox" name="mute" value="1" {{ old('mute') ? 'checked' : '' }}>
    </div>

    <div>
        <button type="submit">Create Ad</button>
    </div>
</form>
@endsection
