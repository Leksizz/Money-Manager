@vite('resources/js/app.js')
<section class="py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card border border-light-subtle rounded-3 shadow-lg p-4">
                    <div class="text-center">
                        <h1 class="display-5 mb-4">Подтвердите Email</h1>
                        <p class="lead mb-4">Вам было отправлено письмо для подтверждения электронной почты</p>
                    </div>
                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <div class="mt-4">
                            <input type="submit" class="btn btn-warning btn-lg d-block mx-auto" value="Отправить письмо повторно">
                        </div>
                    </form>
                    @if(session('message'))
                        <div class="text-center">
                            <p class="lead mb-4">{{ session('message') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
