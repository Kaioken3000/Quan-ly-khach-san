<!DOCTYPE html>
<html lang="en">

@include('client.layouts3.head')

<body class="has-navbar-mobile">

    @include('client.layouts3.header')

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- ======================= Hotel grid START -->
        <section class="pt-4">
            <div class="container">
                <div class="row g-4">
                    @foreach ($chinhanhs as $chinhanh)
                        <!-- Card item START -->
                        <div class="col-md-6 col-xl-4">
                            <div class="card shadow p-2 pb-0 h-100">
                                <!-- Overlay item -->

                                <!-- Slider START -->
                                <div class="tiny-slider arrow-round arrow-xs arrow-dark rounded-2 overflow-hidden">
                                    <div class="tiny-slider-inner" data-autoplay="false" data-arrow="true"
                                        data-dots="false" data-items="1">
                                        @foreach ($chinhanh->hinhs as $hinh)
                                            <!-- Image item -->
                                            <div>
                                                <img src="/client/images/{{ $hinh->vitri }}" alt="Card image"
                                                    style="height: 250px">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Slider END -->

                                <!-- Card body START -->
                                <div class="card-body px-3 pb-0">
                                    <!-- Rating and cart -->
                                    <div class="d-flex justify-content-between mb-3">
                                        <a href="#" class="badge bg-dark text-white"><i
                                                class="bi fa-fw bi-star-fill me-2 text-warning"></i>4.5</a>
                                        <a href="#" class="h6 mb-0 z-index-2"><i
                                                class="bi fa-fw bi-bookmark"></i></a>
                                    </div>

                                    <!-- Title -->
                                    <h5 class="card-title"><a href="hotel-detail.html">{{ $chinhanh->ten }}</a></h5>

                                    <!-- List -->

                                    <div class="mieuta">
                                        @foreach ($chinhanh->mieutas as $mieuta)
                                            {!! $mieuta->noidung !!}
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Card body END -->

                                <!-- Card footer START-->
                                <div class="card-footer pt-0">
                                    <!-- Price and Button -->
                                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                                        <!-- Button -->
                                        <div class="mt-2 mt-sm-0">
                                            <a href="/client/chinhanhChitiet/{{ $chinhanh->id }}"
                                                class="btn btn-sm btn-primary-soft mb-0 w-100">Chi tiết<i
                                                    class="bi bi-arrow-right ms-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                    @endforeach
                </div>
                <!-- Row END -->

            </div>
        </section>
        <!-- ======================= Hotel grid END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    @include('client.layouts3.footer')

    <!-- Back to top -->
    <div class="back-top"></div>

    @include('client.layouts3.navbarMobile')

    @include('client.layouts3.script')

</body>

</html>
