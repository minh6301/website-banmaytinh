@extends('admin.dashboard.trangchu')

@section('title', 'Thêm quyền truy cập')

@section('add.roles')
<div class="main">
    <div class="main__header">
        <div style="display: flex">
            <a href="{{ route('roles') }}" 
            style="background: none; color:#000000; margin-right: 20px; padding: 5px 0">
            <i class="fa-solid fa-chevron-left"></i></a>
            <h1>@yield('title')</h1>
        </div>
    </div>
    <div class="main__table main__form">
        {!! Form::open(['url' => 'admin/roles/create']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Quyền truy cập') !!} <br>
                {!! Form::text('name','', ['placeholder' => 'Quyền truy cập']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::submit('Thêm', ['class' => 'submit']) !!}
            </div>
        {!! Form::close() !!}

        
    </div>
</div>
@endsection