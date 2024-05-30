@extends('layouts.app')
@section('content')
    <h3 class="text-center mt-3">Ваш баланс: {{ $user->balance->amount }}</h3>
@endsection
