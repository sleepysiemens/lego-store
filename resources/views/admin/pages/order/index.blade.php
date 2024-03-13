@extends('layouts.admin')

@section('orders') active @endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Заказ #{{$order->number}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{route('admin.orders.edit',$order->number)}}" class="btn btn-primary ms-auto">Редактировать</a>
                </div>
            </div>

            <div class="row pt-3">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box h-100">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Заказчик</span>
                            <div class="info-box-number">
                                <p class="m-0">{{$order->email}}</p>
                            </div>
                            <span class="info-box-text">{{$order->name}} {{$order->surname}}</span>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box h-100">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-truck"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Доставка</span>
                            <span class="info-box-text">
                                @switch($order->delivery_type)
                                    @case(1)Почта России@break
                                    @case(2)CDEK@break
                                    @case(3)BoxBerry@break
                                    @case(4)Самовывоз@break
                                @endswitch
                            </span>
                            <span class="info-box-text">Цена: {{$order->delivery_price}} ₽</span>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box h-100">
                        <span class="info-box-icon bg-warning elevation-1"><i class="far fa-clipboard"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Статус</span>
                            <div class="info-box-number">
                                <p class="m-0">
                                    @switch($order->status)
                                        @case(0){{__('Создан')}}@break
                                        @case(1){{__('Оплачен')}}@break
                                        @case(2){{__('Готовим к отправке')}}@break
                                        @case(3){{__('Передан в доставку')}}@break
                                        @case(4){{__('Доставка')}}@break
                                        @case(5){{__('В пункте выдачи')}}@break
                                        @case(6){{__('Выдан')}}@break
                                    @endswitch

                                </p>
                            </div>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>

            <div class="row justify-content-start pt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <p>Корзина</p>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0" style="display: block;">
                            <div class="table-responsive table-hover">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        <th>Название</th>
                                        <th>Артикул</th>
                                        <th>Цена</th>
                                        <th>Количество</th>
                                        <th>Итого</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart as $product)
                                        <tr class="odd">
                                            <td>{{$product->id}}</td>
                                            <td><img src="https://img.bricklink.com/ItemImage/PN/{{$product->bl_color}}/{{$product->bricklink_number}}.png" style="width: 100px; height: 100px"></td>
                                            <td>{{$product->title}}</td>
                                            <td>{{$product->number}}</td>
                                            <td>{{$product->price}} ₽</td>
                                            <td>{{$product->amount}}</td>
                                            <td>{{$product->total}} ₽</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
