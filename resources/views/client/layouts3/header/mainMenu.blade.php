<!--Main menu link START -->
<nav class="navbar navbar-expand-xl navbar-divider">
    <div class="container px-0">
        <!-- Main navbar START -->
        <div class="navbar-collapse w-100 collapse" id="navbarCollapse2">
            <!-- Nav Main menu START -->
            <ul class="navbar-nav nav-active-line navbar-nav-scroll mx-auto">

                <!-- Nav item -->
                <li class="nav-item"> <a
                        class="nav-link
                    {{ Request::is('client/index') ? 'active' : '' }}
                    "
                        href="/client/index">Home</a> </li>
                <li class="nav-item"> <a
                        class="nav-link
                    {{ Request::is('client/chinhanh') ? 'active' : '' }}
                    "
                        href="/client/chinhanh">Chi nhánh</a> </li>
                <li class="nav-item"> <a
                        class="nav-link
                    {{ Request::is('client/phong') ? 'active' : '' }}
                    "
                        href="/client/phong">Phòng</a> </li>
                <li class="nav-item"> <a
                        class="nav-link
                    {{ Request::is('client/virtualTour') ? 'active' : '' }}
                    "
                        href="/client/virtualTour">Tham quan ảo</a> </li>
                <li class="nav-item"> <a
                        class="nav-link
                    {{ Request::is('/chatify') ? 'active' : '' }}
                    "
                        href="/chatify">Nhắn tin</a> </li>

                @auth
                    <li class="nav-item"> <a
                            class="nav-link
                    {{ Request::is('client/danhsachdatphong') ? 'active' : '' }}
                    "
                            href="/client/danhsachdatphong">Danh sách đặt phòng</a> </li>
                @endauth
            </ul>
        </div>
        <!-- Main navbar END -->
    </div>
</nav>
<!--Main menu link END -->
