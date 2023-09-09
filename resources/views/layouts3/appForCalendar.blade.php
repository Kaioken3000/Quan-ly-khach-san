<!DOCTYPE html>
<!-- saved from url=(0072)https://prium.github.io/phoenix/v1.6.0/dashboard/project-management.html -->
<html lang="en-US" dir="ltr" class="chrome windows fontawesome-i2svg-active fontawesome-i2svg-complete">

@include('layouts3.head')

<body>
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            @include('layouts3.sidebarLeft')

            @include('layouts3.header')

            <div class="content">

                <!-- ===============================================-->
                <!--    Main Content-->
                <!-- ===============================================-->
                @yield('content')
                <!-- ===============================================-->
                <!--    End of Main Content-->
                <!-- ===============================================-->

                @include('layouts3.footer')
            </div>
        </div>
    </main>

    @include('layouts3.themeCustom')

    <script>
        var navbarTopShape = localStorage.getItem('phoenixNavbarTopShape');
        var navbarPosition = localStorage.getItem('phoenixNavbarPosition');
        var body = document.querySelector('body');
        var navbarDefault = document.querySelector('#navbarDefault');
        var navbarTopNew = document.querySelector('#navbarTopNew');
        var navbarSlim = document.querySelector('#navbarSlim');
        var navbarTopSlimNew = document.querySelector('#navbarTopSlimNew');

        var documentElement = document.documentElement;
        var navbarVertical = document.querySelector('.navbar-vertical');

        if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
            navbarDefault.remove();
            navbarTopNew.remove();
            navbarTopSlimNew.remove();
            navbarSlim.style.display = 'block';
            navbarVertical.style.display = 'inline-block';
            body.classList.add('nav-slim');
        } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
            navbarDefault.remove();
            navbarVertical.remove();
            navbarTopNew.remove();
            navbarSlim.remove();
            navbarTopSlimNew.removeAttribute('style');
            body.classList.add('nav-slim');
        } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
            navbarDefault.remove();
            navbarSlim.remove();
            navbarVertical.remove();
            navbarTopSlimNew.remove();
            navbarTopNew.removeAttribute('style');
            documentElement.classList.add('navbar-horizontal')

        } else {
            body.classList.remove('nav-slim');
            navbarSlim.remove();
            navbarTopNew.remove();
            navbarTopSlimNew.remove();
            navbarDefault.removeAttribute('style');
            navbarVertical.removeAttribute('style');
        }

        var navbarTopStyle = localStorage.getItem('phoenixNavbarTopStyle');
        var navbarTop = document.querySelector('.navbar-top');
        if (navbarTopStyle === 'darker') {
            navbarTop.classList.add('navbar-darker');
        }

        var navbarVerticalStyle = localStorage.getItem('phoenixNavbarVerticalStyle');
        var navbarVertical = document.querySelector('.navbar-vertical');
        if (navbarVerticalStyle === 'darker') {
            navbarVertical.classList.add('navbar-darker');
        }
    </script>
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="/Phoenix_files/popper.min.js.download"></script>
    <script src="/Phoenix_files/bootstrap.min.js.download"></script>
    <script src="/Phoenix_files/anchor.min.js.download"></script>
    <script src="/Phoenix_files/is.min.js.download"></script>
    <script src="/Phoenix_files/all.min.js.download"></script>
    <script src="/Phoenix_files/lodash.min.js.download"></script>
    <script src="/Phoenix_files/polyfill.min.js.download"></script>
    <script src="/Phoenix_files/list.min.js.download"></script>
    <script src="/Phoenix_files/feather.min.js.download"></script>
    <script src="/Phoenix_files/dayjs.min.js.download"></script>
    <script src="/Phoenix_files/choices.min.js.download"></script>
    <script src="/Phoenix_files/echarts.min.js.download"></script>
    <script src="/Phoenix_files/dhtmlxgantt.js.download"></script>
    <script src="/Phoenix_files/phoenix.js.download"></script>
    <script src="/Phoenix_files/projectmanagement-dashboard.js.download"></script>
</body>

</html>
