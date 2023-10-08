@extends('layouts.computech')

@section('title', 'Acer')

@section('category')
    @include('pages.product-acer')
@endsection

@section('product.fillter.category')
    @yield('category')
@endsection