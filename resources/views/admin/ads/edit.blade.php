@extends('layouts.app_admin')

@section('content')
<h1>Edit Ad</h1>

<form action="{{ route('admin.ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title', $ad->title) }}" required>
    </div>

    <div>
        <label>Type</label>
        <select name="type" required>
            <option value="image" {{ old('type', $ad->type) == 'image' ? 'selected' : '' }}>Image</option>
            <option value="video" {{ old('type', $ad->type) == 'video' ? 'selected' : '' }}>Video</option>
        </select>
    </div>

    <div>
        <label>Placement</label>
        <input type="text" name="placement" value="{{ old('placement', $ad->placement) }}">
    </div>

    <div>
        <label>Media</label>
        <input type="file" name="media_path">
        @if($ad->media_path)
            <p>Current: {{ $ad->media_path }}</p>
        @endif
    </div>

    <div>
        <label>Link URL</label>
        <input type="url" name="link_url" value="{{ old('link_url', $ad->link_url) }}">
    </div>

    <div>
        <label>Duration (detik)</label>
        <input type="number" name="duration" value="{{ old('duration', $ad->duration) }}">
    </div>

    <div>
        <label>Weight</label>
        <input type="number" name="weight" value="{{ old('weight', $ad->weight) }}">
    </div>

    <div>
        <label>Autoplay</label>
        <input type="checkbox" name="autoplay" value="1" {{ old('autoplay', $ad->autoplay) ? 'checked' : '' }}>
    </div>

    <div>
        <label>Mute</label>
        <input type="checkbox" name="mute" value="1" {{ old('mute', $ad->mute) ? 'checked' : '' }}>
    </div>

    <div>
        <button type="submit">Update Ad</button>
    </div>
</form>
@endsection
