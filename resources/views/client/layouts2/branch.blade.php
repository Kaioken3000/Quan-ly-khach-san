<!-- Services Section End -->
<section class="services-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Chi nhánh</span>
                    <h2>Khám phá các chi nhánh của chúng tôi</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($chinhanhs as $chinhanh)
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <img class="card-img-top" src="/client/images/{{ $chinhanh->hinhs[0]->vitri }}"
                            style="height: 200px; width: 300px">
                        <h4>{{ $chinhanh->ten }}</h4>
                        <p>Vị trí: {{ $chinhanh->thanhpho }}, {{ $chinhanh->quan }}</p>
                        <p>{!! $chinhanh->mieutas[0]->noidung !!}</p>
                        <a href="/client/chinhanhChitiet/{{ $chinhanh->id }}" class="primary-btn text-dark"
                            target="_blank">Xem chi tiết</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Services Section End -->
