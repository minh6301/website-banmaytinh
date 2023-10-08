@extends('admin.dashboard.trangchu')

@section('title', 'Update category')

@section('update.category')
<div class="main">
    <div class="main__header">
        <div style="display: flex">
            <a href="{{ route('category') }}" 
            style="background: none; color:#000000; margin-right: 20px; padding: 5px 0">
            <i class="fa-solid fa-chevron-left"></i></a>
            <h1>@yield('title')</h1>
        </div>
    </div>
    <div class="main__table main__form">
        {{-- <div>
            <img src="{{url($category->thumbnail)}}" alt="" >
        </div> --}}
        {!! Form::open(['url' => route('update.category',['id'=>$category->id]), 'method'=> 'post','files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Tên nhãn hàng') !!} <br>
                {!! Form::text('name',$category->name, ['placeholder' => 'Tên nhãn hàng']) !!}
                @error('name')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('file', 'Chọn ảnh') !!} <br>
                {!! Form::file('file', ['class' => 'form-control form-file']) !!}
                @error('file')
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