<header class="site-header js-site-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index">Sogo Hotel</a></div>
            <div class="col-6 col-lg-8">


                <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- END menu-toggle -->

                <div class="site-navbar js-site-navbar">
                    <nav role="navigation">
                        <div class="container">
                            <div class="row full-height align-items-center">
                                <div class="col-md-6 mx-auto">
                                    <ul class="list-unstyled menu">
                                        <li class="{{ Request::is('client/index') ? 'active':'' }}"><a href="/client/index">Trang chủ</a></li>
                                        <li class="{{ Request::is('client/phong') ? 'active':'' }}"><a href="/client/phong">Phòng</a></li>
                                        @auth
                                        <li>
                                            <form action="/client/danhsachdatphong" method="post">
                                                @csrf
                                                <input type="hidden" value="{{auth()->user()->id}}" name="clientid">
                                                <a href="#" class="btn btn-link">
                                                    <input class="border-0 bg-white pe-auto m-0 p-0 
                                                    {{ Request::is('client/danhsachdatphong') ? 'text-primary':'' }}" 
                                                    type="submit" value="Phòng đã đặt">
                                                </a>
                                            </form>
                                        </li>
                                        <br>
                                        <li><a href="/client/khachhang">{{auth()->user()->username}}</a></li>
                                        <li> 
                                            <a href="{{ route('client.logout') }}"> 
                                                <i class="fas fa-sign-out-alt"></i><span class="align-middle"> Thoát</span>
                                            </a>
                                        </li>
                                        @endauth
                                        @guest
                                        <li class="{{ Request::is('client/login') ? 'active':'' }}"><a href="/client/login"> Đăng nhập </a></li>
                                        <li class="{{ Request::is('client/register') ? 'active':'' }}"><a href="/client/register"> Đăng ký </a></li>
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>