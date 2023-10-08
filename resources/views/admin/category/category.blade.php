@extends('admin.dashboard.trangchu')

@section('title', 'Category')

@section('category')
    <div class="main">
        <div class="main__header">
            <div>
                <h1>@yield('title')</h1>
            </div>
            <div class="main__header_right">
                <div>
                    {!! Form::open() !!}
                        {!! Form::text('search','', ['class' => 'search__input','placeholder' => 'Search']) !!}
                        {!! Form::button('<i class="fa-solid fa-magnifying-glass"></i>', ['class' => 'button__search']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="main__header_add">
                    <a href="{{ route('add.category') }}">Thêm</a>
                </div>
            </div>
        </div>
        <div class="main__table">
            <div class="status">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                
                @elseif (session('status-fail'))
                    <div class="alert alert-fail">
                        {{ session('status-fail') }}
                    </div>
                @endif
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )
                        <tr>
                            <th style="text-align: left">{{$category->id}}</th>
                            <td><img src="{{url($category->thumbnail)}}" alt="" ></td>
                            <td>{{$category->name}}</td>
                            <td class="manager">
                                <a href="{{ route('update.category',$category->id) }}">
                                    <i class="fa-regular fa-pen-to-square fa-icon update"></i>
                                </a>
                                
                                {!! Form::open([ 'url' => route('delete.category',['id'=>$category->id]) ]) !!}
                                @csrf
                                    <button type="submit">
                                        <i class="fa-regular fa-trash-can fa-icon trash"></i>
                                    </button>

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
        {{$categories->links()}}
    </div>
    
@endsection