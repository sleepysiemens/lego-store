@extends('layouts.wrapper')

@section('cart') text-warning @endsection

@section('cart-circle') ;background-color: #81c408 !important; @endsection

@section('content')
    @include('pages.checkout.blocks.welcome')
    @include('pages.checkout.blocks.checkout')
@endsection
