<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Quản lý
</div>

<!-- Nav Item - Loại phòng -->
<li class="nav-item {{ Request::is('loaiphongs') || Request::is('loaiphongs/*') ? ' active' : '' }}">
    <a class="nav-link" href="{{ route('loaiphongs.index') }}">
        <i class="fas fa-fw fa-list-alt"></i>
        <span>Loại phòng</span></a>
</li>

<!-- Nav Item - Phòng -->
<li class="nav-item {{ Request::is('phongs') || Request::is('phongs/*') ? ' active' : '' }}">
    <a class="nav-link" href="{{ route('phongs.index') }}">
        <i class="fas fa-fw fa-hotel"></i>
        <span>Phòng</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Tác vụ
</div>

<!-- Nav Item - Báo cáo -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-file"></i>
        <span>Báo cáo</span></a>
</li>

<!-- Nav Item - Thống kê -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-chart-bar"></i>
        <span>Thống kê</span></a>
</li>