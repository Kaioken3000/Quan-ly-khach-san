<!-- Header Section Begin -->
<header class="header-section header-normal">
    <div class="top-nav">
        <div class="container-xxl mx-5">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">
                        <li><i class="fa fa-phone"></i> (12) 345 67890</li>
                        <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tn-right">
                        <div class="top-social">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-tripadvisor"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                        <a href="#" class="bk-btn">Booking Now</a>
                        <div class="language-option">
                            <img src="/client2/img/flag.jpg" alt="">
                            <span>EN <i class="fa fa-angle-down"></i></span>
                            <div class="flag-dropdown">
                                <ul>
                                    <li><a href="#">Zi</a></li>
                                    <li><a href="#">Fr</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="container-xxl mx-5">
            <div class="row align-items-center">
                <div class="col-lg-1">
                    <div class="logo">
                        <a href="/client/index">
                            <img src="/client2/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-11">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li class="{{ Request::is('client/index') ? 'active' : '' }}"><a
                                        href="/client/index">Trang chủ</a></li>
                                <li class="{{ Request::is('client/chinhanh*') ? 'active' : '' }}"><a
                                        href="/client/chinhanh">Chi nhánh</a></li>
                                <li class="{{ Request::is('client/phong') ? 'active' : '' }}"><a
                                        href="/client/phong">Phòng</a></li>
                                <li class="{{ Request::is('client/virtualTour') ? 'active' : '' }}"><a
                                        href="/client/virtualTour">Tham quan ảo</a></li>
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
                                    <li class="{{ Request::is('client/register') ? 'active' : '' }}"><a
                                            href="/client/register"> Đăng ký </a></li>
                                @endguest
                            </ul>
                        </nav>
                        <div class="nav-right search-switch">
                            @include('client.layouts2.searchMenu2')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
