<div class="main">
    <div class="main__href">
        <i class="fa-solid fa-house"></i> <a href="{{ route('layouts.computech') }}">Trang chủ</a> <i class="fa-solid fa-angle-right"></i> @yield('title')
    </div>

    <div class="main__computer_company">
        <div class="main__computer_company-item">
            <img src="https://cdn2.cellphones.com.vn/x50,webp,q30/media/wysiwyg/Icon/macbook_air_icon.png" alt="" srcset="">
            <span>Macbook Air</span>
        </div>
        <div class="main__computer_company-item">
            <img src="https://cdn2.cellphones.com.vn/x50,webp,q30/media/wysiwyg/Icon/macbook_pro_icon.png" alt="" srcset="">
            <span>Macbook Pro</span>
        </div>
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

    </div>


    <div class="view-more">
        <span>
            Xem thêm <i class="fa-solid fa-chevron-down"></i>
        </span>
    </div>


</div>