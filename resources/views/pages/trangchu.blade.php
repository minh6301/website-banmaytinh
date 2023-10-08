
<div class="home__page">
    {{-- slider --}}
    <div class="home__slide">
        <div class="CSSgal">
            <!-- Don't wrap targets in parent -->
            <s id="s1"></s>
            <s id="s2"></s>
            <s id="s3"></s>
            <s id="s4"></s>
        
            <div class="slider">
                <div>
                    <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/ASUS%20B2S%202023.jpg" alt="" srcset="">
                </div>
                <div>
                    <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/ASUS%20B2S%202023.jpg" alt="" srcset="">
                </div>
                <div>
                    <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/ASUS%20B2S%202023.jpg" alt="" srcset="">
                </div>
                <div>
                    <img src="https://cdn2.cellphones.com.vn/690x300,webp,q100/https://dashboard.cellphones.com.vn/storage/ASUS%20B2S%202023.jpg" alt="" srcset="">
                </div>
                
            </div>
        
            <div class="prevNext">
                <div>
                    <a href="#s4"><i class="fa-solid fa-arrow-left"></i></a>
                    <a href="#s2"><i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div>
                    <a href="#s1"><i class="fa-solid fa-arrow-left"></i></a>
                    <a href="#s3"><i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div>
                    <a href="#s2"><i class="fa-solid fa-arrow-left"></i></a>
                    <a href="#s4"><i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div>
                    <a href="#s3"><i class="fa-solid fa-arrow-left"></i></a>
                    <a href="#s1"><i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="banner">
            <img src="https://cdn2.cellphones.com.vn/690x300,webp,q10/https://dashboard.cellphones.com.vn/storage/asus%20tuf.jpg" alt="" srcset="">
        </div>
        <div class="banner">
            <img src="https://cdn2.cellphones.com.vn/690x300,webp,q10/https://dashboard.cellphones.com.vn/storage/asus%20tuf.jpg" alt="" srcset="">
        </div>
        <div class="banner">
            <img src="https://cdn2.cellphones.com.vn/690x300,webp,q10/https://dashboard.cellphones.com.vn/storage/asus%20tuf.jpg" alt="" srcset="">
        </div>
    </div>

    <div class="home__product">
        {{-- product news --}}
        <div class="home__products_news">
            <div class="home__products_news-title product__title">
                Sản phẩm mới nhất 
            </div>
            <div class="home__products_news-show products__show">
                {{-- view product --}}
                @foreach ($product as $products )
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
                
            </div>
        </div>

        {{-- product laptop window --}}
        <div class="home__products_laptop-window">
            <div class="home__products_laptop-window-title product__title">
                Laptop window
            </div>
            <div>
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach ($laptop as $laptops )
                            @if($laptops->tensanpham !== 'Macbook' && $laptops->tensanpham !== 'Gaming')
                                <div class="item">
                                    <div class="home__products_news-show-items">
                                        <div>
                                            <img src="{{url($laptops->file)}}" alt="" srcset="">
                                            <div class="home__products_news-show-items--details">
                                                <strong>{{$laptops->tensanpham}}
                                                </strong>
                                                <span>{{number_format($laptops->price)}} đ</span>
                                            </div>
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
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="btn btn-primary leftLst"><</button>
                    <button class="btn btn-primary rightLst">></button>
                </div>
            </div>
        </div>

        {{-- product laptop gaming --}}
        <div class="home__products_laptop-window home__products_laptop-gaming">
            <div class="home__products_laptop-window-title product__title">
                Laptop Gaming
            </div>
            <div>
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach ($laptop_gaming as $gaming )
                            <div class="item">
                                <div class="home__products_news-show-items">
                                    <div>
                                        <img src="{{$gaming->file}}" alt="" srcset="">
                                        <div class="home__products_news-show-items--details">
                                            <strong>{{$gaming->tensanpham}}
                                            </strong>
                                            <span>{{number_format($gaming->price)}} đ</span>
                                        </div>
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
                            </div>
                        @endforeach
                        </div>
                    <button class="btn btn-primary leftLst"><</button>
                    <button class="btn btn-primary rightLst">></button>
                </div>
            </div>
        </div>

        {{-- product macos --}}
        <div class="home__products_laptop-window home__products_macos">
            <div class="home__products_laptop-window-title product__title">
                MacOS
            </div>
            <div>
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach ($macos as $macbook )
                            <div class="item">
                                <div class="home__products_news-show-items">
                                    <div>
                                        <img src="{{$macbook->file}}" alt="" srcset="">
                                        <div class="home__products_news-show-items--details">
                                            <strong>{{$macbook->tensanpham}}
                                            </strong>
                                            <span>{{number_format($macbook->price)}} đ</span>
                                        </div>
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
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-primary leftLst"><</button>
                    <button class="btn btn-primary rightLst">></button>
                </div>
            </div>
        </div>


    </div>

    {{-- phụ kiện --}}
    <div class="home__products_accessory">
        {{-- <div class="home__products_accessory-title product__title">
            Phụ kiện
        </div>
        <div class="home__products_accessory-show">
            <div class="home__products_accessory-show--items">
                chuột 
            </div>
            <div class="home__products_accessory-show--items">
                chuột 
            </div>
            <div class="home__products_accessory-show--items">
                chuột 
            </div>
            <div class="home__products_accessory-show--items">
                chuột 
            </div>
            <div class="home__products_accessory-show--items">
                chuột 
            </div>
            <div class="home__products_accessory-show--items">
                chuột 
            </div>
            <div class="home__products_accessory-show--items">
                chuột 
            </div>
            <div class="home__products_accessory-show--items">
                chuột 
            </div>
            <div class="home__products_accessory-show--items">
                chuột 
            </div>
            <div class="home__products_accessory-show--items">
                chuột 
            </div>
            <div class="home__products_accessory-show--items">
                chuột 
            </div>
            <div class="home__products_accessory-show--items">
                chuột 
            </div>
        </div> --}}
    </div>
</div>
