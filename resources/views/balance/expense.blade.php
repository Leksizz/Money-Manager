@extends('layouts.app')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/dashboard.css') }}">
    <script src="{{ asset('assets/js/jquery/jquery.js') }}"></script>
    <h3 class="text-center mt-3">Ваш
        баланс: {{ $balance }}</h3>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-1">
                <ul class="ms-2 mb-3 navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Ваши расходы за:
                        </a>
                        <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item"
                                   data-url="{{ route('finance.today', ['type' => $type, 'balance' => auth()->id()]) }}"
                                   href="#">Сегодня</a></li>
                            <li><a class="dropdown-item"
                                   data-url="{{ route('finance.week', ['type' => $type, 'balance' => auth()->id()]) }}"
                                   href="#">Неделю</a></li>
                            <li><a class="dropdown-item"
                                   data-url="{{ route('finance.month', ['type' => $type, 'balance' => auth()->id()]) }}"
                                   href="#">Месяц</a></li>
                            <li><a class="dropdown-item"
                                   data-url="{{ route('finance.year', ['type' => $type, 'balance' => auth()->id()]) }}"
                                   href="#">Год</a></li>
                            <li><a class="dropdown-item"
                                   data-url="{{ route('finance.all', ['type' => $type, 'balance' => auth()->id()]) }}"
                                   href="#">Всё время</a></li>
                            <li><a class="ms-3 text-decoration-none"
                                   href="{{ route('balance.period', ['type' => $type, 'balance' => auth()->id()]) }}">Выбрать
                                    период:</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <canvas id="doughnut-chart" class="chart-canvas chart-container"></canvas>
    <div class=" mt-5">
        <h2>Добавить расходы</h2>
        @if(session('status'))
            <p class="text-success">{{ session('status') }}</p>
        @endif
        <form action="{{ route('finance.store', ['type' => $type, 'balance' => auth()->id()]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="numberInput" class="form-label">Введите число</label>
                <input type="text" name="amount" class="form-control" id="numberInput" maxlength="9">
            </div>
            @error('amount')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="categorySelect" class="form-label">Выберите категорию</label>
                <select class="form-select" name="category_id" id="categorySelect">
                    <option value="1" selected disabled>Выберите...</option>
                    <option value="1">Продукты</option>
                    <option value="2">Транспорт</option>
                    <option value="3">Здоровье</option>
                    <option value="4">Дом</option>
                    <option value="5">Учёба</option>
                    <option value="6">Бытовые товары</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Отправить</button>
        </form>
    </div>
    <script type="module" src="{{ asset('assets/js/finance/getFinance.js') }}"></script>
@endsection
