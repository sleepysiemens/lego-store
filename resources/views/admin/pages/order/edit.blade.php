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

    <form class="content" method="post" action="{{route('admin.orders.update',$order)}}">
        @method('patch')
        @csrf
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <button class="btn btn-primary ms-auto">Сохранить</button>
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
                            <div class="input-group">
                                <select name="delivery_type">
                                    <option value="1" @if($order->delivery_type==1) selected @endif>Почта России</option>
                                    <option value="2" @if($order->delivery_type==2) selected @endif>CDEK</option>
                                    <option value="3" @if($order->delivery_type==3) selected @endif>BoxBerry</option>
                                    <option value="4" @if($order->delivery_type==4) selected @endif>Самовывоз</option>
                                </select>
                            </div>

                            <div class="input-group pt-3">
                                <input class="form-control-sm bg-dark border me-1" type="number" name="delivery_price" value="{{$order->delivery_price}}">
                                <label class="">₽</label>
                            </div>

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
                            <div class="input-group">
                                <select name="status">
                                    <option value="0" @if($order->status==0) selected @endif>Создан</option>
                                    <option value="1" @if($order->status==1) selected @endif>Оплачен</option>
                                    <option value="2" @if($order->status==2) selected @endif>Готовим к отправке</option>
                                    <option value="3" @if($order->status==3) selected @endif>Передан в доставку</option>
                                    <option value="4" @if($order->status==4) selected @endif>Доставка</option>
                                    <option value="5" @if($order->status==5) selected @endif>В пункте выдачи</option>
                                    <option value="6" @if($order->status==6) selected @endif>Выдан</option>
                                </select>
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
    </form>
@endsection
