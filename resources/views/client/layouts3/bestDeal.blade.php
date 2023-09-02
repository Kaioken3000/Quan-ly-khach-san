<!-- ======================= Best deal START -->
<section class="pb-2 pb-lg-5">
    <div class="container">
        <!-- Slider START -->
        <div class="tiny-slider arrow-round arrow-blur arrow-hover">
            <div class="tiny-slider-inner" data-autoplay="true" data-arrow="true" data-edge="2" data-dots="false"
                data-items-xl="3" data-items-lg="2" data-items-md="1">

                @foreach ($anuongs as $anuong)
                    <!-- Slider item -->
                    <div>
                        <div class="card border rounded-3 overflow-hidden">
                            <div class="row g-0 align-items-center">
                                <!-- Image -->
                                <div class="col-sm-6">
                                    {{-- <img src="/booking/assets/images/offer/01.jpg" class="card-img rounded-0"
                                        alt=""> --}}
                                    <div style="height: 160px" class="d-flex">
                                        <img src="/client/images/{{ $anuong->hinh }}"
                                            class="card-img rounded-0 img-fluid">
                                    </div>
                                </div>

                                <!-- Title and content -->
                                <div class="col-sm-6">
                                    <div class="card-body px-3">
                                        <h6 class="card-title"><a href="#"
                                                class="stretched-link">{{ $anuong->ten }}</a>
                                        </h6>
                                        <p class="mb-0">{{ $anuong->mieuTa }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- Slider END -->
    </div>
</section>
<!-- ======================= Best deal END -->
