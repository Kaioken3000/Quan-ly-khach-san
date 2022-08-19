<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">  

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Top bar -->
            @include('layouts.topbar')

            <!-- Main Content -->
            <div id="content">

                @include('layouts.company.create')

            </div>

            <!-- Footer -->
            @include('layouts.footer')

        </div>

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('layouts.logoutmodal')

    @include('layouts.scripts')

</body>

</html>