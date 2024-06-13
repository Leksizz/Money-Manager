@extends('layouts.app')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/dashboard.css') }}">    <h3 class="text-center mt-3">Ваш
        баланс: {{ $balance }}</h3>
    <script src="{{ asset('assets/js/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/finance/getStatistic.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-3">
                <canvas id="doughnut-chart" class="chart-canvas chart-container"></canvas>

            </div>
        </div>
    </div>
@endsection
