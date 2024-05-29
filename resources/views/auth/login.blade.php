@vite('resources/js/app.js')
<section class="py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4 ">
                <div class="card border border-light-subtle rounded-3 shadow-lg">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="text-center mb-3">
                            <h2>Авторизация</h2>
                        </div>
                        <form action="{{ route('auth.login') }}" method="POST">
                            @csrf
                            @if(session('status'))
                                <div class="col-12 mb-3">
                                    <p class="m-0 text-success text-center">{{ session('status') }}
                                    </p>
                                </div>
                            @endif
                            <div class="row gy-2 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="email" id="email"
                                               placeholder="Электронная почта" required value="{{ old('email') }}">
                                        <label for="email" class="form-label">Электронная почта</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="password" id="password"
                                               value="" placeholder="Пароль" required>
                                        <label for="password" class="form-label">Пароль</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid my-3">
                                        <button class="btn btn-warning btn-lg" type="submit">Войти</button>
                                    </div>
                                </div>
                                <div class="container">
                                        <div class="">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember" name="remember" value="1">
                                                <label class="form-check-label" for="remember">
                                                    Запомнить меня
                                                </label>
                                            </div>
                                        </div>
                                </div>

                            @if(session('message'))
                                    <div class="text-center">
                                        <p class="text-danger lead mb-4">{{ session('message') }}</p>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <p class="m-0 text-secondary text-center">Нет аккаунта? <a
                                            href="{{ route('auth.create') }}"
                                            class="link-warning text-decoration-none">Зарегистрируйтесь</a>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="m-0 text-secondary text-center">Забыли пароль?<a
                                            href="{{ route('password.request') }}"
                                            class="link-warning text-decoration-none"> Восстановить</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
