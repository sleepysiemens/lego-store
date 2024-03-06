@extends('layouts.admin')

@section('main')
    active
@endsection

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Статистика</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Статистика</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('admin.pages.main.blocks.short_stat')
                @include('admin.pages.main.blocks.month_report')

                <div class="row">
                        @include('admin.pages.main.blocks.latest_orders')

                    <div class="col-md-4">
                        @include('admin.pages.main.blocks.info_boxes')
                        @include('admin.pages.main.blocks.latest_products')
                    </div>
                </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
@endsection
