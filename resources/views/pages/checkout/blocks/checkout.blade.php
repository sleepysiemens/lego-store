<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">{{__('Данные покупателя')}}</h1>
        <form action="#">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">{{__('Имя')}}<sup>*</sup></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">{{__('Фамилия')}}<sup>*</sup></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">{{__('Email')}}<sup>*</sup></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">{{__('Телефон')}}<sup>*</sup></label>
                                <input type="text" class="form-control">
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
                                <th scope="col">Цена</th>
                                <th scope="col">Количество</th>
                                <th scope="col">Итого</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="img/vegetable-item-2.jpg" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                    </div>
                                </th>
                                <td class="py-5">Awesome Brocoli</td>
                                <td class="py-5">$69.00</td>
                                <td class="py-5">2</td>
                                <td class="py-5">$138.00</td>
                                <td class="py-5">$138.00</td>
                            </tr>
                            <tr>
                                <td class="" colspan="3">
                                    <p class="mb-0 text-dark py-3">{{__('Подытог')}}:</p>
                                </td>
                                <td class="" colspan="3">
                                    <div class="py-3">
                                        <p class="mb-0 text-dark">$414.00</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="" colspan="3">
                                    <p class="mb-0 text-dark py-3">Доставка</p>
                                </td>
                                <td colspan="3" class="">
                                    <div class="form-check text-start py-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Shipping-1" name="Shipping-1" value="Shipping">
                                        <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="" colspan="3">
                                    <p class="mb-0 text-dark text-uppercase py-3">{{__('Итого:')}}</p>
                                </td>
                                <td class="" colspan="3">
                                    <div class="py-3">
                                        <p class="mb-0 text-dark">$135.00</p>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row g-4 align-items-center justify-content-center py-3">
                        <p class="mb-0 text-dark text-uppercase">{{__('Метод оплаты')}}</p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="Delivery-1" name="delivery_type" value="1">
                                <label class="form-check-label" for="Delivery-1">Банковская карта</label>
                            </div>
                            <hr>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="Delivery-2" name="delivery_type" value="2">
                                <label class="form-check-label" for="Delivery-2">Оплата при получении</label>
                            </div>
                            <hr>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="Delivery-3" name="delivery_type" value="3">
                                <label class="form-check-label" for="Delivery-3">Криптовалюта</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">{{__('Оформить заказ')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
