@include('layouts2.head')
<style>
    #accordion-menu svg {
        width: 20px;
        margin-left: 10px;
        font-weight: 10px
    }

</style>

<body>
    @include('layouts2.rightSideBar')

    @include('layouts2.leftSideBar')

    <div class="mobile-menu-overlay"></div>

    <div style="padding-left: 280px">
        {{-- Message start --}}

        @include('Chatify::layouts.message')

        {{-- Message end --}}
    </div>

    @include('layouts2.script')

</body>
