@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        @if(session('status'))
            <p class="text-success">{{ session('status') }}</p>
        @endif
        <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $news->title) }}">
            </div>
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            @error('image')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="content" class="form-label">Содержание</label>
                <textarea type="text" class="form-control" id="content" name="content">{{ old('content', $news->content) }}</textarea>
            </div>
            @error('content')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="tag_ids[]" class="form-label">Тэги:</label>
                <select class="form-select" name="tag_ids[]" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ is_array($news->tags->pluck('id')->toArray() ) && in_array($tag->id, $news->tags->pluck('id')->toArray() ) ? ' selected' : ''}}>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('tag_ids')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-warning mb-3">Обновить</button>
        </form>
    </div>
@endsection
