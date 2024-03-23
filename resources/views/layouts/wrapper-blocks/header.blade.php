<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">г. Новосибирск</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">{{env('MAIL_FROM_ADDRESS')}}</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Политика конфиденциальности</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Доставка и оплата</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{route('main.index')}}" class="navbar-brand"><h1 class="text-primary display-6">{{env('APP_NAME')}}</h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav me-auto ms-5">
                    <a href="{{route('main.index')}}" class="nav-item nav-link @yield('main')">{{__('Главная')}}</a>
                    <a href="{{route('shop.index')}}" class="nav-item nav-link @yield('shop')">{{__('Каталог')}}</a>
                    <a href="{{route('contact.index')}}" class="nav-item nav-link @yield('contact')">{{__('Контакты')}}</a>
                </div>
                <div class="d-flex m-3 me-0 position-relative">
                    <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                    <livewire:HeaderCart/>
                    @if(auth()->user()!=null)
                        <a href="{{route('profile.index')}}" class="my-auto @yield('profile')">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    @else
                        <a href="{{route('login')}}" class="my-auto">
                            <i class="fas fa-sign-in-alt fa-2x"></i>
                        </a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->


<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->
