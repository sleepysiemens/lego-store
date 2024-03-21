@extends('layouts.wrapper')
@section('shop')
    active
@endsection

@section('content')

    @include('pages.shop.blocks.welcome')
    <livewire:Catalogue :filter="$filter" lazy/>

@endsection
