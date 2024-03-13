<div class="container pb-5">
    <div class="row g-4 justify-content-between mt-3">
        <div class="col-6">
            <h1 class="display-6">{{__('Доставка')}}</h1>
            <div class="row mt-5 mb-4">
                <div class="col-md-12 col-lg-6">
                    <div class="form-item w-100">
                        <input type="text" name="name" @if(auth()->user()!=null) value="{{auth()->user()->name}}" readonly @endif class="form-control" required placeholder="{{__('Имя')}}">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-item w-100">
                        <input type="text" name="surname" @if(auth()->user()!=null) value="{{auth()->user()->surname}}" readonly @endif class="form-control" required placeholder="{{__('Фамилия')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-item w-100">
                        <input type="email" name="email" @if(auth()->user()!=null) value="{{auth()->user()->email}}" readonly @endif class="form-control" required placeholder="{{__('Email')}}">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-item w-100">
                        <input type="tel" name="phone" @if(auth()->user()!=null) value="{{auth()->user()->phone}}" readonly @endif class="form-control" placeholder="{{__('Телефон')}}">
                    </div>
                </div>
            </div>
            <h5 class="mt-4">{{__('Тип доставки')}}</h5>

            <div class="card">
                <div class="card-body">
                    <livewire:DeliveryType/>
                </div>
            </div>
            <h5 class="mt-4">{{__('Информация о доставке')}}</h5>


        </div>

        <livewire:CartTotal/>
    </div>
</div>
