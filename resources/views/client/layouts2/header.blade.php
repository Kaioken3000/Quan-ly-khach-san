<!-- Header Section Begin -->
<header class="header-section">
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
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                        <a href="#" class="bk-btn">Booking Now</a>
                        <div class="language-option">
                            <img src="/client2/img/vnflag.png" alt="">
                            <span>EN <i class="fa fa-angle-down"></i></span>
                            <div class="flag-dropdown">
                                <ul>
                                    <li><a href="#">VI</a></li>
                                    <li><a href="#">FR</a></li>
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
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="/client/index">
                            <img src="/client2/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li class="{{ Request::is('client/index') ? 'active':'' }}"><a href="/client/index">Home</a></li>
                                <li class="{{ Request::is('client/phong') ? 'active':'' }}"><a href="/client/phong">Room</a></li>
                                <li class="{{ Request::is('client/virtualTour') ? 'active':'' }}"><a href="/client/virtualTour">Virtual tour</a></li>
                                <li class="{{ Request::is('chatify') ? 'active':'' }}"><a href="/chatify/">Chat</a></li>
                                {{-- <li><a href="./pages.html">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="./room-details.html">Room Details</a></li>
                                        <li><a href="./blog-details.html">Blog Details</a></li>
                                        <li><a href="#">Family Room</a></li>
                                        <li><a href="#">Premium Room</a></li>
                                    </ul>
                                </li> --}}
                                @auth
                                <li>
                                    <form action="/client/danhsachdatphong" method="post">
                                        @csrf
                                        <input type="hidden" value="{{auth()->user()->id}}" name="clientid">
                                        <li>
                                            <a href="#" class="btn btn-link">
                                                <input class="border-0 bg-white pe-auto m-0 p-0 
                                                        {{ Request::is('client/danhsachdatphong') ? 'text-primary':'' }}" type="submit" value="Your Room">
                                            </a>
                                        </li>
                                    </form>
                                </li>
                                <li><a href="#">Account</a>
                                    <ul class="dropdown">
                                        <li><a href="/client/khachhang">{{auth()->user()->username}}</a></li>
                                        <li>
                                            <a href="{{ route('client.logout') }}">
                                                <i class="fas fa-sign-out-alt"></i><span class="align-middle"> Log out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @endauth
                                @guest
                                <li class="{{ Request::is('client/login') ? 'active':'' }}"><a href="/client/login"> Đăng nhập </a></li>
                                <li class="{{ Request::is('client/register') ? 'active':'' }}"><a href="/client/register"> Đăng ký </a></li>
                                @endguest
                            </ul>
                        </nav>
                        <div class="nav-right search-switch">
                            @include("client.layouts2.searchMenu")
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
