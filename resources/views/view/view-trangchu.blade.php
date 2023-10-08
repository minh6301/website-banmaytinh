@extends('layouts.computech')

@section('title', 'Computech')
@section('trangchu')
    @include('pages.trangchu')
@endsection

@section('computech')
    @yield('trangchu')
@endsection