<!DOCTYPE html>
<html>

@include('layouts2.head')

<body>

    {{-- @include('layouts2.loading') --}}

    @include('layouts2.header')

    @include('layouts2.rightSideBar')

    @include('layouts2.leftSideBar')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">

            {{-- @include('layouts2.title', ['titlePage' => '']) --}}
            @yield('content')

        </div>
    </div>

    {{-- @include('layouts2.script') --}}
    <!-- js -->
    {{-- <script src="/bootstrap4/vendors/scripts/core.js"></script> --}}
    <script src="/bootstrap4/vendors/scripts/script.min.js"></script>
    <script src="/bootstrap4/vendors/scripts/process.js"></script>
    <script src="/bootstrap4/vendors/scripts/layout-settings.js"></script>
    <script src="/bootstrap4/src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="/bootstrap4/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/bootstrap4/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="/bootstrap4/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="/bootstrap4/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="/bootstrap4/vendors/scripts/dashboard3.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


</body>

</html>
