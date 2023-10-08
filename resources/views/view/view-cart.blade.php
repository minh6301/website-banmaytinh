@extends('layouts.computech')

@section('title', 'Giỏ hàng')

@section('gio-hang')
    @include('pages.cart')
@endsection

@section('cart')
    @yield('gio-hang')
@endsection