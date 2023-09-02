<!-- ======================= Featured Hotels START -->
<section>
    <div class="container">

        <!-- Title -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="mb-0">Phòng</h2>
            </div>
        </div>

        <!-- ======================= Best deal START -->
        <section class="pb-2 pb-lg-5">
            <div class="container">
                <!-- Slider START -->
                <div class="tiny-slider arrow-round arrow-blur arrow-hover">
                    <div class="tiny-slider-inner" data-autoplay="true" data-arrow="true" data-edge="2" data-dots="false"
                        data-items-xl="4" data-items-lg="2" data-items-md="1">

                        @foreach ($phongs as $phong)
                            <!-- Slider item -->
                            <div>
                                <!-- Card START -->
                                <div class="card card-img-scale overflow-hidden bg-transparent">
                                    <!-- Image and overlay -->
                                    <div class="card-img-scale-wrapper rounded-3">
                                        <!-- Image -->
                                        {{-- <img src="/booking/assets/images/category/hotel/01.jpg" class="card-img"
                                            alt="hotel image"> --}}
                                        <img src="/client/images/{{$phong->hinhs[0]->vitri}}" class="card-img"
                                            alt="hotel image" style="height: 400px; object-fit: cover;">
                                        <!-- Badge -->
                                        <div class="position-absolute bottom-0 start-0 p-3">
                                            <div class="badge text-bg-dark fs-6 rounded-pill stretched-link"><i
                                                    class="bi bi-geo-alt me-2"></i>{{ $phong->chinhanhs->thanhpho }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card body -->
                                    <div class="card-body px-2">
                                        <!-- Title -->
                                        <h5 class="card-title"><a href="/client/chitietphong/{{ $phong->so_phong }}" target="_blank"
                                                class="stretched-link">{{ $phong->loaiphongs->ten }}-{{ $phong->so_phong }}
                                            </a></h5>
                                        <!-- Price and rating -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="text-success mb-0">{{ $phong->loaiphongs->gia }} <small
                                                    class="fw-light">/đêm</small>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card END -->
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- Slider END -->
            </div>
        </section>
        <!-- ======================= Best deal END -->


        {{-- <div class="row g-4">
            <!-- Hotel item -->
            <div class="col-sm-6 col-xl-3">
                <!-- Card START -->
                <div class="card card-img-scale overflow-hidden bg-transparent">
                    <!-- Image and overlay -->
                    <div class="card-img-scale-wrapper rounded-3">
                        <!-- Image -->
                        <img src="/booking/assets/images/category/hotel/01.jpg" class="card-img" alt="hotel image">
                        <!-- Badge -->
                        <div class="position-absolute bottom-0 start-0 p-3">
                            <div class="badge text-bg-dark fs-6 rounded-pill stretched-link"><i
                                    class="bi bi-geo-alt me-2"></i>New York</div>
                        </div>
                    </div>

                    <!-- Card body -->
                    <div class="card-body px-2">
                        <!-- Title -->
                        <h5 class="card-title"><a href="hotel-detail.html" class="stretched-link">Baga
                                Comfort</a></h5>
                        <!-- Price and rating -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-success mb-0">$455 <small class="fw-light">/starting at</small>
                            </h6>
                            <h6 class="mb-0">4.5<i class="fa-solid fa-star text-warning ms-1"></i></h6>
                        </div>
                    </div>
                </div>
                <!-- Card END -->
            </div>

            <!-- Hotel item -->
            <div class="col-sm-6 col-xl-3">
                <!-- Card START -->
                <div class="card card-img-scale overflow-hidden bg-transparent">
                    <!-- Image and overlay -->
                    <div class="card-img-scale-wrapper rounded-3">
                        <!-- Image -->
                        <img src="/booking/assets/images/category/hotel/02.jpg" class="card-img" alt="hotel image">
                        <!-- Badge -->
                        <div class="position-absolute bottom-0 start-0 p-3">
                            <div class="badge text-bg-dark fs-6 rounded-pill stretched-link"><i
                                    class="bi bi-geo-alt me-2"></i>California</div>
                        </div>
                    </div>

                    <!-- Card body -->
                    <div class="card-body px-2">
                        <!-- Title -->
                        <h5 class="card-title"><a href="hotel-detail.html" class="stretched-link">New
                                Apollo
                                Hotel</a></h5>
                        <!-- Price and rating -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-success mb-0">$585 <small class="fw-light">/starting at</small>
                            </h6>
                            <h6 class="mb-0">4.8<i class="fa-solid fa-star text-warning ms-1"></i></h6>
                        </div>
                    </div>
                </div>
                <!-- Card END -->
            </div>

            <!-- Hotel item -->
            <div class="col-sm-6 col-xl-3">
                <!-- Card START -->
                <div class="card card-img-scale overflow-hidden bg-transparent">
                    <!-- Image and overlay -->
                    <div class="card-img-scale-wrapper rounded-3">
                        <!-- Image -->
                        <img src="/booking/assets/images/category/hotel/03.jpg" class="card-img" alt="hotel image">
                        <!-- Badge -->
                        <div class="position-absolute bottom-0 start-0 p-3">
                            <div class="badge text-bg-dark fs-6 rounded-pill stretched-link"><i
                                    class="bi bi-geo-alt me-2"></i>Los Angeles</div>
                        </div>
                    </div>

                    <!-- Card body -->
                    <div class="card-body px-2">
                        <!-- Title -->
                        <h5 class="card-title"><a href="hotel-detail.html" class="stretched-link">New Age
                                Hotel</a></h5>
                        <!-- Price and rating -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-success mb-0">$385 <small class="fw-light">/starting at</small>
                            </h6>
                            <h6 class="mb-0">4.6<i class="fa-solid fa-star text-warning ms-1"></i></h6>
                        </div>
                    </div>
                </div>
                <!-- Card END -->
            </div>

            <!-- Hotel item -->
            <div class="col-sm-6 col-xl-3">
                <!-- Card START -->
                <div class="card card-img-scale overflow-hidden bg-transparent">
                    <!-- Image and overlay -->
                    <div class="card-img-scale-wrapper rounded-3">
                        <!-- Image -->
                        <img src="/booking/assets/images/category/hotel/04.jpg" class="card-img" alt="hotel image">
                        <!-- Badge -->
                        <div class="position-absolute bottom-0 start-0 p-3">
                            <div class="badge text-bg-dark fs-6 rounded-pill stretched-link"><i
                                    class="bi bi-geo-alt me-2"></i>Chicago</div>
                        </div>
                    </div>

                    <!-- Card body -->
                    <div class="card-body px-2">
                        <!-- Title -->
                        <h5 class="card-title"><a href="hotel-detail.html" class="stretched-link">Helios
                                Beach
                                Resort</a></h5>
                        <!-- Price and rating -->
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-success mb-0">$665 <small class="fw-light">/starting at</small>
                            </h6>
                            <h6 class="mb-0">4.8<i class="fa-solid fa-star text-warning ms-1"></i></h6>
                        </div>
                    </div>
                </div>
                <!-- Card END -->
            </div>
        </div> --}}
        <!-- Row END -->
    </div>
</section>
<!-- ======================= Featured Hotels END -->
