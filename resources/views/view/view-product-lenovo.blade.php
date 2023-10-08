@extends('layouts.computech')

@section('title', 'Lenovo')

@section('category')
    @include('pages.product-lenovo')
@endsection

@section('product.fillter.category')
    @yield('category')
@endsection