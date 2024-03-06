@extends('layouts.wrapper')
@section('main')
    active
@endsection

@section('content')

    @include('pages.main.blocks.hero')
    @include('pages.main.blocks.features')
    <livewire:MainProducts />
    {{--@include('pages.main.blocks.sales')--}}
    {{--@include('pages.main.blocks.popular')--}}
    @include('pages.main.blocks.banner')
    @include('pages.main.blocks.fact')
    @include('pages.main.blocks.reviews')

@endsection
