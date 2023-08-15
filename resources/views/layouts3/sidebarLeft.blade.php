<nav class="navbar navbar-vertical navbar-expand-lg">
    <script>
        var navbarStyle = localStorage.getItem("phoenixNavbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages--><span class="nav-item-wrapper">
                        <a class="nav-link {{ Request::is('dashboard') || Request::is('dashboard*') ? 'active' : '' }} dropdown-indicator label-1"
                            href="/">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-chart-pie"></i>
                                </span>
                                <span class="nav-link-text">Dashboard</span>
                            </div>
                        </a>
                    </span>
                </li>
                <!-- label-->
                <p class="navbar-vertical-label">Apps</p>
                <hr class="navbar-vertical-line">
                <li class="nav-item">
                    <!-- parent pages--><span class="nav-item-wrapper">
                        <a class="nav-link {{ Request::is('chinhanhs') || Request::is('chinhanhs*') ? 'active' : '' }} dropdown-indicator label-1"
                            href="/chinhanhs">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-code-branch"></i>
                                </span>
                                <span class="nav-link-text">Chi nhánh</span>
                            </div>
                        </a>
                    </span>
                </li>
                <li class="nav-item">
                    <!-- parent pages--><span class="nav-item-wrapper">
                        <a class="nav-link {{ Request::is('loaiphongs') || Request::is('loaiphongs*') ? 'active' : '' }} dropdown-indicator label-1"
                            href="/loaiphongs">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-list"></i>
                                </span>
                                <span class="nav-link-text">Loại phòng</span>
                            </div>
                        </a>
                    </span>
                </li>
                <li class="nav-item">
                    <!-- parent pages--><span class="nav-item-wrapper">
                        <a class="nav-link {{ Request::is('phongs') || Request::is('phongs*') ? 'active' : '' }} dropdown-indicator label-1"
                            href="/phongs">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-hotel"></i>
                                </span>
                                <span class="nav-link-text">Phòng</span>
                            </div>
                        </a>
                    </span>
                </li>
                {{-- Chi tiết phòng --}}
                <li class="nav-item">
                    <!-- parent pages-->
                    <span class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" id="chiTietPhong"
                            href="https://prium.github.io/phoenix/v1.6.0/dashboard/project-managementChiTietPhong.html#project-managementChiTietPhong"
                            role="button" data-bs-toggle="collapse">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <span class="fas fa-caret-right"></span>
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fa fa-cog"></i>
                                </span>
                                <span class="nav-link-text">Thông tin phòng</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent 
                            {{ Request::is('thietbis') || Request::is('thietbis*') ? 'show' : '' }}
                            {{ Request::is('giuongs') || Request::is('giuongs*') ? 'show' : '' }}
                            {{ Request::is('mieutas') || Request::is('mieutas*') ? 'show' : '' }}
                            {{ Request::is('hinhs') || Request::is('hinhs*') ? 'show' : '' }}"
                                data-bs-parent="#chiTietPhong" id="project-managementChiTietPhong">
                                <li class="nav-item">
                                    <a href="/thietbis"
                                        class="nav-link {{ Request::is('thietbis') || Request::is('thietbis*') ? 'active' : '' }}">
                                        <span class="micon fa fa-tv"></span>
                                        <span class="mtext">Thiết bị</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/giuongs"
                                        class="nav-link {{ Request::is('giuongs') || Request::is('giuongs*') ? 'active' : '' }}">
                                        <span class="micon fa fa-bed"></span>
                                        <span class="mtext">Giường</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/hinhs"
                                        class="nav-link {{ Request::is('hinhs') || Request::is('hinhs*') ? 'active' : '' }}">
                                        <span class="micon fa fa-image"></span>
                                        <span class="mtext">Hình</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link">
                                        <span class="micon fa fa-video"></span>
                                        <span class="mtext">Video</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link">
                                        <span class="micon fa fa-landmark"></span>
                                        <span class="mtext">Virtual Tour</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/mieutas"
                                        class="nav-link {{ Request::is('mieutas') || Request::is('mieutas*') ? 'active' : '' }}">
                                        <span class="micon fa fa-circle-info"></span>
                                        <span class="mtext">Miêu Tả</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </span>
                </li>
                <li class="nav-item">
                    <!-- parent pages--><span class="nav-item-wrapper">
                        <a class="nav-link {{ Request::is('dichvus') || Request::is('dichvus*') ? 'active' : '' }} dropdown-indicator label-1"
                            href="/dichvus">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-wrench"></i>
                                </span>
                                <span class="nav-link-text">Dịch vụ</span>
                            </div>
                        </a>
                    </span>
                </li>
                <li class="nav-item">
                    <!-- parent pages--><span class="nav-item-wrapper">
                        <a class="nav-link {{ Request::is('anuongs') || Request::is('anuongs*') ? 'active' : '' }} dropdown-indicator label-1"
                            href="/anuongs">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-utensils"></i>
                                </span>
                                <span class="nav-link-text">Dịch vụ ăn uống</span>
                            </div>
                        </a>
                    </span>
                </li>
                <li class="nav-item">
                    <!-- parent pages--><span class="nav-item-wrapper">
                        <a class="nav-link {{ Request::is('khachhangs') || Request::is('khachhangs*') ? 'active' : '' }} dropdown-indicator label-1"
                            href="/khachhangs">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-users"></i>
                                </span>
                                <span class="nav-link-text">Khách hàng</span>
                            </div>
                        </a>
                    </span>
                </li>
                <li class="nav-item">
                    <!-- parent pages--><span class="nav-item-wrapper">
                        <a class="nav-link {{ Request::is('chatify') || Request::is('chatify*') ? 'active' : '' }} dropdown-indicator label-1"
                            href="/chatify">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-comment"></i>
                                </span>
                                <span class="nav-link-text">Chat</span>
                            </div>
                        </a>
                    </span>
                </li>
                <li class="nav-item">
                    <!-- parent pages--><span class="nav-item-wrapper">
                        <a class="nav-link {{ Request::is('videochat') || Request::is('videochat*') ? 'active' : '' }} dropdown-indicator label-1"
                            href="/videochat">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-camera"></i>
                                </span>
                                <span class="nav-link-text">Video chat</span>
                            </div>
                        </a>
                    </span>
                </li>
                <li class="nav-item">
                    <!-- parent pages--><span class="nav-item-wrapper">
                        <a class="nav-link {{ Request::is('datphongs') || Request::is('datphongs*') ? 'active' : '' }} dropdown-indicator label-1"
                            href="/datphongs"
                            onclick="setFilter('', '', 6); setFilter('', '', 5); setFilter('', '', 7);">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-bell"></i>
                                </span>
                                <span class="nav-link-text">Quản lý đặt phòng</span>
                            </div>
                        </a>
                    </span>
                </li>
                {{-- Xử lý --}}
                <li class="nav-item">
                    <!-- parent pages-->
                    <span class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" id="xulyNav"
                            href="https://prium.github.io/phoenix/v1.6.0/dashboard/project-management1.html#project-management1"
                            role="button" data-bs-toggle="collapse" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <span class="fas fa-caret-right"></span>
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fa fa-cog"></i>
                                </span>
                                <span class="nav-link-text">Xử lý</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent" data-bs-parent="#xulyNav" id="project-management1">
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link" id="chuaxuly" name="notLink"
                                        onclick="setFilter('chuaxulyOnly', 'Chưa', 5)">
                                        <span class="micon fa fa-times"></span>
                                        <span class="mtext">Chưa xử lý</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link" id="daxuly" name="notLink"
                                        onclick="setFilter('xulyOnly', 'Xác nhận', 5)">
                                        <span class="micon fa fa-check"></span>
                                        <span class="mtext">Đã xử lý</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </span>
                </li>
                {{-- Thanh toán --}}
                <li class="nav-item">
                    <!-- parent pages-->
                    <span class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" id="thanhtoanNav"
                            href="https://prium.github.io/phoenix/v1.6.0/dashboard/project-management2.html#project-management2"
                            role="button" data-bs-toggle="collapse" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <span class="fas fa-caret-right"></span>
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                                <span class="nav-link-text">Thanh toán</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent" data-bs-parent="#thanhtoanNav" id="project-management2">
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link" id="chuathanhtoan" name="notLink"
                                        onclick="setFilter('chuathanhtoanOnly', 'Chưa', 6)">
                                        <span class="micon fa fa-times"></span>
                                        <span class="mtext">Chưa thanh toán</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link" id="dathanhtoan" name="notLink"
                                        onclick="setFilter('thanhtoanOnly', 'Xác nhận', 6)">
                                        <span class="micon fa fa-check"></span>
                                        <span class="mtext">Đã thanh toán</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </span>
                    {{-- Nhận phòng --}}
                <li class="nav-item">
                    <!-- parent pages-->
                    <span class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" id="nhanphongNav"
                            href="https://prium.github.io/phoenix/v1.6.0/dashboard/project-management3.html#project-management3"
                            role="button" data-bs-toggle="collapse" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <span class="fas fa-caret-right"></span>
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-door-open"></i>
                                </span>
                                <span class="nav-link-text">Nhận phòng</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent" data-bs-parent="#nhanphongNav" id="project-management3">
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link" id="chuanhanphong" name="notLink"
                                        onclick="setFilter('chuanhanphongOnly', 'Chưa', 7)">
                                        <span class="micon fa fa-times"></span>
                                        <span class="mtext">Chưa nhận phòng</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link" id="danhanphong" name="notLink"
                                        onclick="setFilter('nhanphongOnly', 'check', 7)">
                                        <span class="micon fa fa-check"></span>
                                        <span class="mtext">Đã nhận phòng</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </span>
                </li>
                <li class="nav-item">
                    <!-- parent pages--><span class="nav-item-wrapper">
                        <a class="nav-link {{ Request::is('showHuydatphong') || Request::is('showHuydatphong*') ? 'active' : '' }} dropdown-indicator label-1"
                            href="/showHuydatphong">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-times"></i>
                                </span>
                                <span class="nav-link-text">Hủy đặt phòng</span>
                            </div>
                        </a>
                    </span>
                </li>

                <script>
                    function removeActive() {
                        var filter = localStorage.getItem("filter");
                        if (filter == 'chuathanhtoanOnly' || filter == 'thanhtoanOnly' ||
                            filter == 'chuaxulyOnly' || filter == 'xulyOnly' ||
                            filter == 'chuanhanphongOnly' || filter == 'nhanphongOnly') {
                            var elements = document.getElementsByClassName(
                                'nav-link active'); // Select all elements with the class 'name'
                            if (elements)
                                elements[0].classList.remove('active'); // Remove the class 'name' from each element
                        }
                    }

                    @if (Request::is('datphongs') || Request::is('datphongs*'))
                        removeActive();
                    @else
                        localStorage.setItem("filter", "")
                    @endif

                    function setFilter(value, check, columnIndex) {
                        @if (Request::is('datphongs') || Request::is('datphongs*'))
                            // set localstorage and filter
                            localStorage.setItem("filter", value);
                            filterColumn(columnIndex, check);

                            // add active
                            var notLink = document.getElementsByName("notLink")
                            for (var i = 0; i < notLink.length; i++) {
                                if (notLink[i].classList.contains('active')) {
                                    notLink[i].classList.remove('active')
                                }
                            }

                            ////////////////
                            var thanhtoanNav = document.getElementById("thanhtoanNav")
                            if (value == 'chuathanhtoanOnly') {
                                var chuathanhtoanOnly = document.getElementById("chuathanhtoan")
                                chuathanhtoanOnly.classList.add("active")
                                thanhtoanNav.classList.add('active')
                            }
                            if (value == 'thanhtoanOnly') {
                                var thanhtoanOnly = document.getElementById("dathanhtoan")
                                thanhtoanOnly.classList.add("active")
                                thanhtoanNav.classList.add('active')
                            }
                            ////////////////
                            var xulyNav = document.getElementById("xulyNav")
                            if (value == 'chuaxulyOnly') {
                                var chuaxulyOnly = document.getElementById("chuaxuly")
                                chuaxulyOnly.classList.add("active")
                                xulyNav.classList.add('active')
                            }
                            if (value == 'xulyOnly') {
                                var xulyOnly = document.getElementById("daxuly")
                                xulyOnly.classList.add("active")
                                xulyNav.classList.add('active')
                            }
                            ////////////////
                            var nhanphongNav = document.getElementById("nhanphongNav")
                            if (value == 'chuanhanphongOnly') {
                                var chuanhanphongOnly = document.getElementById("chuanhanphong")
                                chuanhanphongOnly.classList.add("active")
                                nhanphongNav.classList.add('active')
                            }
                            if (value == 'nhanphongOnly') {
                                var nhanphongOnly = document.getElementById("danhanphong")
                                nhanphongOnly.classList.add("active")
                                nhanphongNav.classList.add('active')
                            }

                            removeActive()
                        @else
                            localStorage.setItem("filter", "")
                        @endif
                    }
                </script>

                @hasrole('Admin')
                    <!-- label-->
                    <p class="navbar-vertical-label">Admin</p>
                    <hr class="navbar-vertical-line">
                    <li class="nav-item">
                        <!-- parent pages--><span class="nav-item-wrapper">
                            <a class="nav-link {{ Request::is('catrucs') || Request::is('catrucs*') ? 'active' : '' }} dropdown-indicator label-1"
                                href="/catrucs">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown-indicator-icon">
                                        <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                    </div>
                                    <span class="nav-link-icon">
                                        <i class="fas fa-tasks"></i>
                                    </span>
                                    <span class="nav-link-text">Ca trực</span>
                                </div>
                            </a>
                        </span>
                    </li>
                    <li class="nav-item">
                        <!-- parent pages--><span class="nav-item-wrapper">
                            <a class="nav-link {{ Request::is('nhanviens') || Request::is('nhanviens*') ? 'active' : '' }} dropdown-indicator label-1"
                                href="/nhanviens">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown-indicator-icon">
                                        <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                    </div>
                                    <span class="nav-link-icon">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <span class="nav-link-text">Nhân viên</span>
                                </div>
                            </a>
                        </span>
                    </li>
                    <li class="nav-item">
                        <!-- parent pages--><span class="nav-item-wrapper">
                            <a class="nav-link {{ Request::is('users') || Request::is('users*') ? 'active' : '' }} dropdown-indicator label-1"
                                href="/users">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown-indicator-icon">
                                        <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                    </div>
                                    <span class="nav-link-icon">
                                        <i class="fas fa-user-circle"></i>
                                    </span>
                                    <span class="nav-link-text">Account</span>
                                </div>
                            </a>
                        </span>
                    </li>
                    <li class="nav-item">
                        <!-- parent pages--><span class="nav-item-wrapper">
                            <a class="nav-link {{ Request::is('roles') || Request::is('roles*') ? 'active' : '' }} dropdown-indicator label-1"
                                href="/roles">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown-indicator-icon">
                                        <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                    </div>
                                    <span class="nav-link-icon">
                                        <i class="fas fa-cog"></i>
                                    </span>
                                    <span class="nav-link-text">Role</span>
                                </div>
                            </a>
                        </span>
                    </li>
                @endhasrole
                <!-- label-->
                <p class="navbar-vertical-label">Tác vụ</p>
                <hr class="navbar-vertical-line">
                <li class="nav-item">
                    <!-- parent pages--><span class="nav-item-wrapper">
                        <a class="nav-link {{ Request::is('baocaos') || Request::is('baocaos*') ? 'active' : '' }} dropdown-indicator label-1"
                            href="/baocaos-index">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon">
                                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                                </div>
                                <span class="nav-link-icon">
                                    <i class="fas fa-file"></i>
                                </span>
                                <span class="nav-link-text">Báo cáo</span>
                            </div>
                        </a>
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <button class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 text-start white-space-nowrap">
            <i class="fas fa-arrow-left"></i>
            <span class="navbar-vertical-footer-text ms-2">Collapsed View</span>
        </button>
    </div>
</nav>
