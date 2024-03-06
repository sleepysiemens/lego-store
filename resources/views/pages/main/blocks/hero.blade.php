<div class="container-fluid py-5 mb-5 hero-header" style="background: linear-gradient(rgba(248, 223, 173, 0.1), rgba(248, 223, 173, 0.1)), url({{asset('/img/hero-bg.jpg')}});">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <div class="row">
                    <h4 class="mb-3 text-secondary col-auto rounded-pill bg-white">Более 20.000 уникальных деталей Lego</h4>
                </div>
                <div class="row">
                    <h1 class="mb-5 display-3 text-primary col-auto" style="text-shadow: 0px 0px 15px #fff">Детали, минифигурки, наборы</h1>

                </div>
                {{----}}
                <div class="position-relative mx-auto z-1">
                    <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="Поиск">
                    <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;"><i class="fas fa-search me-2"></i>Найти</button>
                </div>
                {{----}}
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach($categories as $category)
                            <div class="carousel-item @if($category==$categories->first()) active @endif rounded">
                                <img src="{{asset('img/hero-img-1.png')}}" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">{{$category->title_ru}}</a>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
