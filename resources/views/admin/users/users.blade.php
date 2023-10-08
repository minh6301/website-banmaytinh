@extends('admin.dashboard.trangchu')

@section('title', 'Users')

@section('users')
    <div class="main">
        <div class="main__header">
            <div>
                <h1>@yield('title')</h1>
            </div>
            <div class="main__header_right">
                <div>
                    {!! Form::open(['url' => route('search.user'), 'method' => 'post']) !!}
                        {!! Form::search('search','', ['class' => 'search__input','placeholder' => 'Search']) !!}
                        {!! Form::button('<i class="fa-solid fa-magnifying-glass"></i>', ['type'=> 'submit','class' => 'button__search']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="main__header_add">
                    <a href="{{ route('add.user') }}">Thêm</a>
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
                    <th scope="col">User ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role )
                        <tr>
                            <th style="text-align: left">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td>{{$role->email}}</td>
                            <td>{{$role->role->name}}</td>
                            <td></td>
                            <td class="manager">
                                <a href="{{ route('form.update',$role->id) }}">
                                    <span class="fa-icon update">Edit</span>
                                </a>
                                
                                {!! Form::open([ 'url' => route('delete.user',['id'=>$role->id]) ]) !!}
                                @csrf
                                    <button type="submit">
                                        <span class="fa-icon trash">Delete</span>
                                    </button>

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
        {{-- {!! $roles->links() !!} --}}
    </div>
    
@endsection