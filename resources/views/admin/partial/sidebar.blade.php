<header>
    <div class="sidebar">
        <div class="logo">
            Admin Manager
        </div>
        <ul>
            <a href="{{ route('dashboard') }}">
                <li>
                    <div class="sidebar__item">
                        <i class="fa-solid fa-gauge"></i> 
                        <span>Dashboard</span>
                    </div>
                </li>
            </a>
            <div>
                <span>Sản phẩm</span>
            </div>
            <a href="{{ route('products') }}">
                <li>    
                    <div class="sidebar__item">
                        <i class="fa-solid fa-laptop"></i> 
                        <span>Sản phẩm</span>
                    </div>
                </li>
            </a>
            <a href="{{ route('category') }}">
                <li>
                    <div class="sidebar__item">
                        <i class="fa-solid fa-list"></i>
                        <span>Category</span>
                    </div>
                </li>
            </a>
            <a href="{{ route('color') }}">
                <li>
                    <div class="sidebar__item">
                        <i class="fa-solid fa-image"></i>
                        <span>Product Color</span>
                    </div>
                </li>
            </a>
            <span>Đơn hàng</span>
            <a href="{{ route('order') }}">
                <li>
                    <div class="sidebar__item">
                        <i class="fa-solid fa-list"></i>
                        <span>Đơn hàng</span>
                    </div>
                </li>
            </a>
            <span>Người dùng</span>
            <a href="{{route('users')}}">
                <li>
                    <div class="sidebar__item">
                        <i class="fa-solid fa-user"></i> 
                        <span>Users</span>
                    </div>
                </li>
            </a>
            <a href="{{route('roles')}}">
                <li>
                    <div class="sidebar__item">
                        <i class="fa-solid fa-user"></i> 
                        <span>Role</span>
                    </div>
                </li>
            </a>
        </ul>
    </div>
</header>