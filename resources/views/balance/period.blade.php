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
                                <input name="start" type="date" class="form-control" id="from" required>
                            </div>
                            @error('start')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="to" class="form-label">По:</label>
                                <input name="end" type="date" class="form-control" id="to" required>
                            </div>
                            @error('end')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <button type="submit" class="btn btn-warning">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
