<div class="my-auto position-relative" id="cart-btn">
    <a href="{{route('cart.index')}}" class="position-relative me-4 my-auto">
        <i class="fa fa-shopping-bag fa-2x"></i>
        @if($amount!=0)
            <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">{{$amount}}</span>
        @endif
    </a>
    <div class="position-absolute card border-primary shadow" id="cart-dropdown" style="width: 400px; right: 0">
        <div class="card-body">
            @if($amount!=null)
                <div class="table-responsive">
                    <table class="table" style="font-size: 12px">
                        <thead>
                        <tr>
                            <th scope="col">Позиция</th>
                            <th scope="col">Название</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $product)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="https://img.bricklink.com/ItemImage/PN/{{$product->bl_color}}/{{$product->bricklink_number}}.png" class="img-fluid rounded-circle" style="width: 50px; height: 50px; object-fit: contain" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-1 mt-3">{{$product->title}}</p>
                                </td>
                                <td>
                                    <p class="mb-1 mt-3 text-center">{{$product->amount}}</p>
                                </td>
                                <td>
                                    <p class="mb-1 mt-3">{{$product->total}} ₽</p>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-muted my-3">В корзине пусто</p>
            @endif
        </div>
    </div>
</div>
