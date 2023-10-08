@extends('admin.dashboard.trangchu')

@section('title', 'Sản phẩm')


@section('products')
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
                    <a href="{{ route('formAdd.products') }}">Thêm</a>
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
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Màu</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($product as $products)
                    <tr>
                        <th style="text-align: left">{{ $products->id }}</th>
                        <td><img src="{{url($products->file)}}" alt="" srcset=""></td>
                        <td>{{ $products->tensanpham }}</td>
                        <td>{{ $products->color }}</td>
                        <td>{{ number_format($products->price) }} đ</td>
                        <td class="manager">
                            <a href="{{route('updateForm.products', $products->id)}}">
                                <i class="fa-regular fa-pen-to-square fa-icon update"></i>
                            </a>
                            {!! Form::open([ 'url' => route('delete.products',['id'=>$products->id]) ]) !!}
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
        <div class="view-more">
            <span>
                {{-- {!! $product->links() !!} --}}
                {{ $product->links() }}
            </span>
        </div>
    </div>
@endsection