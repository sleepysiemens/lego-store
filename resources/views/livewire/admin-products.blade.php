<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row mb-3 px-2">
                                <a href="{{route('admin.products.create')}}" type="button" class="btn btn-primary btn-block w-25"><i class="fas fa-plus"></i> Добавить товар</a>
                            </div>
                            <div class="row">
                                <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">#</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Название</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Цвет</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Артикул</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Цена, ₽</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Количество</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">В наличии</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1"></th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1"></th>
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

                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    {{$products->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

