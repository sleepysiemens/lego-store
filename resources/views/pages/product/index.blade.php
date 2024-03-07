@extends('layouts.wrapper')

@section('shop')
    active
@endsection

@section('content')
    @include('pages.product.blocks.welcome')
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            {{----}}
            @include('pages.product.blocks.product')
            @include('pages.product.blocks.related_products')
            {{----}}
        </div>
    </div>
@endsection
