<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
        <div class="header-search">
            @include('layouts2.search')
        </div>
    </div>
    <div class="header-right d-flex align-items-center">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>

        {{-- Login, Register --}}
        @guest
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a href="{{ route('login.perform') }}">
                    Đăng nhập
                </a>
            </div>
        </div>
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a href="{{ route('register.perform') }}">
                    Đăng ký
                </a>
            </div>
        </div>
        @endguest
        
        {{-- User info --}}
        @auth
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="/bootstrap4/vendors/images/photo1.jpg" alt="" />
                    </span>
                    <span class="user-name text-sm">{{Auth::user()->username}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="/profile"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('logout.perform') }}"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
        @endauth
    </div>
</div>
