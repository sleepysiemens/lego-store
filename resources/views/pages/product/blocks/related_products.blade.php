<h1 class="fw-bold mb-0">{{__('С этим часто покупают')}}</h1>
<div class="vesitable">
    <div class="owl-carousel vegetable-carousel justify-content-center">
        @foreach($related_products as $related_product)
            <div class="border border-primary rounded position-relative vesitable-item">
                <div class="vesitable-img d-flex" style="height: 300px;">
                    <img src="https://img.bricklink.com/ItemImage/PN/{{$product->bl_color}}/{{$product->bricklink_number}}.png" class="img-fluid h-75 rounded-top m-auto" style="object-fit: contain" alt="">
                </div>
                <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">{{$related_product->category_title_ru}}</div>
                <div class="p-4 pb-0 rounded-bottom">
                    <h4>{{$related_product->title}}</h4>
                    <div class="">
                        <p class="mb-2">Артикул: {{$product->number}}</p>
                        <button href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> {{__('В корзину')}}</button>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
