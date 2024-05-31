@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/dashboard.css') }}">    <h3 class="text-center mt-3">Ваш баланс: {{ $balance }}</h3>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-3">
                <figure class="pie-chart">
                        <ul class="ms-2 navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ваши доходы за:
                                </a>
                                <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Сегодня</a></li>
                                    <li><a class="dropdown-item" href="#">Неделю</a></li>
                                    <li><a class="dropdown-item" href="#">Месяц</a></li>
                                    <li><a class="dropdown-item" href="#">Год</a></li>
                                    <li><a class="dropdown-item" href="#">Всё время</a></li>
                                    <li><a class="dropdown-item" href="#">Выбрать период</a></li>
                                </ul>
                            </li>
                        </ul>
                    <figcaption>
                        Coal 38<span style="color:#4e79a7"></span><br>
                        Natural Gas 23<span style="color:#f28e2c"></span><br>
                        Hydro 16<span style="color:#e15759"></span><br>
                        Nuclear 10<span style="color:#76b7b2"></span><br>
                        Renewable 6<span style="color:#59a14f"></span><br>
                        Other 7<span style="color:#edc949"></span>
                        <p>123</p>
                    </figcaption>
                    <cite>International Energy Agency</cite>
                </figure>
            </div>
        </div>
    </div>
    @if(session('incomes'))
        @foreach(session('incomes') as $income)
            <p>{{ $income->amount }}</p>
        @endforeach
    @endif

@endsection
