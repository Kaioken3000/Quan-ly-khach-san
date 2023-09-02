<!-- login-register START -->
<ul class="nav flex-row align-items-center list-unstyled ms-xl-auto">

    <!-- login-register dropdown START -->
    <li class="nav-item"> <a class="nav-link {{ Request::is('client/login') ? 'active' : '' }} " href="/client/login">
            Đăng nhập</a>
    </li>
    <li class="nav-item"> <a class="nav-link {{ Request::is('client/register') ? 'active' : '' }} "
            href="/client/register">Đăng ký</a>
    </li>
    <!-- login-register dropdown END -->
</ul>
<!-- login-register and notification END -->
