
<div class="row g-4 mb-5">
    <div class="col-12">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="border rounded h-100 d-flex">
                    @if($product->bl_color!=1000)
                        <img src="https://img.bricklink.com/ItemImage/PN/{{$product->bl_color}}/{{$product->bricklink_number}}.png" class="rounded h-75 m-auto" alt="Image">
                    @else
                        <img src="https://img.bricklink.com/ItemImage/ON/0/{{$product->bricklink_number}}.png" class="rounded h-75 m-auto" alt="Image">

                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <h4 class="fw-bold mb-3">{{$product->title}}</h4>
                <p class="mb-3">{{__('Категория')}}: {{$product->category_title_ru}}</p>
                <h5 class="fw-bold mb-3">{{$product->price}} ₽</h5>
                <p class="mb-1">Артикул: {{$product->number}}</p>
                <p class="mb-1">Артикул BL: {{$product->bricklink_number}}</p>
                <p class="mb-1">В наличии: {{$product->amount}}</p>

                <div class="row mt-4">
                    <livewire:AddToCart :product="$product"/>
                </div>
            </div>
            <div class="col-lg-12">
                <nav>
                    <div class="nav nav-tabs mb-3">
                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                aria-controls="nav-about" aria-selected="true">{{__('Детали')}}</button>
                    </div>
                </nav>
                <div class="tab-content mb-5">
                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        <div class="px-2">
                            <div class="row g-4">
                                <div class="col-6">
                                    <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                        <div class="col-6">
                                            <p class="mb-0">{{__('Вес')}}</p>
                                        </div>
                                        <div class="col-6">
                                            @if($product->weight!=null)
                                                <p class="mb-0">{{$product->weight}} {{__('г')}}</p>
                                            @else
                                                <p class="mb-0">? {{__('г')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row text-center align-items-center justify-content-center py-2">
                                        <div class="col-6">
                                            <p class="mb-0">{{__('Цвет')}}</p>
                                        </div>
                                        <div class="col-6">
                                            @if($product->bl_color!=1000)
                                                <p class="mb-0">{{$product->color}}</p>
                                            @else
                                                <p class="mb-0">Не установлено</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                        <div class="col-6">
                                            <p class="mb-0">{{__('Состояние')}}</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">5/5</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
