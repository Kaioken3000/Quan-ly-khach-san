<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        @include('layouts.logo')

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('dashboard') ? 'active':'' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Loại phòng -->
        <li class="menu-item {{ Request::is('loaiphongs') || Request::is('loaiphongs*') ? 'active':'' }}">
            <a href="{{ route('loaiphongs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Analytics">Loại phòng</div>
            </a>
        </li>

        <!-- Phòng -->
        <li class="menu-item {{ Request::is('phongs') || Request::is('phongs*') ? 'active':'' }}">
            <a href="{{ route('phongs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-hotel"></i>
                <div data-i18n="Analytics">Phòng</div>
            </a>
        </li>

        <!-- Dịch vụ -->
        <li class="menu-item {{ Request::is('dichvus') || Request::is('dichvus*') ? 'active':'' }}">
            <a href="{{ route('dichvus.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Analytics">Dịch vụ</div>
            </a>
        </li>

        <!-- Khách hàng -->
        <li class="menu-item {{ Request::is('khachhangs') || Request::is('khachhangs*') ? 'active':'' }}">
            <a href="{{ route('khachhangs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Khách hàng</div>
            </a>
        </li>

        <!-- Phòng đã đặt -->
        <li class="menu-item {{ Request::is('datphongs') || Request::is('datphongs*') ? 'active':'' }}">
            <a href="{{ route('datphongs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bed"></i>
                <div data-i18n="Analytics">Quản lý đặt phòng</div>
            </a>
        </li>
        <!-- Nhắn tin -->
        <li class="menu-item {{ Request::is('chatify') || Request::is('chatify*') ? 'active':'' }}">
            <a href="{{ route('chatify') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chat"></i>
                <div data-i18n="Analytics">Nhắn tin</div>
            </a>
        </li>



        @hasrole('Admin')
        <!-- Quản lý -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Quản lý</span></li>

        <!-- Nhân viên -->
        <li class="menu-item {{ Request::is('nhanviens') || Request::is('nhanviens*') ? 'active':'' }}">
            <a href="{{ route('nhanviens.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Analytics">Nhân viên</div>
            </a>
        </li>

        <!-- Account -->
        <li class="menu-item {{ Request::is('users') || Request::is('users*') ? 'active':'' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Support"> Account</div>
            </a>
        </li>

        <!-- Role -->
        <li class="menu-item {{ Request::is('roles') || Request::is('roles*') ? 'active':'' }}">
            <a href="{{ route('roles.index') }}" class="menu-link">
                <i class="menu-icon tf-icons fa fa-gear"></i>
                <div data-i18n="Support">Role</div>
            </a>
        </li>
        @endhasrole

        <!-- Tác vụ -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Tác vụ</span></li>

        <!-- Báo cáo -->
        <li class="menu-item {{ Request::is('baocaos') || Request::is('baocaos*') ? 'active':'' }}">
            <a href="{{ route('baocaos.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Support">Báo cáo</div>
            </a>
        </li>
    </ul>
</aside>