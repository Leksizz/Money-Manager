@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        @if(session('status'))
            <p class="text-success">{{ session('status') }}</p>
        @endif
        <form action="{{ route('tags.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-warning mb-3">Добавить</button>
        </form>
    </div>
@endsection
