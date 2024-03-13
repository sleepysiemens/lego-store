@extends('layouts.wrapper')

@section('cart') text-warning @endsection

@section('cart-circle') ;background-color: #81c408 !important; @endsection

@section('content')
    @include('pages.cart.blocks.welcome')

    @if(!$is_empty)
        <form method="post" action="{{route('cart.check')}}" class="container-fluid py-5">
            @csrf
            <livewire:CartPage/>
            @include('pages.cart.blocks.delivery')
        </form>
    @else
        <p class="text-center py-5 mt-4 fs-3">{{__('Корзина пуста')}}</p>
    @endif

@endsection
