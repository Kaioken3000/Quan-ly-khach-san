<!DOCTYPE html>
<html lang="en">

@include('client.layouts3.head')

<body class="has-navbar-mobile">

    @include('client.layouts3.header')

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        @include('client.layouts3.banner')

        @include('client.layouts3.bestDeal')

        {{-- @include('client.layouts3.about') --}}

        @include('client.layouts3.featureHotel')

        {{-- @include('client.layouts3.clients') --}}

        {{-- @include('client.layouts3.testimonials') --}}

        @include('client.layouts3.nearby')

        {{-- @include('client.layouts3.downloadApp') --}}

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    @include('client.layouts3.footer')

    <!-- Back to top -->
    <div class="back-top"></div>

    @include('client.layouts3.navbarMobile')

    @include('client.layouts3.script')

</body>

</html>
