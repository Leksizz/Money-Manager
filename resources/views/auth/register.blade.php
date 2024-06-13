<title>Регистрация</title>
<link rel="icon" href="{{ asset('favicon-32x32.png') }}">
@vite('resources/js/app.js')
<section class="py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card border border-light-subtle rounded-3 shadow-lg">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="text-center mb-3">
                            <h2>Регистрация</h2>
                        </div>
                        <form action="{{ route('auth.store') }}" method="POST">
                            @csrf
                            <div class="row gy-2 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="name" id="firstName"
                                               placeholder="Имя" required>
                                        <label for="firstName" class="form-label">Имя</label>
                                    </div>
                                </div>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="lastname" id="lastName"
                                               placeholder="Фамилия" required>
                                        <label for="lastname" class="form-label">Фамилия</label>
                                    </div>
                                </div>
                                @error('lastname')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="email" id="email"
                                               placeholder="Электронная почта" required>
                                        <label for="email" class="form-label">Электронная почта</label>
                                    </div>
                                </div>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="password" id="password"
                                               value="" placeholder="Пароль" required>
                                        <label for="password" class="form-label">Пароль</label>
                                    </div>
                                </div>
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="password_confirmation"
                                               id="passwordConfirmation"
                                               placeholder="Подтвердите пароль" required>
                                        <label for="passwordConfirmation" class="form-label">Подтвердите пароль</label>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="col-12">
                                    <div class="d-grid my-3">
                                        <button class="btn btn-warning btn-lg" type="submit">Регистрация</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="m-0 text-secondary text-center">Уже есть аккаунт? <a
                                            href="{{ route('login') }}"
                                            class="link-warning text-decoration-none">Войти</a>
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
