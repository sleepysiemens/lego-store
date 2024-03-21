<h1 class="fw-bold mb-0">{{__('С этим часто покупают')}}</h1>
<div class="vesitable">
    <div class="owl-carousel vegetable-carousel justify-content-center">
        @foreach($related_products as $related_product)
            <div class="border border-primary rounded position-relative vesitable-item">
                <a class="vesitable-img d-flex" style="height: 300px;" href="{{route('shop.show',$related_product->number)}}">
                    <img src="https://img.bricklink.com/ItemImage/PN/{{$related_product->bl_color}}/{{$related_product->bricklink_number}}.png" class="img-fluid h-75 rounded-top m-auto" style="object-fit: contain" alt="">
                </a>
                <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">{{$related_product->category_title_ru}}</div>
                <div class="p-4 rounded-bottom border-top border-secondary">
                    <a href="{{route('shop.show',$related_product->number)}}">
                        <h4 style="height: 60px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{$related_product->title}}</h4>
                        <p class="mb-3 text-muted">Арт: {{$related_product->number}}</p>
                    </a>
                    <div class="d-flex justify-content-between flex-lg-wrap">
                        <p class="text-dark fs-5 fw-bold mb-0">{{$related_product->price}} ₽</p>
                        <livewire:AddToCart :product="$product"/>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
