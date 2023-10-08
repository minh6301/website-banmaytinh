@extends('layouts.computech')

@section('title', 'Macbook')

@section('category')
    @include('pages.product-macbook')
@endsection

@section('product.fillter.category')
    @yield('category')
@endsection