@extends('layouts.computech')

@section('title', 'Asus')

@section('category')
    @include('pages.product-asus')
@endsection

@section('product.fillter.category')
    @yield('category')
@endsection