<!-- ======================= Near by START -->
<section>
    <div class="container">
        <!-- Title -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="mb-0">Chi nhánh</h2>
            </div>
        </div>

        <div class="row g-4 g-md-5">
            @foreach ($chinhanhs as $chinhanh)
                <!-- Card item START -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card bg-transparent text-center p-1 h-100">
                        <!-- Image -->
                        {{-- <img src="/booking/assets/images/category/hotel/nearby/01.jpg" class="rounded-circle"
                            alt=""> --}}
                        <img src="/client/images/{{ $chinhanh->hinhs[0]->vitri }}" class="rounded-circle img-fluid"
                            style="height: 150px">

                        <div class="card-body p-0 pt-3">
                            <h5 class="card-title"><a href="/client/chinhanhChitiet/{{ $chinhanh->id }}"
                                    target="_blank"class="stretched-link">{{ $chinhanh->ten }}</a>
                            </h5>
                            <span>{{ $chinhanh->thanhpho }}</span>
                        </div>
                    </div>
                </div>
                <!-- Card item END -->
            @endforeach
        </div>
</section>
<!-- ======================= Near by END -->
