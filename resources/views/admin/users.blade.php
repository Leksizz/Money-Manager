@extends('layouts.app')
@section('title', 'Пользователи')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/admin/admin.css') }}">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="text-center">Пользователи</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Email</th>
                            <th>Баланс</th>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->balance->amount }}</td>
                                <td><a href="{{ route('admin.edit', $user) }}"><i class="mb-2 fa fa-pencil"></i></a></td>
                                <td>
                                        <form action="{{ route('admin.destroy', $user->id) }}" method="post">
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
