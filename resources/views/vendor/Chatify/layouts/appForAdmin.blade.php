@include('layouts3.head')

<body>
    <main class="main" id="top">
        <div class="container-fluid px-0" data-layout="container">
            @include('layouts3.sidebarLeft')

            @include('layouts3.header')

            <div class="content" style="padding: 65px 0px 0px 0px">

                <!-- ===============================================-->
                <!--    Main Content-->
                <!-- ===============================================-->
                @include('Chatify::layouts.message')
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
