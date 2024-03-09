<div class="container-fluid py-5">
    <div class="container py-5">
            @if($cart!=null)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Позиция</th>
                            <th scope="col">Название</th>
                            <th scope="col">Артикул</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Итого</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $product)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="https://img.bricklink.com/ItemImage/PN/{{$product->bl_color}}/{{$product->bricklink_number}}.png" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{$product->title}}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{$product->number}}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{$product->price}} ₽</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="{{$product->amount}}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{$product->total}} ₽</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="7">
                                <a href="{{route('cart.empty')}}" style="color: rgba(255,0,0,.5)"><i class="far fa-trash-alt"></i> Очистить корзину</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row g-4 justify-content-between mt-3">
                    <div class="col-6">
                        <h1 class="display-6">{{__('Доставка')}}</h1>
                        <div class="row mt-5 mb-4">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <input type="text" class="form-control" required placeholder="{{__('Имя')}}">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <input type="text" class="form-control" required placeholder="{{__('Фамилия')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <input type="email" class="form-control" required placeholder="{{__('Email')}}">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <input type="tel" class="form-control" placeholder="{{__('Телефон')}}">
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-4">{{__('Тип доставки')}}</h5>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="Delivery-1" name="delivery_type" value="1">
                                    <label class="form-check-label" for="Delivery-1">{{__('Почта России')}}</label>
                                </div>
                                <hr>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="Delivery-2" name="delivery_type" value="2">
                                    <label class="form-check-label" for="Delivery-2">{{__('CDEK')}}</label>
                                </div>
                                <hr>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="Delivery-3" name="delivery_type" value="3">
                                    <label class="form-check-label" for="Delivery-3">{{__('BoxBerry')}}</label>
                                </div>
                                <hr>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="Delivery-4" name="delivery_type" value="4">
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
                                    <p class="mb-0">$96.00</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">{{__('Доставка')}}</h5>
                                    <div class="">
                                        <p class="mb-0">$3.00</p>
                                    </div>
                                </div>
                                {{--<p class="mb-0 text-end">Shipping to Ukraine.</p>--}}
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">{{__('Итого')}}</h5>
                                <p class="mb-0 pe-4">$99.00</p>
                            </div>
                            {{--
                            <div class="row justify-content-center mb-5">
                                <input type="text" class="border-1 border rounded p-3 col-5 me-3" placeholder="Промокод">
                                <button class="btn border-secondary rounded-pill p-3 text-primary col-5" type="button">{{__('Применить')}}</button>
                            </div>
                            --}}
                            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">{{__('Продолжить оформление')}}</button>
                        </div>
                    </div>
                </div>
            @else
                <p>Корзина пуста</p>
            @endif
    </div>
</div>
