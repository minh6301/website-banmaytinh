@extends('admin.dashboard.trangchu')

@section('title', 'Sửa màu sản phẩm')

@section('update.color')
<div class="main">
    <div class="main__header">
        <div style="display: flex">
            <a href="{{ route('color') }}" 
            style="background: none; color:#000000; margin-right: 20px; padding: 5px 0">
            <i class="fa-solid fa-chevron-left"></i></a>
            <h1>@yield('title')</h1>
        </div>
    </div>
    <div class="main__table main__form">
        {!! Form::open(['url' => route('update.color',['id'=>$color->id]),'method'=> 'post','files' => true]) !!}
        <div class="form-group">
            {!! Form::label('tensanpham', 'Tên sản phẩm') !!} <br>
            {!! Form::text('tensanpham',$color->tensanpham, ['class' => 'form-control form-file', 'placeholder' => 'Nhập tên sản phẩm']) !!}
        </div>
            <div class="form-group">
                {!! Form::label('name', 'Màu sản phẩm') !!} <br>
                {!! Form::text('name',$color->name, ['class' => 'form-control form-file', 'placeholder' => 'Nhập màu sản phẩm']) !!}
                @error('color')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Giá sản phẩm') !!} <br>
                {!! Form::text('price',$color->price, ['class' => 'form-control form-file','placeholder' => 'Nhập giá sản phẩm']) !!}
                @error('color')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            
            
            <div class="form-group">
                {!! Form::submit('Thêm', ['class' => 'submit']) !!}
            </div>
        {!! Form::close() !!}

        
    </div>
</div>
@endsection