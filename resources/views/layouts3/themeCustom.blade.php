<div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1"
    aria-labelledby="settings-offcanvas">
    <div class="offcanvas-header align-items-start border-bottom flex-column">
        <div class="pt-1 w-100 mb-6 d-flex justify-content-between align-items-start">
            <div>
                <h5 class="mb-2 me-2 lh-sm"><svg class="svg-inline--fa fa-palette me-2 fs-0" aria-hidden="true"
                        focusable="false" data-prefix="fas" data-icon="palette" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M512 255.1C512 256.9 511.1 257.8 511.1 258.7C511.6 295.2 478.4 319.1 441.9 319.1H344C317.5 319.1 296 341.5 296 368C296 371.4 296.4 374.7 297 377.9C299.2 388.1 303.5 397.1 307.9 407.8C313.9 421.6 320 435.3 320 449.8C320 481.7 298.4 510.5 266.6 511.8C263.1 511.9 259.5 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256V255.1zM96 255.1C78.33 255.1 64 270.3 64 287.1C64 305.7 78.33 319.1 96 319.1C113.7 319.1 128 305.7 128 287.1C128 270.3 113.7 255.1 96 255.1zM128 191.1C145.7 191.1 160 177.7 160 159.1C160 142.3 145.7 127.1 128 127.1C110.3 127.1 96 142.3 96 159.1C96 177.7 110.3 191.1 128 191.1zM256 63.1C238.3 63.1 224 78.33 224 95.1C224 113.7 238.3 127.1 256 127.1C273.7 127.1 288 113.7 288 95.1C288 78.33 273.7 63.1 256 63.1zM384 191.1C401.7 191.1 416 177.7 416 159.1C416 142.3 401.7 127.1 384 127.1C366.3 127.1 352 142.3 352 159.1C352 177.7 366.3 191.1 384 191.1z">
                        </path>
                    </svg>
                    <!-- <span class="fas fa-palette me-2 fs-0"></span> Font Awesome fontawesome.com -->Theme
                    Customizer
                </h5>
                <p class="mb-0 fs--1">Explore different styles according to your preferences</p>
            </div><button class="btn p-1 fw-bolder" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                    class="svg-inline--fa fa-xmark fs-0" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                    data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z">
                    </path>
                </svg><!-- <span class="fas fa-times fs-0"> </span> Font Awesome fontawesome.com --></button>
        </div><button class="btn btn-phoenix-secondary w-100" data-theme-control="reset"><svg
                class="svg-inline--fa fa-arrows-rotate me-2 fs--2" aria-hidden="true" focusable="false"
                data-prefix="fas" data-icon="arrows-rotate" role="img" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor"
                    d="M464 16c-17.67 0-32 14.31-32 32v74.09C392.1 66.52 327.4 32 256 32C161.5 32 78.59 92.34 49.58 182.2c-5.438 16.81 3.797 34.88 20.61 40.28c16.89 5.5 34.88-3.812 40.3-20.59C130.9 138.5 189.4 96 256 96c50.5 0 96.26 24.55 124.4 64H336c-17.67 0-32 14.31-32 32s14.33 32 32 32h128c17.67 0 32-14.31 32-32V48C496 30.31 481.7 16 464 16zM441.8 289.6c-16.92-5.438-34.88 3.812-40.3 20.59C381.1 373.5 322.6 416 256 416c-50.5 0-96.25-24.55-124.4-64H176c17.67 0 32-14.31 32-32s-14.33-32-32-32h-128c-17.67 0-32 14.31-32 32v144c0 17.69 14.33 32 32 32s32-14.31 32-32v-74.09C119.9 445.5 184.6 480 255.1 480c94.45 0 177.4-60.34 206.4-150.2C467.9 313 458.6 294.1 441.8 289.6z">
                </path>
            </svg><!-- <span class="fas fa-arrows-rotate me-2 fs--2"></span> Font Awesome fontawesome.com -->Reset
            to
            default</button>
    </div>
    <div class="offcanvas-body scrollbar px-card pt-2" id="themeController">
        <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Color Scheme</h5>
            <div class="row gx-2">
                <div class="col-6"><input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio"
                        value="light" data-theme-control="phoenixTheme" checked="true"><label
                        class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span
                            class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                                src="/Phoenix_files/default-light.png" alt=""></span><span
                            class="label-text">Light</span></label>
                </div>
                <div class="col-6"><input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio"
                        value="dark" data-theme-control="phoenixTheme"><label
                        class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span
                            class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                                src="/Phoenix_files/default-dark.png" alt=""></span><span class="label-text">
                            Dark</span></label>
                </div>
            </div>
        </div>
        <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Navigation Type</h5>
            <div class="row gx-2">
                <div class="col-6"><input class="btn-check" id="navbarPositionVertical" name="navigation-type"
                        type="radio" value="vertical" data-theme-control="phoenixNavbarPosition" checked="true"><label
                        class="btn d-inline-block btn-navbar-style fs--1" for="navbarPositionVertical"> <span
                            class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none"
                                src="/Phoenix_files/default-light.png" alt=""><img
                                class="img-fluid img-prototype d-light-none" src="/Phoenix_files/default-dark.png"
                                alt=""></span><span class="label-text">Vertical</span></label>
                </div>
                <div class="col-6"><input class="btn-check" id="navbarPositionHorizontal" name="navigation-type"
                        type="radio" value="horizontal" data-theme-control="phoenixNavbarPosition"><label
                        class="btn d-inline-block btn-navbar-style fs--1" for="navbarPositionHorizontal"> <span
                            class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none"
                                src="/Phoenix_files/top-default.png" alt=""><img
                                class="img-fluid img-prototype d-light-none" src="/Phoenix_files/top-default-dark.png"
                                alt=""></span><span class="label-text">
                            Horizontal</span></label></div>
            </div>
        </div>
        <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Vertical Navbar Appearance</h5>
            <div class="row gx-2">
                <div class="col-6"><input class="btn-check" id="navbar-style-default" type="radio"
                        name="config.name" value="default" data-theme-control="phoenixNavbarVerticalStyle"
                        checked="true"><label class="btn d-block w-100 btn-navbar-style fs--1"
                        for="navbar-style-default"> <img class="img-fluid img-prototype d-dark-none"
                            src="/Phoenix_files/default-light.png" alt=""><img
                            class="img-fluid img-prototype d-light-none" src="/Phoenix_files/default-dark.png"
                            alt=""><span class="label-text d-dark-none"> Default</span><span
                            class="label-text d-light-none">Default</span></label></div>
                <div class="col-6"><input class="btn-check" id="navbar-style-dark" type="radio"
                        name="config.name" value="darker" data-theme-control="phoenixNavbarVerticalStyle"><label
                        class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-dark"> <img
                            class="img-fluid img-prototype d-dark-none" src="/Phoenix_files/vertical-darker.png"
                            alt=""><img class="img-fluid img-prototype d-light-none"
                            src="/Phoenix_files/vertical-lighter.png" alt=""><span
                            class="label-text d-dark-none"> Darker</span><span
                            class="label-text d-light-none">Lighter</span></label></div>
            </div>
        </div>
        <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Horizontal Navbar Shape</h5>
            <div class="row gx-2">
                <div class="col-6"><input class="btn-check" id="navbarShapeDefault" name="navbar-shape"
                        type="radio" value="default" data-theme-control="phoenixNavbarTopShape"
                        checked="true"><label class="btn d-inline-block btn-navbar-style fs--1"
                        for="navbarShapeDefault"> <span class="mb-2 rounded d-block"><img
                                class="img-fluid img-prototype d-dark-none mb-0" src="/Phoenix_files/top-default.png"
                                alt=""><img class="img-fluid img-prototype d-light-none mb-0"
                                src="/Phoenix_files/top-default-dark.png" alt=""></span><span
                            class="label-text">Default</span></label></div>
                <div class="col-6"><input class="btn-check" id="navbarShapeSlim" name="navbar-shape"
                        type="radio" value="slim" data-theme-control="phoenixNavbarTopShape"><label
                        class="btn d-inline-block btn-navbar-style fs--1" for="navbarShapeSlim"> <span
                            class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0"
                                src="/Phoenix_files/top-slim.png" alt=""><img
                                class="img-fluid img-prototype d-light-none mb-0"
                                src="/Phoenix_files/top-slim-dark.png" alt=""></span><span
                            class="label-text"> Slim</span></label></div>
            </div>
        </div>
        <div class="setting-panel-item">
            <h5 class="setting-panel-item-title">Horizontal Navbar Appearance</h5>
            <div class="row gx-2">
                <div class="col-6"><input class="btn-check" id="navbarTopDefault" name="navbar-top-style"
                        type="radio" value="default" data-theme-control="phoenixNavbarTopStyle"
                        checked="true"><label class="btn d-inline-block btn-navbar-style fs--1"
                        for="navbarTopDefault"> <span class="mb-2 rounded d-block"><img
                                class="img-fluid img-prototype d-dark-none mb-0" src="/Phoenix_files/top-default.png"
                                alt=""><img class="img-fluid img-prototype d-light-none mb-0"
                                src="/Phoenix_files/top-style-darker.png" alt=""></span><span
                            class="label-text">Default</span></label></div>
                <div class="col-6"><input class="btn-check" id="navbarTopDarker" name="navbar-top-style"
                        type="radio" value="darker" data-theme-control="phoenixNavbarTopStyle"><label
                        class="btn d-inline-block btn-navbar-style fs--1" for="navbarTopDarker"> <span
                            class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0"
                                src="/Phoenix_files/navbar-top-style-light.png" alt=""><img
                                class="img-fluid img-prototype d-light-none mb-0"
                                src="/Phoenix_files/top-style-lighter.png" alt=""></span><span
                            class="label-text d-dark-none">Darker</span><span
                            class="label-text d-light-none">Lighter</span></label></div>
            </div>
        </div>
        {{-- <a class="bun btn-primary d-grid mb-3 text-white dark__text-100 mt-5 btn btn-primary"
            href="https://prium.github.io/phoenix/v1.6.0/dashboard/project-management.html#!" target="_blank">Purchase
            template</a> --}}
    </div>
</div>
{{-- <a class="card setting-toggle"
    href="https://prium.github.io/phoenix/v1.6.0/dashboard/project-management.html#settings-offcanvas"
    data-bs-toggle="offcanvas">
    <div class="card-body d-flex align-items-center px-2 py-1">
        <div class="position-relative rounded-start" style="height:34px;width:28px">
            <div class="settings-popover"><span class="ripple"><span
                        class="fa-spin position-absolute all-0 d-flex flex-center"><span
                            class="icon-spin position-absolute all-0 d-flex flex-center">
                            <i class="fas fa-gear"></i></span></span></span></div>
        </div><small class="text-uppercase text-700 fw-bold py-2 pe-2 ps-1 rounded-end">customize</small>
    </div>
</a> --}}
