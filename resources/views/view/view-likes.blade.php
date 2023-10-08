@extends('layouts.computech')

@section('title', 'Sản phẩm yêu thích ')

@section('like-product')
    @include('pages.likes')
@endsection

@section('like')
    @yield('like-product')
@endsection