<title>Забыли пароль</title>
<link rel="icon" href="{{ asset('favicon-32x32.png') }}">
@vite('resources/js/app.js')
<section class="py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4 ">
                <div class="card border border-light-subtle rounded-3 shadow-lg">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="text-center mb-3">
                            <h2>Сброс пароля</h2>
                        </div>
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="row gy-2 overflow-hidden">
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
                                    <div class="d-grid my-3">
                                        <button class="btn btn-warning btn-lg" type="submit">Отправить ссылку для сброса
                                            пароля
                                        </button>
                                    </div>
                                </div>
                                @if(session('status'))
                                    <div class="col-12 text-center">
                                        <div class="d-grid my-3">
                                            <p>Ссылка для сброса пароля была отправлена вам на почту</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
