@extends('layouts.app')
@section('title', $news->title)
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/news/news.css') }}">
    <div class="container mt-5">
        <div class="row">
            <div class="text-center">
                <h2>{{ $news->title }}</h2>
                <br>
                <img src="{{ url('storage/' . $news->image) }}" alt="image">
                <div class="mb-3 d-flex flex-wrap justify-content-center gap-2 mt-3">
                    @foreach($news->tags as $tag)
                        <span class="badge bg-warning text-dark">{{ $tag->name }}</span>
                    @endforeach
                </div>
                <p>{{ $news->content }}</p>
                <p class="date">{{ $news->created_at }}</p>
            </div>
        </div>
    </div>
@endsection
