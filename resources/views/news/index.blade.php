@extends('layouts.app', ['title' => 'Новости'])
@section('title', 'Новости')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/news/news.css') }}">
    <div class="container mt-3">
        <div class="row">
            @foreach($posts as $post)
                <div class="mb-3">
                    <a href="{{ route('news.show', $post->id) }}" class="h2-style">{{ $post->title }}</a>
                    <br>
                    <img src="{{ url('storage/' . $post->image) }}" class="mt-3 " alt="image">
                    <div class="mb-3 d-flex flex-wrap justify-content-start gap-2 mt-3">
                        @foreach($post->tags as $tag)
                            <span class="badge bg-warning text-dark">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    <p class="content">{{ str($post->content)->limit(150) }}</p>
                    <p class="date">{{ $post->created_at }}</p>
                </div>
                <hr>
            @endforeach
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
