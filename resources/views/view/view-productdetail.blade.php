@extends('layouts.computech')

@section('title', $product->tensanpham)
@section('detail')
    @include('pages.details')
@endsection

@section('productdetail')
    @yield('detail')
@endsection