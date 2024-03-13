@extends('layouts.wrapper')

@section('profile') text-warning @endsection

@section('content')
    @include('pages.profile.blocks.welcome')
    @include('pages.profile.blocks.profile')
@endsection
