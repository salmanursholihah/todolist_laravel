@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Blog</h1>
    @foreach ($posts as $post)
        <div class="mb-4">
            <h3><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
            <p>{{ Str::limit(strip_tags($post->content), 100) }}</p>
        </div>
    @endforeach

    {{ $posts->links() }}
</div>
@endsection
