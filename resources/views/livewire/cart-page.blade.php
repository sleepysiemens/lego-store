<div class="container py-5">
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
                <th scope="col"></th>
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
                        <a href="{{route('shop.show', $product->number)}}" class="mb-0 mt-4 d-block" style="max-width: 500px ;max-height: 70px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{$product->title}}</a>
                    </td>
                    <td>
                        <p class="mb-0 mt-4">{{$product->number}}</p>
                    </td>
                    <td>
                        <p class="mb-0 mt-4">{{$product->price}} ₽</p>
                    </td>
                    <td>
                        <div class="input-group mt-4" style="width: 100px;">
                            <div class="input-group-btn">
                                <button wire:click="decrement({{$product->id}})" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm text-center border-0" wire:change="hand_input([$event.target.value,{{$product->id}}])" value="{{$product->amount}}">
                            <div class="input-group-btn">
                                <button wire:click="increment({{$product->id}})" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="mb-0 mt-4">{{$product->total}} ₽</p>
                    </td>
                    <td>
                        <button wire:click="delete_product({{$product->id}})" class="btn btn-md rounded-circle bg-light border mt-4" >
                            <i class="fa fa-times text-danger"></i>
                        </button>
                    </td>

                </tr>
            @endforeach
            <tr>
                <td colspan="7">
                    <a href="{{route('cart.empty')}}" style="color: rgba(255,0,0,.5)"><i class="far fa-trash-alt"></i> Очистить корзину</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
