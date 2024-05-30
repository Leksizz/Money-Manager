@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Настройки</h2>
        @if(session('status'))
            <p class="text-success">{{ session('status') }}</p>
        @endif
        <form action="{{ route('users.update', auth()->user()->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
            </div>
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="lastname" class="form-label">Фамилия</label>
                <input type="text" class="form-control" id="lastname" name="lastname"
                       value="{{ auth()->user()->lastname }}">
            </div>
            @error('lastname')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
            </div>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-warning mb-3">Сохранить изменения</button>
            <div class="mb-3">
                <a href="" class="text-warning text-decoration-none">Сменить пароль</a>
            </div>
            <div class="mb-3">
                <a href="" class="text-danger text-decoration-none">Удалить аккаунт</a>
            </div>
        </form>
    </div>
@endsection()
