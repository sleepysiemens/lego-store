<div class="container py-5">
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="bg-light rounded">
                <div class="p-4">
                    <h1 class="fs-5 mb-4">{{__('Данные пользователя')}}</h1>
                    <div class="d-flex justify-content-start mb-4">
                        <div class="rounded-circle overflow-hidden border-warning border border-3" style="width: 75px; height: 75px">
                            <img src="{{asset('img/profile-pic.webp')}}" alt="profile-pic" class="w-100 h-100" style="object-fit: cover !important;">
                        </div>
                        <div class="my-auto ms-2">
                            <h5 class="m-0">{{auth()->user()->name}} {{auth()->user()->surname}}</h5>
                            <p class="m-0">{{auth()->user()->email}}</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{route('logout')}}" class="fs-4">{{__('Выйти')}}<i class="fas fa-sign-out-alt ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-12">
            <h1 class="fs-3 mb-4">{{__('Заказы')}}</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">{{__('Дата создания')}}</th>
                    <th scope="col" class="text-center">{{__('Статус')}}</th>
                    <th scope="col" class="text-center">{{__('Стоимость')}}</th>
                    <th scope="col" class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>
                            <p class="my-2 text-center">{{$order->number}}</p>
                        </td>
                        <td>
                            <p class="my-2 text-center">{{$order->created_at}}</p>
                        </td>
                        <td>
                            <p class="my-2 text-center">
                            @switch($order->status)
                                @case(0)
                                    {{__('Создан')}}
                                    @break
                                @case(1)
                                    {{__('Оплачен')}}
                                    @break
                                @case(2)
                                    {{__('Готовим к отправке')}}
                                    @break
                                @case(3)
                                    {{__('Передан в доставку')}}
                                    @break
                                @case(4)
                                    {{__('Доставка')}}
                                    @break
                                @case(5)
                                    {{__('В пункте выдачи')}}
                                    @break
                                @case(6)
                                        {{__('Выдан')}}
                                        @break
                                    @endswitch
                            </p>
                        </td>
                        <td>
                            <p class="my-2 text-center">{{$order->price + $order->delivery_price}} ₽</p>
                        </td>
                        <td>
                            <a class="my-2 d-flex" href="{{route('order.index',$order->number)}}">
                                <i class="fas fa-arrow-right fs-4"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

