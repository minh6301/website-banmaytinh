<div class="main">
    <div class="main__href">
        <i class="fa-solid fa-house"></i> <a href="{{ route('layouts.computech') }}">Trang chủ</a> <i class="fa-solid fa-angle-right"></i> <a href="{{ route('layouts.laptopwindow') }}">Laptop</a> <i class="fa-solid fa-angle-right"></i> @yield('title')
    </div>

    <div class="main__products">
        <div class="main__products_show">
            <div class="main__products_fill">
                <span>Sắp xếp theo</span>
                <div class="main__products_fill_item fill-item">
                    <div>
                        {!! Form::open(['url' => route('sortAsc.laptop'), 'method' => 'post']) !!}
                        @csrf
                            {!! Form::button('<i class="fa-solid fa-arrow-up-wide-short"></i>Giá tăng dần', ['type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div>
                        {!! Form::open(['url' => route('sortDesc.laptop'), 'method' => 'post']) !!}
                            {!! Form::button('<i class="fa-solid fa-arrow-down-wide-short"></i>Giá giảm dần', ['type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="home__products_news-show products__show">
                {{-- view product --}}
                    @foreach ($product as $products)
                        @if ($products->name === 'MSI')
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
                            
                        @endif
                    @endforeach
            </div>
        </div>

    </div>


    <div class="view-more">
        <span>
            {{-- {!! $product->links() !!} --}}
            {{-- {{ $product->links() }} --}}
        </span>
    </div>


</div>