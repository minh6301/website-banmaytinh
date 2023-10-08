<div class="main__cart">
    <div class="main__cart_header">
        <a href="{{ route('layouts.computech') }}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <strong>Giỏ hàng của bạn</strong>
    </div><br>
    @if (Auth::check())
        {{-- <div class="selectAll" >
            <input type="checkbox" name="select__all" id="selectAll">
            <label for="selectAll" id="selectAll">Chọn tất cả</label>
        </div> --}}
        <div class="main__cart_product" id="itemForm">
        @php
            $total = 0;
        @endphp
        @foreach ($cart as $carts)
            @if ($carts->user_id == Auth::user()->id)
                <div class="main__cart_product-item" >
                        {{-- <div>
                            <input type="checkbox" name="checked_item" id="checked_item" value="{{$carts->product->price}}">
                            <input type="hidden" name="" id="checked_item" class="result" value="{{$carts->product_id}}">
                        </div> --}}
                        <div>
                            <img src="{{url($carts->product->file)}}" alt="" srcset="">
                        </div>
                        <div class="main__cart_product-item-detail">
                            <div class="main__cart_product-item-up">
                                <div>
                                    <span id="product">{{$carts->product->tensanpham}}</span>
                                </div>
                                <div>
                                    {!! Form::open(['url' => route('deleteProductCart',$carts->id)]) !!}
                                    @csrf
                                        {!! Form::button('<i class="fa-solid fa-trash-can"></i>',['type' => 'submit']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="main__cart_product-item-down">
                                <div>
                                    <span id="price">{{number_format($carts->product->price)}}</span> <span>đ</span>
                                </div>
                                <div class="quantity">
                                    <button class="btn btn-default btn-subtract" type="button">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <input type="text" name="quantity" id="quantity" value="1" readonly min="1">
                                    <button class="btn btn-default btn-add" type="button">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tổng tiền --}}
                    @php
                        $total += $carts->product->price;
                    @endphp
                @endif

            @endforeach

            @if ($carts->user_id == Auth::user()->id)
                    
            @elseif ($carts->user_id != Auth::user()->id)
                @include('pages.emptyCart')
            @endif
        </div>  

        @if(Auth::check())
            @if ($carts->user_id == Auth::user()->id)
                <div class="main__buy">
                    <div>
                        {{-- <span class="result"></span> --}}
                        <span>
                            Tổng tiền : <span id="total">{{ number_format($total) }}</span> đ
                        </span>
                    </div>
                    <div>
                        {!! Form::open(
                            ['url' => route('payment'), 'method'=> 'get']
                            ) !!}
                            @csrf
                            <input type="hidden" name="totalPrice" id="total" >
                            {!! Form::button('Mua', [
                                'type'=> 'submit',
                                'id' => 'submit',
                                'onclick' => 'setData()']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                
            @else

            @endif
        @else

        @endif
    @else
        @include('pages.emptyCartNotLogin')
    @endif
    
</div>