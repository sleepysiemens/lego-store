@extends('layouts.admin')

@section('products')
    menu-is-opening menu-open
@endsection

@section('content')
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Новый товар</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('admin.products.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12 col-lg-4">
                                        <label>Категория</label>
                                        <select name="category_id" class="form-control select2" style="width: 100%;">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->title_ru}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-lg-4">
                                        <label for="exampleInputEmail1">Название</label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-4">
                                        <label>Цвет</label>
                                        <select name="color_id" class="form-control select2" style="width: 100%;">
                                            @foreach($colors as $color)
                                                <option value="{{$color->id}}">{{$color->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12 col-lg-4">
                                        <label for="exampleInputEmail1">Артикул</label>
                                        <input type="text" name="number" class="form-control" id="exampleInputEmail1" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-4">
                                        <label for="exampleInputEmail1">Артикул Brick Link</label>
                                        <input type="text" name="bricklink_number" class="form-control" id="exampleInputEmail1" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-4">
                                        <label for="exampleInputEmail1">Другие номера (через / )</label>
                                        <input type="text" name="other_numbers" class="form-control" id="exampleInputEmail1" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12 col-lg-4">
                                        <label for="exampleInputEmail1">Цена</label>
                                        <input type="number" name="price" class="form-control" id="exampleInputEmail1" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-4">
                                        <label for="exampleInputEmail1">Количество</label>
                                        <input type="number" name="amount" class="form-control" id="exampleInputEmail1" required>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" name="is_available" class="form-check-input" id="exampleCheck1" value="1">
                                    <label class="form-check-label" for="exampleCheck1">В наличии</label>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
