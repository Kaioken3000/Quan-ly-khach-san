<!DOCTYPE html>
<!-- saved from url=(0072)https://prium.github.io/phoenix/v1.6.0/dashboard/project-management.html -->
<html lang="en-US" dir="ltr" class="chrome windows fontawesome-i2svg-active fontawesome-i2svg-complete">

@include('layouts3.head')

<body>
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            @include('layouts3.sidebarLeft')

            @include('layouts3.header')
            
            <div class="content ">

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

    @include('layouts3.script')
</body>

</html>
