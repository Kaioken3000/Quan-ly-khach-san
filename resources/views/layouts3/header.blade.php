<nav class="navbar navbar-top navbar-expand" id="navbarDefault">
    <div class="collapse navbar-collapse justify-content-between">
        @include('layouts3.logo')
        @include('layouts3.search')
        <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                    <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark">
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Switch theme"
                        data-bs-original-title="Switch theme">
                        <i class="fas fa-moon"></i>
                    </label>
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Switch theme"
                        data-bs-original-title="Switch theme">
                        <i class="fas fa-sun"></i>
                    </label>
                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#"
                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-l ">
                        <img class="rounded-circle " src="/Phoenix_files/57.png" alt="">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        @auth
                            <div class="card-body p-0">
                                <div class="text-center pt-4 pb-3">
                                    <div class="avatar avatar-xl ">
                                        <img class="rounded-circle " src="/Phoenix_files/57.png" alt="">
                                    </div>
                                    <h6 class="mt-2 text-black">{{ Auth::user()->username }}</h6>
                                </div>
                            </div>
                        @endauth
                        <div class="overflow-auto scrollbar">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link px-3" href="/profile">
                                            <div class="d-flex gap-2">
                                                <i class="fas fa-user"></i>
                                                Profile
                                            </div>
                                        </a>
                                    </li>
                                @endauth
                                <li class="nav-item">
                                    <a class="nav-link px-3"
                                        href="https://prium.github.io/phoenix/v1.6.0/dashboard/project-management.html#settings-offcanvas"
                                        data-bs-toggle="offcanvas">
                                        <div class="d-flex gap-2">
                                            <i class="fas fa-gear"></i>
                                            Setting
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer p-0" style="border-top: 0px">
                            @auth
                                <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100"
                                        href="{{ route('logout.perform') }}">
                                        <i class="fas fa-sign-out"></i>
                                        <div class="mx-2">
                                            Sign out
                                        </div>
                                    </a>
                                </div>
                            @endauth
                            @guest
                                <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100"
                                        href="{{ route('login.perform') }}">
                                        <i class="fas fa-sign-out"></i>
                                        <div class="mx-2">
                                            Login
                                        </div>
                                    </a>
                                </div>
                                <br>
                                <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100"
                                        href="{{ route('login.perform') }}">
                                        <i class="fas fa-sign-out"></i>
                                        <div class="mx-2">
                                            Register
                                        </div>
                                    </a>
                                </div>
                            @endguest
                            <div class="my-2 text-center fw-bold fs--2 text-600">
                                <a class="text-600 me-1" href="#">Privacy policy</a>•
                                <a class="text-600 mx-1" href="#">Terms</a>•
                                <a class="text-600 ms-1" href="#">Cookies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
