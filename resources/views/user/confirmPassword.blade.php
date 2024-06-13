@vite('resources/js/app.js')
<section class="py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4 ">
                <div class="card border border-light-subtle rounded-3 shadow-lg">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="text-center mb-3">
                            <h2>Для получения доступа введите пароль</h2>
                        </div>
                        <form action="{{ route('password.confirm') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" id="password"
                                           value="" placeholder="Пароль" required>
                                    <label for="password" class="form-label">Пароль</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid my-3">
                                    <button class="btn btn-warning btn-lg" type="submit">Подтвердить</button>
                                </div>
                            </div>
                            @error('password')
                            <div>
                                <p class="text-center text-danger">{{ $message }}</p>
                            </div>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
