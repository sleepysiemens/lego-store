<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">{{__('Данные покупателя')}}</h1>
        <form action="{{route('order.create')}}" method="post">
            @csrf
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">{{__('Имя')}}<sup>*</sup></label>
                                <input type="text" value="{{auth()->user()->name}}"readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">{{__('Фамилия')}}<sup>*</sup></label>
                                <input type="text" value="{{auth()->user()->surname}}" readonly class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">{{__('Email')}}<sup>*</sup></label>
                                <input value="{{auth()->user()->email}}" readonly type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">{{__('Телефон')}}<sup>*</sup></label>
                                <input type="text" value="{{auth()->user()->phone}}" readonly class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">{{__('Страна')}}<sup>*</sup></label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">{{__('Горд')}} <sup>*</sup></label>
                        <input type="text" class="form-control" placeholder="House Number Street Name">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">{{__('Адрес доставки')}}<sup>*</sup></label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">{{__('Индекс')}}<sup>*</sup></label>
                        <input type="text" class="form-control">
                    </div>
                    <hr class="my-5">
                    <div class="form-item mt-4">
                        <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="{{__('Комментарий')}}"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Позиция</th>
                                <th scope="col">Название</th>
                                <th scope="col">Артикул</th>
                                <th scope="col">Количество</th>
                                <th scope="col">Итого</th>
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
                                        <p class="mb-0 mt-4 text-center">{{$product->number}}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4 text-center">{{$product->amount}}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4 text-center">{{$product->total}} ₽</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="card border-primary">
                            <div class="card-body row">
                                <div class="col-6">
                                    <p class="mb-2 text-dark">{{__('Подытог')}}: {{$order_info['cart_price']}} ₽</p>
                                    <p class="mb-0 text-dark">{{__('Доставка')}}: {{$order_info['delivery_price']}} ₽</p>
                                </div>
                                <div class="col-6 d-flex">
                                    <p class="m-auto fs-5 text-dark text-uppercase">{{__('Итого')}}: {{$order_info['total']}} ₽</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 align-items-center justify-content-center py-3">
                        <p class="mb-0 text-dark text-uppercase">{{__('Метод оплаты')}}</p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="Delivery-1" name="pay_type" required checked value="1">
                                <label class="form-check-label" for="Delivery-1">Банковская карта</label>
                            </div>
                            <hr>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="Delivery-2" name="pay_type" required value="2">
                                <label class="form-check-label" for="Delivery-2">Оплата при получении</label>
                            </div>
                            <hr>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="Delivery-3" name="pay_type" required value="3">
                                <label class="form-check-label" for="Delivery-3">Криптовалюта</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">{{__('Оформить заказ')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
