@extends('layouts.app')
@section('title', 'Тэги')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/admin/admin.css') }}">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="text-center mb-3">Управление тэгами</h2>
                <div class="mb-3 text-center">
                    <a href="{{ route('tags.create') }}" class="btn btn-warning">Добавить новый тэг</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Создан</th>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->created_at }}</td>
                                <td>
                                    <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn text-decoration-none">
                                            <i class="fa fa-trash-can"></i>
                                        </button>
                                    </form>
                                    @endforeach
                                </td>

                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
