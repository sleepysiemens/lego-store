<div class="container py-5">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Позиция</th>
                <th scope="col">Название</th>
                <th scope="col" class="text-center">Артикул</th>
                <th scope="col" class="text-center">Цена</th>
                <th scope="col" class="text-center">Количество</th>
                <th scope="col" class="text-center">Итого</th>
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
                        <p class="mb-0 mt-4">{{$product->title}}</p>
                    </td>
                    <td>
                        <p class="mb-0 mt-4 text-center">{{$product->number}}</p>
                    </td>
                    <td>
                        <p class="mb-0 mt-4 text-center">{{$product->price}} ₽</p>
                    </td>
                    <td>
                        <p class="mb-0 mt-4 text-center">{{$product->amount}}</p>
                    </td>
                    <td>
                        <p class="mb-0 mt-4 text-center">{{$product->total}} ₽</p>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
