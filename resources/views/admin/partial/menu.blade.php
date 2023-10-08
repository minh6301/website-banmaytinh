<div class="menu">
    <div></div>
    <div>
        @if(Auth::check())
        <div>
            <div class="toggle">
                <i class="fa-regular fa-user"></i>  <span>{{ Auth::user()->name }}</span>
            </div>
            <div class="dropdow">
                <div>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit">Đăng xuất</button>
                    </form>
                </div>
            </div>
        </div>
        @else
            <a href="{{route('admin.login')}}">
                Đăng nhập
            </a>

        @endif
    </div>
</div>