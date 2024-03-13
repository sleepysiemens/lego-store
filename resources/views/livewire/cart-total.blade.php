<div class="col-lg-5 col-12">
    <div class="bg-light rounded">
        <div class="p-4">
            <h1 class="display-6 mb-4">{{__('Итого')}}</h1>
            <div class="d-flex justify-content-between mb-4">
                <h5 class="mb-0 me-4">{{__('Сумма заказа')}}:</h5>
                <p class="mb-0">{{$total}} ₽</p>
            </div>
            <div class="d-flex justify-content-between">
                <h5 class="mb-0 me-4">{{__('Доставка')}}</h5>
                <div class="">
                    <p class="mb-0">{{$delivery}} ₽</p>
                </div>
            </div>
            {{--<p class="mb-0 text-end">Shipping to Ukraine.</p>--}}
        </div>
        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
            <h5 class="mb-0 ps-4 me-4">{{__('Итого')}}</h5>
            <p class="mb-0 pe-4">{{$total + $delivery}} ₽</p>
        </div>
        {{--
        <div class="row justify-content-center mb-5">
            <input type="text" class="border-1 border rounded p-3 col-5 me-3" placeholder="Промокод">
            <button class="btn border-secondary rounded-pill p-3 text-primary col-5" type="button">{{__('Применить')}}</button>
        </div>
        --}}
        <input type="hidden" name="delivery_price" value="{{$delivery}}">
        <input type="hidden" name="cart_price" value="{{$total}}">
        <input type="hidden" name="total" value="{{$total + $delivery}}">
        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">{{__('Продолжить оформление')}}</button>
    </div>
</div>
