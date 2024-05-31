@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/dashboard.css') }}">    <h3 class="text-center mt-3">Ваш баланс: {{ $balance }}</h3>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-3">
                <figure class="pie-chart">
                    <h4>Статистика:</h4>
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
@endsection
