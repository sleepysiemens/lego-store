@extends('layouts.wrapper')

@section('profile') text-warning @endsection

@section('content')
    @include('pages.order.blocks.welcome')
    @include('pages.order.blocks.cart')
    @include('pages.order.blocks.delivery')
@endsection
