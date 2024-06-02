@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-3">Выберите период:</h2>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route("$type.period", $balance->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="from" class="form-label">С:</label>
                                <input type="date" class="form-control" id="from" required>
                            </div>
                            <div class="mb-3">
                                <label for="to" class="form-label">По:</label>
                                <input type="date" class="form-control" id="to" required>
                            </div>
                            <button type="submit" class="btn btn-warning">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
