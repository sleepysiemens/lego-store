
<div class="row g-4 mb-5">
    <div class="col-12">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="border rounded h-100 d-flex">
                    <img src="https://img.bricklink.com/ItemImage/PN/{{$product->bl_color}}/{{$product->bricklink_number}}.png" class="rounded h-75 m-auto" alt="Image">
                </div>
            </div>
            <div class="col-lg-6">
                <h4 class="fw-bold mb-3">{{$product->title}}</h4>
                <p class="mb-3">{{__('Категория')}}: {{$product->category_title_ru}}</p>
                <h5 class="fw-bold mb-3">{{$product->price}} ₽</h5>
                <p class="mb-1">Артикул: {{$product->number}}</p>
                <p class="mb-1">Артикул BL: {{$product->bricklink_number}}</p>
                <p class="mb-1">В наличии: {{$product->amount}}</p>
                <div class="input-group quantity mb-5" style="width: 100px;">
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <button href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> {{__('В корзину')}}</button>
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
                                            <p class="mb-0">{{$product->weight}} {{__('г')}}</p>
                                        </div>
                                    </div>
                                    <div class="row text-center align-items-center justify-content-center py-2">
                                        <div class="col-6">
                                            <p class="mb-0">{{__('Цвет')}}</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">{{$product->color}}</p>
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
