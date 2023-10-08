<div class="main">
    <div class="main__href">
        <i class="fa-solid fa-house"></i> <a href="{{ route('layouts.computech') }}">Trang chủ</a> <i class="fa-solid fa-angle-right"></i> Kết quả tìm kiếm cho : '@yield('title')'
    </div>

    <div class="main__products">

        @if ($searchProduct == '')
            <div style="text-align:center; font-size:15px; color: #4d4d4d; padding: 10px 0px;">
                <p>Tìm thấy 0 sản phẩm cho từ khoá '@yield('title')'</p>
            </div>
        @else
            <div style="text-align:center; font-size:15px; color: #4d4d4d; padding: 10px 0px;">
                <p>Tìm thấy <strong style="color: black">{{ $countProduct }}</strong> sản phẩm cho từ khoá '@yield('title')'</p>
            </div>
            
        @endif

        <div class="main__products_show">
            <div class="main__products_fill">
                <span>Sắp xếp theo</span>
                <div class="main__products_fill_item fill-item">
                    <div>
                        {!! Form::open(['url' => route('sortAsc.search'), 'method' => 'post']) !!}
                            {!! Form::button('<i class="fa-solid fa-arrow-up-wide-short"></i>Giá tăng dần', ['type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div>
                        {!! Form::open(['url' => route('sortDesc.search'), 'method' => 'post']) !!}
                            {!! Form::button('<i class="fa-solid fa-arrow-down-wide-short"></i>Giá giảm dần', ['type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="home__products_news-show products__show">
                {{-- view product --}}
                @if ($searchProduct == '')
                    
                @else
                    @foreach ($product as $products)
                            <div class="home__products_news-show-items">
                                <div>
                                    <a href="{{route('detail', $products->id)}}">
                                        <img src="{{url($products->file)}}" alt="" srcset="">
                                        <div class="home__products_news-show-items--details">
                                            <strong>{{$products->tensanpham}}
                                            </strong>
                                            <span>{{number_format($products->price)}}đ</span>
                                        </div>
                                    </a>
                                </div>
                                <div >
                                    <div class="btn-add-cart">
                                        {!! Form::open(['url' => route('addToCart') ]) !!}
                                            {!! Form::hidden('product_id', $products->id) !!}
                                            {!! Form::hidden('quantity', '1') !!}
                                            <button type="submit"><i class="fa-solid fa-cart-shopping"></i>
                                                Thêm vào giỏ
                                            </button>
                                        {!! Form::close() !!}
                                    </div>
                                    @include('pages.like')
                                </div>
                            </div>
                    @endforeach    
                @endif
                
            </div>
        </div>

    </div>




</div>