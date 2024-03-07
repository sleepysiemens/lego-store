<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center pt-3">
            <div class="col-11">
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
                        <a href="{{route('admin.products.create')}}" type="button" class="btn btn-primary btn-block w-25"><i class="fas fa-plus"></i> Добавить товар</a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0" style="display: block;">
                        <div class="table-responsive table-hover">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Цвет</th>
                                    <th>Артикул</th>
                                    <th>Цена, ₽</th>
                                    <th>Количество</th>
                                    <th>В наличии</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr class="odd">
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->color}}</td>
                                        <td>{{$product->number}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->amount}}</td>
                                        <td>@if($product->is_available) <i class="fas fa-check"></i>@else<i class="fas fa-times"></i>@endif</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="text-white m-auto" href="{{route('admin.products.edit',$product)}}"><i class="fas fa-pen"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <form class="d-flex" method="post" action="{{route('admin.products.delete',$product)}}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn text-white p-0 m-auto"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix" style="display: block;">
                        {{$products->links()}}
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

