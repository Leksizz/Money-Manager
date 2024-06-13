@vite('resources/js/app.js')
<section class="py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card border border-light-subtle rounded-3 shadow-lg">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="text-center mb-3">
                            <h2>Пароль успешно сброшен!</h2>
                        </div>
                        <form action="{{ route('password.store', ['token' => $request->token]) }}" method="POST">
                            @csrf
                            <div class="row gy-2 overflow-hidden">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" name="email" value="{{ old('email', $request->email) }}" id="email"
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
                                        <label for="password" class="form-label">Новый пароль</label>
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
                                        <label for="passwordConfirmation" class="form-label">Подтвердите новый
                                            пароль</label>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="col-12">
                                    <div class="d-grid my-3">
                                        <button class="btn btn-warning btn-lg" type="submit">Сохранить новый пароль</button>
                                    </div>
                                </div>
                                @if(session('status'))
                                    <p>{{ session('status') }}</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
