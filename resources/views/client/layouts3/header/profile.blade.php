<!-- Profile and notification START -->
<ul class="nav flex-row align-items-center list-unstyled ms-xl-auto">

    <!-- Profile dropdown START -->
    <li class="nav-item ms-3 dropdown">
        <!-- Avatar -->
        <a class="avatar avatar-sm p-0" href="/client/khachhang" id="profileDropdown" role="button" data-bs-auto-close="outside"
            data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="avatar-img rounded-2" src="/booking/assets/images/avatar/01.jpg" alt="avatar">
        </a>

        <!-- Profile dropdown START -->
        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
            <!-- Profile info -->
            <li class="px-3 mb-3">
                <div class="d-flex align-items-center">
                    <!-- Avatar -->
                    <div class="avatar me-3">
                        <img class="avatar-img rounded-circle shadow" src="/booking/assets/images/avatar/01.jpg"
                            alt="avatar">
                    </div>
                    <div>
                        <a class="h6 mt-2 mt-sm-0" href="/client/khachhang">{{ auth()->user()->username }}</a>
                        <p class="small m-0">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </li>

            <!-- Links -->
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/client/danhsachdatphong"><i
                        class="bi bi-bookmark-check fa-fw me-2"></i>Danh sách đặt phòng</a></li>
            <li><a class="dropdown-item bg-danger-soft-hover" href="{{ route('client.logout') }}"><i
                        class="bi bi-power fa-fw me-2"></i>Đăng xuất</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>

            @include('client.layouts3.header.darkModeOption')
        </ul>
        <!-- Profile dropdown END -->
    </li>
    <!-- Profile dropdown END -->
</ul>
<!-- Profile and notification END -->
