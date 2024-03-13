<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center pt-3">

            <div class="col-11">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Последние заказы</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Заказчик</th>
                                    <th>Дата создания</th>
                                    <th>Статус</th>
                                    <th>Стоимость</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td><a href="{{route('admin.orders.show',$order->number)}}">{{$order->number}}</a></td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            @switch($order->status)
                                                @case(0)
                                                    <span class="badge badge-danger">
                                            {{__('Создан')}}
                                        </span>
                                                    @break
                                                @case(1)
                                                    <span class="badge badge-warning">
                                        {{__('Оплачен')}}
                                        </span>
                                                    @break
                                                @case(2)
                                                    <span class="badge badge-warning">
                                        {{__('Готовим к отправке')}}
                                        </span>
                                                    @break
                                                @case(3)
                                                    <span class="badge badge-warning">
                                        {{__('Передан в доставку')}}
                                        </span>
                                                    @break
                                                @case(4)
                                                    <span class="badge badge-warning">
                                        {{__('Доставка')}}
                                        </span>
                                                    @break
                                                @case(5)
                                                    <span class="badge badge-warning">
                                        {{__('В пункте выдачи')}}
                                        </span>
                                                    @break
                                                @case(6)
                                                    <span class="badge badge-success">
                                        {{__('Выдан')}}
                                        </span>
                                                    @break
                                            @endswitch

                                        </td>
                                        <td>{{$order->delivery_price+$order->cart_price}} ₽</td>
                                        <td><a href="{{route('admin.orders.show',$order->number)}}"><i class="fas fa-arrow-right"></i></a></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{$orders->links()}}
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>

        </div>
    </div>
</section>

