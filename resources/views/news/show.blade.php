@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/news/news.css') }}">
    <div class="container mt-5">
        <div class="row">
            <div class="text-center">
                <h2>{{ $news->title }}</h2>
                <br>
                <img src="{{ url('storage/' . $news->image) }}" alt="image">
                <p>{{ $news->content }}</p>
                <div class="mb-3 d-flex flex-wrap justify-content-center gap-2 mt-3">
                    @foreach($news->tags as $tag)
                        <span class="badge bg-warning text-dark">{{ $tag->name }}</span>
                    @endforeach
                </div>
                <p class="date">{{ $news->created_at }}</p>
            </div>
        </div>
    </div>
@endsection
