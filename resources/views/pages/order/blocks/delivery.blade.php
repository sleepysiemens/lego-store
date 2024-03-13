<div class="container pb-5">
    <div class="row g-4 justify-content-between mt-3">
        <div class="col-6">
            <h1 class="display-6">{{__('Доставка')}}</h1>
            <div class="row mt-5 mb-4">
                <div class="col-md-12 col-lg-6">
                    <div class="form-item w-100">
                        <input type="text" name="name" @if(auth()->user()!=null) value="{{auth()->user()->name}}" readonly @endif class="form-control" required placeholder="{{__('Имя')}}">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-item w-100">
                        <input type="text" name="surname" @if(auth()->user()!=null) value="{{auth()->user()->surname}}" readonly @endif class="form-control" required placeholder="{{__('Фамилия')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-item w-100">
                        <input type="email" name="email" @if(auth()->user()!=null) value="{{auth()->user()->email}}" readonly @endif class="form-control" required placeholder="{{__('Email')}}">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-item w-100">
                        <input type="tel" name="phone" @if(auth()->user()!=null) value="{{auth()->user()->phone}}" readonly @endif class="form-control" placeholder="{{__('Телефон')}}">
                    </div>
                </div>
            </div>
            <h5 class="mt-4">{{__('Тип доставки')}}</h5>

            <div class="card">
                <div class="card-body">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="Delivery-1" name="delivery_type" @if($order->delivery_type==1) checked @endif value="1" disabled>
                        <label class="form-check-label" for="Delivery-1">{{__('Почта России')}}</label>
                    </div>
                    <hr>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="Delivery-2" name="delivery_type" @if($order->delivery_type==2) checked @endif value="2" disabled>
                        <label class="form-check-label" for="Delivery-2">{{__('CDEK')}}</label>
                    </div>
                    <hr>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="Delivery-3" name="delivery_type" @if($order->delivery_type==3) checked @endif value="3" disabled>
                        <label class="form-check-label" for="Delivery-3">{{__('BoxBerry')}}</label>
                    </div>
                    <hr>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="Delivery-4" name="delivery_type" @if($order->delivery_type==4) checked @endif value="4" disabled>
                        <label class="form-check-label" for="Delivery-4">{{__('Самовывоз г. Новосибирск')}}</label>
                    </div>
                </div>
            </div>
            <h5 class="mt-4">{{__('Информация о доставке')}}</h5>
        </div>

        <div class="col-lg-5 col-12">
            <div class="bg-light rounded">
                <div class="p-4">
                    <h1 class="display-6 mb-4">{{__('Итого')}}</h1>
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="mb-0 me-4">{{__('Сумма заказа')}}:</h5>
                        <p class="mb-0">{{$order->cart_price}} ₽</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0 me-4">{{__('Доставка')}}</h5>
                        <div class="">
                            <p class="mb-0">{{$order->delivery_price}} ₽</p>
                        </div>
                    </div>
                    {{--<p class="mb-0 text-end">Shipping to Ukraine.</p>--}}
                </div>
                <div class="py-4 mb-4 border-top d-flex justify-content-between">
                    <h5 class="mb-0 ps-4 me-4">{{__('Итого')}}</h5>
                    <p class="mb-0 pe-4">{{$order->cart_price + $order->delivery_price}} ₽</p>
                </div>
                {{--
                <div class="row justify-content-center mb-5">
                    <input type="text" class="border-1 border rounded p-3 col-5 me-3" placeholder="Промокод">
                    <button class="btn border-secondary rounded-pill p-3 text-primary col-5" type="button">{{__('Применить')}}</button>
                </div>
                --}}
            </div>
        </div>
    </div>
</div>
