@extends('layouts.computech')

@section('title', 'Dell')

@section('category')
    @include('pages.product-dell')
@endsection

@section('product.fillter.category')
    @yield('category')
@endsection