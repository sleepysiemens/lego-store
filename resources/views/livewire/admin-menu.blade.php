<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    {{--<div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Поиск" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>--}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header text-uppercase">основное</li>

            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('admin.main.index')}}" class="nav-link @yield('main')">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Статистика</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.orders.index')}}" class="nav-link @yield('orders')">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Заказы
                        <span class="badge badge-info right">{{$new_orders_cnt}}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-users"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
            </li>
            <li class="nav-header text-uppercase" style="border-top: 1px solid #4f5962">редактирование</li>
            <li class="nav-item @yield('products')">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Товары
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.products.index','all')}}" class="nav-link @yield('all')">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Все</p>
                        </a>
                    </li>
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a href="{{route('admin.products.index',$category->url)}}" class="nav-link @yield($category->url)">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{$category->title_ru}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('logout.get')}}" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>
                        Выйти
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>

