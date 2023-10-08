@extends('layouts.computech')

@section('title', 'Hp')

@section('category')
    @include('pages.product-hp')
@endsection

@section('product.fillter.category')
    @yield('category')
@endsection