@extends('admin.dashboard.trangchu')

@section('title', 'Roles')

@section('users')
    <div class="main">
        <div class="main__header">
            <div>
                <h1>@yield('title')</h1>
            </div>
            <div>
                <a href="{{ route('add.roles') }}">Thêm</a>
            </div>
        </div>
        <div class="main__table">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Role ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role )
                        <tr>
                            <th style="text-align: left">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td class="manager">
                                <a href="">
                                    <i class="fa-regular fa-pen-to-square fa-icon update"></i>
                                </a>
                                {!! Form::open([ 'url' => route('delete.roles',['id'=>$role->id]) ]) !!}
                                @csrf
                                    <button type="submit">
                                        <i class="fa-regular fa-trash-can fa-icon trash"></i>
                                    </button>

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{$roles->links()}}
        
            </table>
        </div>
    </div>
    
@endsection