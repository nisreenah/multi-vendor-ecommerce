@extends('store.master')

@section('header')
    @include('store.includes.header')
@endsection

@section('content')
    @include('store.includes.slider')

    @include('store.includes.featured-categories')

    @include('store.includes.new-products')

    @include('store.includes.featured-products')

    @include('store.includes.deals')

    @include('store.includes.vendors')
@endsection

@section('footer')
    @include('store.includes.footer')
@endsection
