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

    @include('layouts2.script')

</body>

</html>
