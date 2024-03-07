<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-primary">{{__('Напишите нам!')}}</h1>
                        <p class="mb-4">{{__('Мы с вами свяжемся')}}</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    {{--<div class="h-100 rounded">
                        <iframe class="rounded w-100"
                                style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>--}}
                </div>
                <div class="col-lg-7">
                    <form action="" class="">
                        <input name="name" type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Имя" required>
                        <input name="email" type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Email" required>
                        <textarea name="message" class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Ваше сообщение" required></textarea>
                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">{{__('Отправить')}}</button>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4 my-auto"></i>
                        <div>
                            <h4>{{__('Адрес')}}</h4>
                            <p class="mb-2">{{__('г. Новосибирск')}}</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-envelope fa-2x text-primary me-4 my-auto"></i>
                        <div>
                            <h4>{{__('Email')}}</h4>
                            <p class="mb-2">info@example.com</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded bg-white">
                        <i class="fab fa-telegram-plane fa-2x text-primary me-4 my-auto"></i>
                        <div>
                            <h4>{{__('Telegram')}}</h4>
                            <p class="mb-2">(+012) 3456 7890</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
