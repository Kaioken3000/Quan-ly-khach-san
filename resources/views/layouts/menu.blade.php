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
        <li class="menu-item {{ Request::is('/') ? 'active':'' }}">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <!-- Loại phòng -->
        <li class="menu-item {{ Request::is('loaiphongs') || Request::is('loaiphongs/*') ? 'active':'' }}">
            <a href="{{ route('loaiphongs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Analytics">Loại phòng</div>
            </a>
        </li>
        <!-- Phòng -->
        <li class="menu-item {{ Request::is('phongs') || Request::is('phongs/*') ? 'active':'' }}">
            <a href="{{ route('phongs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-hotel"></i>
                <div data-i18n="Analytics">Phòng</div>
            </a>
        </li>
        <!-- Khách hàng -->
        <li class="menu-item {{ Request::is('khachhangs') || Request::is('khachhangs/*') ? 'active':'' }}">
            <a href="{{ route('phongs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Khách hàng</div>
            </a>
        </li>
        <!-- Nhân viên -->
        <li class="menu-item {{ Request::is('nhanviens') || Request::is('nhanviens/*') ? 'active':'' }}">
            <a href="{{ route('phongs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Analytics">Nhân viên</div>
            </a>
        </li>

        <!-- Tác vụ -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Tác vụ</span></li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Support">Báo cáo</div>
            </a>
        </li>   
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-stats"></i>
                <div data-i18n="Support">Thống kê</div>
            </a>
        </li>   
    </ul>
</aside>