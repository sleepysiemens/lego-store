@extends('layouts.wrapper')
@section('shop')
    active
@endsection

@section('content')

    @include('pages.shop.blocks.welcome')
    <livewire:Catalogue :filter="$filter" lazy/>

@endsection

@section('scripts')
    <script>
        $('.page-link').on('click', function (){
            //location.reload();
            console.log('test');
        });
    </script>
@endsection
