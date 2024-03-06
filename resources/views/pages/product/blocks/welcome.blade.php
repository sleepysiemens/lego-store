<div class="container-fluid page-header py-5" style="background: linear-gradient(rgba(248, 223, 173, 0.1), rgba(248, 223, 173, 0.1)), url({{asset('/img/hero-bg.jpg')}});">
    <h1 class="text-center text-black display-6">Shop Detail</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('main.index')}}">{{__('Главная')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('shop.index')}}">{{__('Каталог')}}</a></li>
        <li class="breadcrumb-item active text-black">{{$product->title}}</li>
    </ol>
</div>
