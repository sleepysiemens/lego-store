<div class="card">
    <div class="card-header">
        <h3 class="card-title">Недавно добавленные товары</h3>

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
        <ul class="products-list product-list-in-card pl-2 pr-2">
            @foreach($latest_products as $product)
                <li class="item">
                    <div class="product-img">
                        <img src="https://img.bricklink.com/ItemImage/PN/{{$product->color_id}}/{{$product->bricklink_number}}.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                        <a href="" class="product-title">{{$product->title}}
                            <span class="badge badge-warning float-right">{{$product->price}} ₽</span></a>
                        <span class="product-description">
                        {{$product->number}}/{{$product->bricklink_number}}
                      </span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-center">
        <a href="{{route('admin.products.index','all')}}" class="uppercase">Все товары</a>
    </div>
    <!-- /.card-footer -->
</div>
