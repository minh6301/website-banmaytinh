@extends('layouts.computech')

@section('title', 'Msi')

@section('category')
    @include('pages.product-msi')
@endsection

@section('product.fillter.category')
    @yield('category')
@endsection