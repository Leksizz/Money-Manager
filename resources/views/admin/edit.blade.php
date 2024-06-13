@extends('layouts.app')
@section('title', 'Редактирование пользователя')
@section('content')
    <div class="container mt-5">
        @if(session('status'))
            <p class="text-success">{{ session('status') }}</p>
        @endif
        <form action="{{ route('admin.update', $user->id ) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="lastname" class="form-label">Фамилия</label>
                <input type="text" class="form-control" id="lastname" name="lastname"
                       value="{{$user->lastname }}">
            </div>
            @error('lastname')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-warning mb-3">Сохранить изменения</button>
        </form>
    </div>
@endsection
