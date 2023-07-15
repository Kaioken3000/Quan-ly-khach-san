<div class="left-side-bar">
    <div class="brand-logo">
        <a href="/">
            <img src="/bootstrap4/vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
            <img src="/bootstrap4/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="/dashboard" 
                        class="dropdown-toggle no-arrow {{ Request::is('dashboard') ? 'active':'' }}">
                        <span class="micon fa fa-home"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('loaiphongs.index') }}" 
                    class="dropdown-toggle no-arrow {{ Request::is('loaiphongs') || Request::is('loaiphongs*') ? 'active':'' }}">
                        <span class="micon fa fa-list"></span><span class="mtext">Loại phòng</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('phongs.index') }}" 
                    class="dropdown-toggle no-arrow {{ Request::is('phongs') || Request::is('phongs*') ? 'active':'' }}">
                        <span class="micon fa fa-hotel"></span><span class="mtext">Phòng</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dichvus.index') }}" 
                    class="dropdown-toggle no-arrow {{ Request::is('dichvus') || Request::is('dichvus*') ? 'active':'' }}">
                        <span class="micon fa fa-wrench"></span><span class="mtext">Dịch vụ</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('khachhangs.index') }}" 
                    class="dropdown-toggle no-arrow {{ Request::is('khachhangs') || Request::is('khachhangs*') ? 'active':'' }}">
                        <span class="micon fa fa-users"></span><span class="mtext">Khách hàng</span>
                    </a>
                </li>
                <li>
                    <a href="/chatify" 
                    class="dropdown-toggle no-arrow {{ Request::is('chatify') || Request::is('chatify*') ? 'active':'' }}">
                        <span class="micon fa fa-comments"></span><span class="mtext">Chat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('datphongs.index') }}" 
                    class="dropdown-toggle no-arrow {{ Request::is('datphongs') || Request::is('datphongs*') ? 'active':'' }}">
                        <span class="micon fa fa-bell"></span><span class="mtext">Quản lý đặt phòng</span>
                    </a>
                </li>
                {{-- <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-dollar"></span>
                        <span class="mtext">Thanh toán</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="index2.html">Chưa thanh toán</a></li>
                        <li><a href="index3.html">Đã thanh toán</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon fa fa-gear"></span>
                        <span class="mtext">Xử lý</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="index2.html">Chưa xử lý</a></li>
                        <li><a href="index3.html">Đã xử lý</a></li>
                    </ul>
                </li> --}}

                @hasrole('Admin')
                <li>
                    <div class="sidebar-small-cap">Admin</div>
                </li>
                <li>
                    <a href="{{ route('catrucs.index') }}"
                    class="dropdown-toggle no-arrow {{ Request::is('catrucs') || Request::is('catrucs*') ? 'active':'' }}">
                        <span class="micon fa fa-tasks"></span><span class="mtext">Ca trực</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('nhanviens.index') }}" 
                    class="dropdown-toggle no-arrow {{ Request::is('nhanviens') || Request::is('nhanviens*') ? 'active':'' }}">
                        <span class="micon fa fa-user"></span><span class="mtext">Nhân viên</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}" 
                    class="dropdown-toggle no-arrow {{ Request::is('users') || Request::is('users*') ? 'active':'' }}">
                        <span class="micon fa fa-user-circle"></span><span class="mtext">Account</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('roles.index') }}" 
                    class="dropdown-toggle no-arrow {{ Request::is('roles') || Request::is('roles*') ? 'active':'' }}">
                        <span class="micon fa fa-cog"></span><span class="mtext">Role</span>
                    </a>
                </li>
                @endhasrole

                <li>
                    <div class="sidebar-small-cap">Tác vụ</div>
                </li>
                <li>
                    <a href="{{ route('baocaos.index') }}" 
                    class="dropdown-toggle no-arrow {{ Request::is('baocaos') || Request::is('baocaos*') ? 'active':'' }}">
                        <span class="micon fa fa-file"></span><span class="mtext">Báo cáo</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
