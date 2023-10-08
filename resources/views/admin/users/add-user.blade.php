@extends('admin.dashboard.trangchu')

@section('title', 'Thêm user')

@section('add.user')
<div class="main">
    <div class="main__header">
        <div style="display: flex">
            <a href="{{ route('users') }}" 
            style="background: none; color:#000000; margin-right: 20px; padding: 5px 0">
            <i class="fa-solid fa-chevron-left"></i></a>
            <h1>@yield('title')</h1>
        </div>
    </div>
    <div class="main__table main__form">
        {!! Form::open(['url' => 'admin/users/store', 'method'=> 'post']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Tên đăng nhập') !!} <br>
                {!! Form::text('name','', ['placeholder' => 'Tên đăng nhập']) !!}
                @error('name')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!} <br>
                {!! Form::text('email','', ['placeholder' => 'Email']) !!}
                @error('email')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Mật khẩu') !!} <br>
                {!! Form::password('password', ['placeholder' => 'Password']) !!}
                @error('password')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('confirm_password', 'Xác nhận mật khẩu') !!} <br>
                {!! Form::password('confirm_password', ['placeholder' => 'Confirm_password']) !!}
                @error('confirm_password')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('role_id', 'Chức năng') !!} <br>
                {!! Form::select('role_id',$roles) !!}
            </div>
            
            <div class="form-group">
                {!! Form::submit('Thêm', ['class' => 'submit']) !!}
            </div>
        {!! Form::close() !!}

        
    </div>
</div>
@endsection