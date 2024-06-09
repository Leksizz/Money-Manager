@extends('layouts.app')
    @section('content')
        <link rel="stylesheet" href="{{ asset('assets/css/admin/admin.css') }}">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="text-center mb-3">Новостные публикации</h2>
                    <div class="mb-3 text-center">
                        <a href="{{ route('news.create') }}" class="btn btn-warning">Добавить новую публикацию</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Заголовок</th>
                                <th>Дата</th>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td><a href="{{ route('news.show', $post) }}"><i class="mb-2 fa fa-eye"></i></a></td>
                                    <td><a href="{{ route('news.edit', $post) }}"><i class="mb-2 fa fa-pencil"></i></a></td>
                                    <td>
                                        <form action="{{ route('news.destroy', $post->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn text-decoration-none">
                                                <i class="fa fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                        <div>
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
