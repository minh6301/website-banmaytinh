@extends('admin.dashboard.trangchu')

@section('title', 'Thêm sản phẩm')

@section('add.products')
<div class="main">
    <div class="main__header">
        <div style="display: flex">
            <a href="{{ route('products') }}" 
            style="background: none; color:#000000; margin-right: 20px; padding: 5px 0">
            <i class="fa-solid fa-chevron-left"></i></a>
            <h1>@yield('title')</h1>
        </div>
        
    </div>
    <div class="main__form">
        {!! Form::open(['url' => route('add.products'), 'method' => 'post','files' => true]) !!}
            <div class="form-group">
                {!! Form::label('search', 'Sản phẩm') !!} <br>
                {!! Form::text('tensanpham', '', ['placeholder' => 'Sản phẩm']) !!}
                {{-- {!! Form::text('search','', ['onkeyup' => 'filterProduct()','id' => 'searchProduct','placeholder' => 'Sản phẩm']) !!} <br>
                <select name="color_id" id="selectProduct" size="5">
                    @foreach ($product as $products )
                        <option value="{{$products->id}}">{{$products->tensanpham}}</option>
                    @endforeach
                </select> --}}
                @error('name')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('search', 'Hãng') !!} <br>
                {!! Form::text('search','', ['onkeyup' => 'filter()','id' => 'search','placeholder' => 'Hãng']) !!} <br>
                <select name="category_id" id="select" size="5">
                    @foreach ($categorys as $category )
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('name')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            
            
            <div class="form-group">
                {!! Form::label('dacdiemnoibat', 'Đặc điểm nổi bật') !!} <br>
                {!! Form::textarea('dacdiemnoibat','', ['placeholder' => 'Đặc điểm nổi bật']) !!}
                @error('name')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('thongsokythuat', 'Thông số kỹ thuật') !!} <br>
                {!! Form::textarea('thongsokythuat','', ['placeholder' => 'Thông số kỹ thuật']) !!}
                @error('name')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('color', 'Màu') !!} <br>
                {!! Form::text('color','', ['placeholder' => 'Màu']) !!}
                @error('name')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Giá') !!} <br>
                {!! Form::text('price','', ['placeholder' => 'Giá']) !!}
                @error('name')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="input-group control-group increment">
                    {!! Form::label('', 'File ảnh sản phẩm') !!} <br>
                <div class="add__file">
                    <div class="form-group">
                        {!! Form::file('file[]', ['class' => 'form-control form-file']) !!}
                    </div>
                    <div class="input-group-btn"> 
                        {!! Form::button('<i class="glyphicon glyphicon-plus"></i>Add', ['class'=>"btn btn-success add"]) !!}
                    </div>
                </div>
            </div>

            <div class="clone hide ">
                <div class="control-group input-group add__file" style="margin-top:10px">
                    <div class="form-group">
                        {!! Form::file('file[]', ['class' => 'form-control form-file']) !!}
                    </div>
                    <div class="input-group-btn"> 
                        {!! Form::button('<i class="glyphicon glyphicon-remove"></i> Remove', ['class'=>"btn btn-danger remove"]) !!}
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                {!! Form::submit('Thêm', ['class' => 'submit']) !!}
            </div>
        {!! Form::close() !!}

        
    </div>
</div>
@endsection