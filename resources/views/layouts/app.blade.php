<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    @vite('resources/js/app.js')
    <script src="https://kit.fontawesome.com/47ae1cb85a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/layouts/main/style.css') }}">
</head>
<body>
<div id="wrapper">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <h2>Money Manager</h2>
        </div>
        <ul class="sidebar-nav">
            <li>
                <a href="{{ route('balance.show', auth()->id()) }}"><i class="fa fa-home"></i>Домой</a>
            </li>
            <li>
                <a href="{{ route('finance.show', ['type' => 'income', 'balance' => auth()->id()]) }}"><i class="fa fa-coins"></i>Доходы</a>
            </li>
            <li>
                <a href="{{ route('finance.show', ['type' => 'expense', 'balance' => auth()->id()]) }}"><i class="fa fa-store"></i>Расходы</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-newspaper"></i>Новости</a>
            </li>
            <li>
                <a href="{{ route('users.edit', auth()->id()) }}"><i class="fa fa-gear"></i>Настройки</a>
            </li>
        </ul>
    </aside>

    <div id="navbar-wrapper">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        <button type="submit" class="navbar-brand" id="exit"><i class="fas fa-door-open"></i></button>
                    </form>

                </div>
            </div>
        </nav>
    </div>
    <section id="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>
        </div>
    </section>
</div>
<script src="{{ asset('assets/js/layouts/main/script.js') }}"></script>
</body>
</html>
