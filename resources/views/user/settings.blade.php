@extends('layouts.app')
@section('title', 'Настройки')
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
            <div class="mb-3"><strong>Используемая валюта:</strong>
            </div>
            <div class="mb-3">
                <select name="currency_id">
                    <option value="{{ auth()->user()->currency_id }}" selected>Не выбрано</option>
                    <option value="1">Американский доллар (USD)</option>
                    <option value="2">Евро (EUR)</option>
                    <option value="3">Российский рубль (RUB)</option>
                    <option value="4">Китайский Юань (CNY)</option>
                    <option value="5">Британский фунт стерлингов (GBP)</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning mb-3">Сохранить изменения</button>
        </form>
        <form action="{{ route('users.destroy', auth()->user()->id) }}" method="post">
            @csrf
            @method('delete')
            <div class="">
                <button type="submit" class="btn btn-danger">Удалить аккаунт</button>
            </div>
        </form>
    </div>
@endsection()
