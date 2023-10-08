@extends('admin.dashboard.trangchu')

@section('title', 'Sửa user')

@section('add.user')
<div class="main">
    <div class="main__header">
        <div>
            <h1>@yield('title')</h1>
        </div>
    </div>
    <div class="main__table main__form">
        
        {!! Form::open(['url' => route('update.user',['id'=>$user->id])]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Tên đăng nhập') !!} <br>
                {!! Form::text('name',$user->name, ['placeholder' => 'Tên đăng nhập']) !!}
                @error('name')
                    <small class="form-text text-danger ">
                        {{$message}}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!} <br>
                {!! Form::text('email',$user->email, ['placeholder' => 'Email']) !!}
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
                {!! Form::submit('Sửa', ['class' => 'submit']) !!}
            </div>
        {!! Form::close() !!}
        
    </div>
</div>
@endsection