@extends('layouts.app')
@section('content')
    <div class="container mt-5">

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Пользователи</h5>
                <p class="card-text">Просмотр пользователей</p>
                <a href="{{ route('admin.users') }}" class="btn btn-primary">Перейти</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Новости</h5>
                <p class="card-text">Добавление и редактирование новостной ленты</p>
                <a href="{{ route('admin.news') }}" class="btn btn-success">Перейти</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Тэги</h5>
                <p class="card-text">Добавление и редактирование тегов для публикаций</p>
                <a href="{{ route('admin.tags') }}" class="btn btn-warning">Перейти</a>
            </div>
        </div>

    </div>
@endsection
