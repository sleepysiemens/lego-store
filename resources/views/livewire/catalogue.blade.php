<div class="container-fluid fruite py-5">
    <div class="container py-5">
            <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="Поиск" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-xl-3">
                        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                            <label for="sort">{{__('Сортировка:')}}</label>
                            <select wire:change="sorting($event.target.value)" id="sort" name="sort" class="border-0 form-select-sm bg-light me-3">
                                <option value="default">{{__('По умолчанию')}}</option>
                                <option value="price_low_to_high">{{__('Сначала дешевле')}}</option>
                                <option value="price_high_to_low">{{__('Сначала дороже')}}</option>
                                <option value="is_available">{{__('По наличию')}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <form class="col-lg-3" method="get" action="">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>{{__('Категории')}}</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        @foreach($categories as $category)
                                            <li>
                                                <div class="d-flex fruite-name">
                                                    <input type="checkbox" name="category[{{$category->id}}]" value="{{$category->id}}" id="category_{{$category->id}}" @if(isset($filter['category'][$category->id])) checked @endif>
                                                    <label for="category_{{$category->id}}" class="ms-2">
                                                        <a class="text-primary" style="cursor: pointer"></i>{{$category->title_ru}}</a>
                                                        <span>({{$amount[$category->id]}})</span>
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            {{--<div class="col-lg-12">
                                <div class="mb-3">
                                    <h4 class="mb-2">{{__('Цена до')}}</h4>
                                    <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500" value="500" oninput="amount.value=rangeInput.value">
                                    <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">500</output>
                                </div>
                            </div>--}}
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>{{__('Цвет')}}</h4>
                                    @foreach($colors as $color)
                                        @if($color->title!='Unset')
                                            <div class="mb-2 d-flex">
                                                <input type="checkbox" class="me-2" id="Categories-{{$color->bl_num}}" name="color[{{$color->bl_num}}]" value="{{$color->bl_num}}" @if(isset($filter['color'][$color->bl_num])) checked @endif>
                                                <label for="Categories-{{$color->bl_num}}">{{$color->title}} </label>
                                                <div style="width: 15px; height: 15px; background-color: {{$color->hex}}" class="border my-auto ms-1"></div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-outline-primary">применить</button>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <a href="{{route('shop.index')}}" class="text-primary my-auto">сбросить</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-9">
                        <div class="row g-4">
                            @foreach($products as $product)
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item overflow-hidden border-secondary border d-block">
                                        <a href="{{route('shop.show',$product->number)}}" class="fruite-img d-flex py-3" style="height: 200px;">
                                            @if($product->bl_color!=1000)
                                                <img src="https://img.bricklink.com/ItemImage/PN/{{$product->bl_color}}/{{$product->bricklink_number}}.png" class="img-fluid h-100 rounded-top m-auto" style="object-fit: contain !important;" alt="">
                                            @else
                                                <img src="https://img.bricklink.com/ItemImage/ON/0/{{$product->bricklink_number}}.png" class="img-fluid h-100 rounded-top m-auto" style="object-fit: contain !important;" alt="">
                                            @endif
                                        </a>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$product->category_title_ru}}</div>
                                        <div class="p-4 rounded-bottom border-top border-secondary">
                                            <a href="{{route('shop.show',$product->number)}}">
                                                <h4 style="height: 60px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{$product->title}}</h4>
                                                <p class="mb-1 text-muted">Арт: {{$product->number}}</p>
                                                @if($product->bl_color!=1000)
                                                    <p class="mb-1 text-muted">Цвет: {{$product->color}}</p>
                                                @else
                                                    <p class="mb-1 text-muted">Цвет: Не установлено</p>
                                                @endif
                                                <p class="mt-0 text-muted">В наличии: {{$product->amount}}</p>
                                            </a>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">{{$product->price}} ₽</p>
                                                <livewire:AddToCart :product="$product"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12">
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
