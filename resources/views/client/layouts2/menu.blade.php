<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="canvas-open">
    <i class="icon_menu"></i>
</div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="icon_close"></i>
    </div>
    <div class="search-icon  search-switch">
        @include('client.layouts2.searchMenu')
    </div>
    <div class="header-configure-area">
        <div class="language-option">
            <img src="/client2/img/vnflag.png" alt="">
            <span>VI <i class="fa fa-angle-down"></i></span>
            <div class="flag-dropdown">
                <ul>
                    <li><a href="#">Zi</a></li>
                    <li><a href="#">Fr</a></li>
                </ul>
            </div>
        </div>
        <a href="#" class="bk-btn">Đặt phòng ngay</a>
    </div>
    <nav class="mainmenu mobile-menu">
        <ul>
            <li class="{{ Request::is('client/index') ? 'active' : '' }}"><a href="/client/index">Trang chủ</a></li>
            <li class="{{ Request::is('client/chinhanh*') ? 'active' : '' }}"><a href="/client/chinhanh">Chi nhánh</a>
            </li>
            <li class="{{ Request::is('client/phong') ? 'active' : '' }}"><a href="/client/phong">Phòng</a></li>
            <li class="{{ Request::is('client/virtualTour') ? 'active' : '' }}"><a href="/client/virtualTour">Tham quan
                    ảo</a></li>
            <li class="{{ Request::is('chatify') ? 'active' : '' }}"><a href="/chatify/">Nhắn tin</a></li>
            @auth
                <li>
                <li class="{{ Request::is('client/danhsachdatphong') ? 'active' : '' }}"><a
                        href="/client/danhsachdatphong">Danh sách đặt phòng</a></li>
                </li>
                <li><a href="#">Tài khoản</a>
                    <ul class="dropdown">
                        <li><a href="/client/khachhang">{{ auth()->user()->username }}</a></li>
                        <li>
                            <a href="{{ route('client.logout') }}">
                                <i class="fas fa-sign-out-alt"></i><span class="align-middle">Đăng xuất</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endauth
            @guest
                <li class="{{ Request::is('client/login') ? 'active' : '' }}"><a href="/client/login">
                        Đăng nhập </a></li>
                <li class="{{ Request::is('client/register') ? 'active' : '' }}"><a href="/client/register"> Đăng ký </a>
                </li>
            @endguest
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="top-social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-tripadvisor"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
    <ul class="top-widget">
        <li><i class="fa fa-phone"></i> (12) 345 67890</li>
        <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
    </ul>
</div>
<!-- Offcanvas Menu Section End -->
