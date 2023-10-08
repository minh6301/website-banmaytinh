<div class="main">
    <div class="main__href">
        <i class="fa-solid fa-house"></i> <a href="{{ route('layouts.computech') }}">Trang chủ</a> <i class="fa-solid fa-angle-right"></i> @yield('title')
    </div>

    <div class="main__products">
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
                @if (Auth::check())
                    @foreach ($likes as $like)
                        @if ($like->user_id == Auth::user()->id)
                        <div class="home__products_news-show-items">
                                
                                <div>
                                    <a href="{{route('detail', $like->product->id)}}">
                                        <img src="{{url($like->product->file)}}" alt="" srcset="">
                                        <div class="home__products_news-show-items--details">
                                            <strong>{{$like->product->tensanpham}}
                                            </strong>
                                            <span>{{number_format($like->product->price)}}đ</span>
                                        </div>
                                    </a>
                                </div>
                                <div >
                                    <div class="btn-add-cart">
                                        {!! Form::open(['url' => route('addToCart') ]) !!}
                                            {!! Form::hidden('product_id', $like->product->id) !!}
                                            {!! Form::hidden('quantity', '1') !!}
                                            <button type="submit"><i class="fa-solid fa-cart-shopping"></i>
                                                Thêm vào giỏ
                                            </button>
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="btn-like">
                                        {!! Form::open(['url' => route('delete.like', $like->id)]) !!}
                                        @csrf
                                        {!! Form::button('<span>Xoá yêu thích</span><i class="fa-regular fa-heart"></i>', ['type' => 'submit']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @else
                            
                        @endif
                            
                    @endforeach    
                @else
                    
                @endif
                
            </div>
        </div>

    </div>




</div>