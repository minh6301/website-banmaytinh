<header>
    <div class="grid__header">
        <div class="header__up">
            <ul></ul>
            <ul>
                <li>Thông báo</li>
                <li>Hỗ trợ</li>
            </ul>
        </div>
        <div class="header__down">
            <div class="header__logo">
                <img src="{{asset('computech.png')}}" alt="" srcset="">
            </div>
            <div class="header__down_menu">
                <ul>
                    <a href="{{route('layouts.computech')}}"><li>Trang chủ</li></a>
                    <a href="{{route('layouts.laptopwindow')}}"><li>Tất cả</li></a>
                    <a href="{{route('layouts.laptopgaming')}}"><li>Laptop Gaming</li></a>
                    <a href="{{route('Macbook')}}"><li>MacOS</li></a>
                    {{-- <a href=""><li>Phụ kiện</li></a> --}}
                    <a href=""><li>Khuyến mãi</li></a>
                    <a href="{{ route('like') }}"><li>Yêu thích</li></a>
                </ul>
            </div>
            <div class="header__down_item">
                <ul>
                    <li>
                        <i class="fa-solid fa-magnifying-glass icon"></i>
                    </li>
                    <a href="{{route('cart')}}">
                        <li>
                            <i class="fa-solid fa-cart-shopping"></i>
                            {{-- <span class="quantity_cart">0</span> --}}
                        </li>
                    </a>
                    <li>
                        @if(Auth::check())
                        <div>
                            <div class="toggle">
                                <i class="fa-regular fa-user"></i>  <span>{{ Auth::user()->name }}</span>
                            </div>
                            <div class="dropdow">
                                <div>profile</div>
                                <div>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit">Đăng xuất</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                            <a href="{{route('login')}}">
                                Đăng nhập
                            </a>

                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header__search">
        <div>
            {!! Form::open(['url' => route('searchProduct'), 'method' => 'post']) !!}
                <button>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <input type="search" name="searchProduct" class="header__search_item" placeholder="Bạn cần tìm gì ?">
            {!! Form::close() !!}
        </div>
    </div>
</header>