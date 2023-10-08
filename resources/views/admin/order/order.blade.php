@extends('admin.dashboard.trangchu')

@section('title', 'Đơn hàng')

@section('order')
    <div class="main">
        <div class="main__header">
            <div>
                <h1>@yield('title')</h1>
            </div>
            <div class="main__header_right">
                <div>
                    {!! Form::open(['url' => route('search.color'), 'method' => 'post']) !!}
                        {!! Form::search('search','', ['class' => 'search__input','placeholder' => 'Search']) !!}
                        {!! Form::button('<i class="fa-solid fa-magnifying-glass"></i>', ['type'=> 'submit','class' => 'button__search']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="main__header_add">
                    {{-- <a href="{{ route('formAdd.color') }}">Thêm</a> --}}
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
            <table class="table table-order">
                <thead>
                <tr>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Hình thức TT</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($order as $orders )
                        <tr>
                            <td style="text-align: left">{{$orders->madonhang}}</td>
                            <td>{{$orders->fullname}}</td>
                            <td>{{($orders->phone)}}</td>
                            <td>{{$orders->product}}</td>
                            <td>{{ number_format($orders->totalprice) }} đ</td>
                            <td>
                                @if ($orders->payment_type == "1")
                                    Thanh toán khi nhận hàng
                                @elseif ($orders->payment_type == "2")
                                    Thanh toán VnPay
                                @endif
                            </td>
                            <td>{{$orders->status}}</td>
                            <td class="manager">
                                <a href="{{ route('formUpdate.color',$orders->id) }}">
                                    <i class="fa-regular fa-pen-to-square fa-icon update"></i>
                                </a>
                                
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
        {{-- {!! $color->links() !!} --}}
    </div>
    
@endsection