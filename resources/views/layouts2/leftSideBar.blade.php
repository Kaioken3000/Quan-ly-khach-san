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
                        class="dropdown-toggle no-arrow {{ Request::is('dashboard') ? 'active' : '' }}">
                        <span class="micon fa fa-home"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('loaiphongs.index') }}"
                        class="dropdown-toggle no-arrow {{ Request::is('loaiphongs') || Request::is('loaiphongs*') ? 'active' : '' }}">
                        <span class="micon fa fa-list"></span><span class="mtext">Loại phòng</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('phongs.index') }}"
                        class="dropdown-toggle no-arrow {{ Request::is('phongs') || Request::is('phongs*') ? 'active' : '' }}">
                        <span class="micon fa fa-hotel"></span><span class="mtext">Phòng</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dichvus.index') }}"
                        class="dropdown-toggle no-arrow {{ Request::is('dichvus') || Request::is('dichvus*') ? 'active' : '' }}">
                        <span class="micon fa fa-wrench"></span><span class="mtext">Dịch vụ</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('khachhangs.index') }}"
                        class="dropdown-toggle no-arrow {{ Request::is('khachhangs') || Request::is('khachhangs*') ? 'active' : '' }}">
                        <span class="micon fa fa-users"></span><span class="mtext">Khách hàng</span>
                    </a>
                </li>
                <li>
                    <a href="/chatify"
                        class="dropdown-toggle no-arrow {{ Request::is('chatify') || Request::is('chatify*') ? 'active' : '' }}">
                        <span class="micon fa fa-comments"></span><span class="mtext">Chat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('datphongs.index') }}"
                        onclick="setFilter('', '', 6); setFilter('', '', 5); setFilter('', '', 7);"
                        class="dropdown-toggle no-arrow {{ Request::is('datphongs') || Request::is('datphongs*') ? 'active' : '' }}">
                        <span class="micon fa fa-bell"></span><span class="mtext">Quản lý đặt phòng</span>
                    </a>
                </li>
                {{-- Xu ly --}}
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" id="xulyNav" name="notLink">
                        <span class="micon fa fa-gear"></span>
                        <span class="mtext">Xử lý</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="#" onclick="setFilter('chuaxulyOnly', 'Chưa', 5)" id="chuaxuly"
                                name="notLink">Chưa xử lý</a></li>
                        <li><a href="#" onclick="setFilter('xulyOnly', 'Xác nhận', 5)" id="daxuly"
                                name="notLink">Đã xử lý</a> </li>
                    </ul>
                </li>
                {{-- Thanh toan --}}
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" id="thanhtoanNav" name="notLink">
                        <span class="micon fa fa-dollar"></span>
                        <span class="mtext">Thanh toán</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="#" onclick="setFilter('chuathanhtoanOnly', 'Chưa', 6)" id="chuathanhtoan"
                                name="notLink">Chưa thanh toán</a></li>
                        <li><a href="#" onclick="setFilter('thanhtoanOnly', 'Xác nhận', 6)" id="dathanhtoan"
                                name="notLink">Đã thanh toán</a> </li>
                    </ul>
                </li>

                {{-- Nhan phong --}}
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" id="nhanphongNav" name="notLink">
                        <span class="micon fa fa-check"></span>
                        <span class="mtext">Nhận phòng</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="#" onclick="setFilter('chuanhanphongOnly', 'Chưa', 7)" id="chuanhanphong"
                                name="notLink">Chưa nhận phòng</a></li>
                        <li><a href="#" onclick="setFilter('nhanphongOnly', 'Xác nhận', 7)" id="danhanphong"
                                name="notLink">Đã nhận phòng</a> </li>
                    </ul>
                </li>
                {{-- Huy dat phong --}}
                <li>
                    <a href="/showHuydatphong" class="dropdown-toggle no-arrow {{ Request::is('showHuydatphong') || Request::is('showHuydatphong*') ? 'active' : '' }}">
                        <span class="micon fa fa-times"></span><span class="mtext">Phòng đã hủy</span>
                    </a>
                </li>
                <script>
                    function removeActive() {
                        var filter = localStorage.getItem("filter");
                        if (filter == 'chuathanhtoanOnly' || filter == 'thanhtoanOnly' ||
                            filter == 'chuaxulyOnly' || filter == 'xulyOnly' ||
                            filter == 'chuanhanphongOnly' || filter == 'nhanphongOnly') {
                            var elements = document.getElementsByClassName(
                                'dropdown-toggle no-arrow active'); // Select all elements with the class 'name'
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
                    <li>
                        <div class="sidebar-small-cap">Admin</div>
                    </li>
                    <li>
                        <a href="{{ route('catrucs.index') }}"
                            class="dropdown-toggle no-arrow {{ Request::is('catrucs') || Request::is('catrucs*') ? 'active' : '' }}">
                            <span class="micon fa fa-tasks"></span><span class="mtext">Ca trực</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('nhanviens.index') }}"
                            class="dropdown-toggle no-arrow {{ Request::is('nhanviens') || Request::is('nhanviens*') ? 'active' : '' }}">
                            <span class="micon fa fa-user"></span><span class="mtext">Nhân viên</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}"
                            class="dropdown-toggle no-arrow {{ Request::is('users') || Request::is('users*') ? 'active' : '' }}">
                            <span class="micon fa fa-user-circle"></span><span class="mtext">Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('roles.index') }}"
                            class="dropdown-toggle no-arrow {{ Request::is('roles') || Request::is('roles*') ? 'active' : '' }}">
                            <span class="micon fa fa-cog"></span><span class="mtext">Role</span>
                        </a>
                    </li>
                @endhasrole

                <li>
                    <div class="sidebar-small-cap">Tác vụ</div>
                </li>
                <li>
                    <a href="{{ route('baocaos.index') }}"
                        class="dropdown-toggle no-arrow {{ Request::is('baocaos') || Request::is('baocaos*') ? 'active' : '' }}">
                        <span class="micon fa fa-file"></span><span class="mtext">Báo cáo</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
