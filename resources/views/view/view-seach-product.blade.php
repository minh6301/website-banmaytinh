@extends('layouts.computech')

@section('title', $searchProduct)

@section('laptop-search')
        @include('pages.search-product')
@endsection

@section('search-product')
    @yield('laptop-search')
@endsection