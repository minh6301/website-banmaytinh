<div class="main">
    <div class="main__href">
        <i class="fa-solid fa-house"></i> <a href="{{ route('layouts.computech') }}">Trang chủ</a> <i class="fa-solid fa-angle-right"></i> @yield('title')
    </div>

    {{-- @foreach ($product as $products) --}}
        <div class="main__computer_product-detail">
            <div class="main__computer_product-detail-title">
                <span> {{$product->tensanpham}} </span>
            </div>

            <div class="main__computer_product-detail-parameter">
                <div class="main__computer_product-detail-image">
                    <div class="main__computer_product-detail-image-parent">
                        <img src="{{url($product->file)}}" alt="" srcset="">
                    </div>
                    <div class="main__computer_product-detail-image-child">
                            <div>
                                <img src="{{url($product->file)}}" alt="" srcset="">
                            </div>
                        
                    </div>
                </div>
                <div class="main__computer_product-detail-price">
                    <div class="main__computer_product-detail-price-filter">
                        {{-- <div class="main__computer_product-detail-price-filter-parameter">
                            <div class="main__computer_product-detail-price-filter-parameter-item">
                                <label class="select_price">
                                    <input type="radio" name="price" value="">
                                    <span class="checkmark">
                                        <strong>16GB - 256GB</strong>
                                        <span>16.848.934 đ</span>
                                    </span>
                                </label>
                            </div>
                            
                        </div> --}}

                        <div class="main__computer_product-detail-price-filter-color">
                            <div class="main__computer_product-detail-price-filter-color-content">
                                <span>Chọn màu để xem giá</span>
                            </div>
                            <div>
                                    <div class="main__computer_product-detail-price-filter-color-item">
                                        <label class="select_price select_color">
                                            <input type="radio" name="color" value="">
                                            <span class="checkmark">
                                                <strong>{{$product->color}}</strong> 
                                                <span>{{number_format($product->price)}} đ</span>
                                            </span>
                                        </label>
                                    </div>
                            </div>
                        </div>

                        <div class="main__computer_product-detail-button">
                            <div class="main__computer_product-detail-button-buy-now">
                                <button>Mua ngay</button>
                            </div>
                            <div class="main__computer_product-detail-button-add-to-car">
                                    {!! Form::open(['url' => route('addToCart') ]) !!}
                                        {!! Form::hidden('product_id', $product->id) !!}
                                        {!! Form::hidden('quantity', '1') !!}
                                        <button type="submit"><i class="fa-solid fa-cart-shopping"></i><br>
                                            <span>Thêm vào giỏ</span>
                                        </button>
                                    {!! Form::close() !!}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="main__computer_similer-product">
            <div>
                <span>SẢN PHẨM TƯƠNG TỰ</span>
            </div>
            <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">
                    <div class="item">
                        <div class="home__products_news-show-items">
                            <div>
                                <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/1/11h53.png" alt="" srcset="">
                                <div class="home__products_news-show-items--details">
                                    <strong>Laptop Asus Gaming Rog Strix G15 G513IH HN015W
                                    </strong>
                                    <span>26.940.938đ</span>
                                </div>
                            </div>
                            <div class="btn-like">
                                <span>Yêu thích</span><i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="home__products_news-show-items">
                            <div>
                                <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/1/11h53.png" alt="" srcset="">
                                <div class="home__products_news-show-items--details">
                                    <strong>Laptop Asus Gaming Rog Strix G15 G513IH HN015W
                                    </strong>
                                    <span>26.940.938đ</span>
                                </div>
                            </div>
                            <div class="btn-like">
                                <span>Yêu thích</span><i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="home__products_news-show-items">
                            <div>
                                <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/1/11h53.png" alt="" srcset="">
                                <div class="home__products_news-show-items--details">
                                    <strong>Laptop Asus Gaming Rog Strix G15 G513IH HN015W
                                    </strong>
                                    <span>26.940.938đ</span>
                                </div>
                            </div>
                            <div class="btn-like">
                                <span>Yêu thích</span><i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="home__products_news-show-items">
                            <div>
                                <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/1/11h53.png" alt="" srcset="">
                                <div class="home__products_news-show-items--details">
                                    <strong>Laptop Asus Gaming Rog Strix G15 G513IH HN015W
                                    </strong>
                                    <span>26.940.938đ</span>
                                </div>
                            </div>
                            <div class="btn-like">
                                <span>Yêu thích</span><i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="home__products_news-show-items">
                            <div>
                                <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/1/11h53.png" alt="" srcset="">
                                <div class="home__products_news-show-items--details">
                                    <strong>Laptop Asus Gaming Rog Strix G15 G513IH HN015W
                                    </strong>
                                    <span>26.940.938đ</span>
                                </div>
                            </div>
                            <div class="btn-like">
                                <span>Yêu thích</span><i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="home__products_news-show-items">
                            <div>
                                <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/1/11h53.png" alt="" srcset="">
                                <div class="home__products_news-show-items--details">
                                    <strong>Laptop Asus Gaming Rog Strix G15 G513IH HN015W
                                    </strong>
                                    <span>26.940.938đ</span>
                                </div>
                            </div>
                            <div class="btn-like">
                                <span>Yêu thích</span><i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="home__products_news-show-items">
                            <div>
                                <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/1/11h53.png" alt="" srcset="">
                                <div class="home__products_news-show-items--details">
                                    <strong>Laptop Asus Gaming Rog Strix G15 G513IH HN015W
                                    </strong>
                                    <span>26.940.938đ</span>
                                </div>
                            </div>
                            <div class="btn-like">
                                <span>Yêu thích</span><i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="home__products_news-show-items">
                            <div>
                                <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/1/11h53.png" alt="" srcset="">
                                <div class="home__products_news-show-items--details">
                                    <strong>Laptop Asus Gaming Rog Strix G15 G513IH HN015W
                                    </strong>
                                    <span>26.940.938đ</span>
                                </div>
                            </div>
                            <div class="btn-like">
                                <span>Yêu thích</span><i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="home__products_news-show-items">
                            <div>
                                <img src="https://cdn2.cellphones.com.vn/358x358,webp,q100/media/catalog/product/1/1/11h53.png" alt="" srcset="">
                                <div class="home__products_news-show-items--details">
                                    <strong>Laptop Asus Gaming Rog Strix G15 G513IH HN015W
                                    </strong>
                                    <span>26.940.938đ</span>
                                </div>
                            </div>
                            <div class="btn-like">
                                <span>Yêu thích</span><i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <button class="btn btn-primary leftLst"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="btn btn-primary rightLst"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>

        <div class="main__computer_content">
            <div class="main__computer_content-left">
                <div class="main__computer_content-outstanding">
                    {{$product->dacdiemnoibat}}
                </div>
            </div>
            <div class="main__computer_content-specifications">
                <div>
                    <h1>Thông số kỹ thuật</h1>
                </div>
                <table class="table table-striped">
                    {{$product->thongsokythuat}}
                    {{-- <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                    </tr>
                    </tbody> --}}
                </table>
            </div>
        </div>
    {{-- @endforeach --}}
    

</div>