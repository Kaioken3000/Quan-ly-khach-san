<div class="col card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            {{-- <h3 class="mb-0">Thông tin tiền dịch vụ</h3> --}}
            <h4 class="card-title">Thông tin tiền dịch vụ</h4>
        </div>
        <div class="border-dashed border-bottom mt-4">
            <div class="ms-n2">
                <div class="row align-items-center mb-2 g-3">
                    <?php $tongtiendv = 0; ?>
                    @if ($dichvudatphongs)
                        @foreach ($dichvudatphongs as $dichvudatphong)
                            @if ($dichvudatphong)
                                <?php $tongtiendv += $dichvudatphong->dichvus->giatien; ?>
                                <div class="col-8 col-md-7 col-lg-8">
                                    <div class="d-flex align-items-center">
                                        <h6 class="fw-semi-bold text-1000 lh-base">
                                            {{ $dichvudatphong->dichvus->ten }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-2 col-md-3 col-lg-2">
                                    {{-- <h6 class="fs--2 mb-0">x1</h6> --}}
                                </div>
                                <div class="col-2 ps-0">
                                    <h5 class="mb-0 fw-semi-bold text-end">
                                        {{ number_format($dichvudatphong->dichvus->giatien, 0, '', '.') }}đ
                                    </h5>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    @if ($anuongdatphongs)
                        @foreach ($anuongdatphongs as $anuongdatphong)
                            @if ($anuongdatphong)
                                <?php $tongtiendv += $anuongdatphong->anuongs->gia * $anuongdatphong->soluong; ?>
                                <div class="col-8 col-md-7 col-lg-8">
                                    <div class="d-flex align-items-center">
                                        <h6 class="fw-semi-bold text-1000 lh-base">
                                            {{ $anuongdatphong->anuongs->ten }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-2 col-md-3 col-lg-2">
                                    <h6 class="fs--2 mb-0">x{{ $anuongdatphong->soluong }}</h6>
                                </div>
                                <div class="col-2 ps-0">
                                    <h5 class="mb-0 fw-semi-bold text-end">
                                        {{ number_format($anuongdatphong->anuongs->gia * $anuongdatphong->soluong, 0, '', '.') }}đ
                                    </h5>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between border-dashed-y pt-3">
            <h5 class="mb-0">Tổng cộng tiền dịch vụ :</h5>
            <h5 class="mb-0">{{ number_format($tongtiendv, 0, '', '.') }}đ</h5>
        </div>
    </div>
</div>
