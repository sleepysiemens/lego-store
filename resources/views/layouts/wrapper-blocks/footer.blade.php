<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="#">
                        <h1 class="text-primary mb-0">{{env('APP_NAME')}}</h1>
                        <p class="text-secondary mb-0">{{__('Детали лего')}}</p>
                    </a>
                </div>
                <div class="col-lg-8">
                    <div class="position-relative mx-auto">
                        <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="{{__('Ваш Email')}}">
                        <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">{{__('Подписаться на обновления')}}</button>
                    </div>
                </div>
                {{--
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end pt-3">
                        <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                --}}
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Почему мы?</h4>
                    <p class="mb-4">Широкий ассортимент: Мы предлагаем огромный выбор деталей LEGO, чтобы вы могли воплотить свои самые смелые и креативные идеи в реальность.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Магазин</h4>
                    <a class="btn-link" href="{{route('contact.index')}}">Контакты</a>
                    <a class="btn-link" href="">Политика конфиденциальности</a>
                    <a class="btn-link" href="">Доставка</a>
                    <a class="btn-link" href="">Оплата</a>
                    <a class="btn-link" href="">Возврат</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Аккаунт</h4>
                    <a class="btn-link" href="{{route('profile.index')}}">Мой аккаунт</a>
                    <a class="btn-link" href="{{route('cart.index')}}">Корзина</a>
                    <a class="btn-link" href="{{route('profile.index')}}">Заказы</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <a class="btn-link" href="{{route('contact.index')}}">
                        <h4 class="text-light mb-3">Контакты</h4>
                    </a>
                    <p>Адрес: г. Новосибирск</p>
                    <p>Email: {{env('MAIL_FROM_ADDRESS')}}</p>
                    {{--<p>Phone: +0123 4567 8910</p>--}}
                    <p>Способы оплаты</p>
                    <img src="{{asset('img/payment.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
