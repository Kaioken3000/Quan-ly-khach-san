<div class="col card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            {{-- <h3 class="mb-0">Thông tin tiền phòng</h3> --}}
            <h4 class="card-title">Thông tin tiền phòng</h4>
        </div>
        <div class="border-dashed border-bottom mt-4">
            <div class="ms-n2">

                <div class="row align-items-center mb-2 g-3">
                    <?php
                    $i = 0;
                    $tonggia = 0;
                    $ngayhomnay = date('Y-m-d');
                    if (count($danhsachdatphongs) != 1) {
                        foreach ($danhsachdatphongs as $danhsachdatphong) {
                            $giatientungphong = 0;
                            $ngaybatdau = $danhsachdatphong->ngaybatdauo;
                            $ngayketthuc = $danhsachdatphong->ngayketthuco;
                            $songay1 = abs(round((strtotime($ngayketthuc) - strtotime($ngaybatdau)) / 86400));
                            $songay2 = abs(round((strtotime($ngayhomnay) - strtotime($ngaybatdau)) / 86400));
                            if ($i == 0) {
                                $giatientungphong += $danhsachdatphong->phongs->loaiphongs->gia * $songay1;
                            } elseif ($i != count($danhsachdatphongs) - 1) {
                                $giatientungphong += $danhsachdatphong->phongs->loaiphongs->gia * $songay1;
                            } else {
                                $giatientungphong += $danhsachdatphong->phongs->loaiphongs->gia * $songay2;
                            }

                            // lưu ngay ket thuc thuc te
                            $ngayketthucthucte = $danhsachdatphong->ngayketthuco;
                            if ($i == count($danhsachdatphongs) - 1) {
                                $ngayketthucthucte = $ngayhomnay;
                            }

                            // lưu so ngay o
                            $songngaythuc = 0;
                            if ($i != count($danhsachdatphongs) - 1 || $i == 0) {
                                $songngaythuc = $songay1;
                            } else {
                                $songngaythuc = $songay2;
                            }
                            
                            echo '
                                <div class="col-2">
                                    <div class="d-flex align-items-center">
                                        <h6 class="fw-semi-bold text-1000 lh-base">
                                        Phòng: '. $danhsachdatphong->phongid .'    
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <h6 class="fw-semi-bold text-1000 lh-base">
                                        '. $danhsachdatphong->phongs->loaiphongs->ten . '
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="fw-semi-bold text-1000 lh-base">
                                        Từ: ' . Carbon\Carbon::createFromFormat('Y-m-d', $danhsachdatphong->ngaybatdauo)->format('d-m-Y') . '
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="fw-semi-bold text-1000 lh-base">
                                        Đến: ' .  Carbon\Carbon::createFromFormat('Y-m-d', $ngayketthucthucte)->format('d-m-Y') . '
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="fw-semi-bold text-1000 lh-base">
                                        Đã ở: ' . $songngaythuc . ' ngày
                                    </h6>
                                </div>
                                <div class="col-2 ps-0">
                                    <h5 class="mb-0 fw-semi-bold text-end">
                                        '. number_format($danhsachdatphong->phongs->loaiphongs->gia*$songngaythuc, 0, '', '.') . 'đ   
                                    </h5>
                                </div> 
                            ';

                            $tonggia += $giatientungphong;
                            $i++;
                        }
                    } else {
                        foreach ($danhsachdatphongs as $danhsachdatphong) {
                            $ngaybatdau = $danhsachdatphong->ngaybatdauo;
                            $ngayketthuc = $danhsachdatphong->ngayketthuco;
                            $songay2 = abs(round((strtotime($ngayhomnay) - strtotime($ngaybatdau)) / 86400));
                            $tonggia += $danhsachdatphong->phongs->loaiphongs->gia * $songay2;

                            echo '
                                <div class="col-2">
                                    <div class="d-flex align-items-center">
                                        <h6 class="fw-semi-bold text-1000 lh-base">
                                        Phòng: '. $danhsachdatphong->phongid .'    
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <h6 class="fw-semi-bold text-1000 lh-base">
                                        '. $danhsachdatphong->phongs->loaiphongs->ten . '
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="fw-semi-bold text-1000 lh-base">
                                        Từ: ' . Carbon\Carbon::createFromFormat('Y-m-d', $danhsachdatphong->ngaybatdauo)->format('d-m-Y') . '
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="fw-semi-bold text-1000 lh-base">
                                        Đến: ' . Carbon\Carbon::createFromFormat('Y-m-d', $ngayhomnay)->format('d-m-Y') . '
                                    </h6>
                                </div>
                                <div class="col-2">
                                    <h6 class="fw-semi-bold text-1000 lh-base">
                                        Đã ở: ' . $songay2 . ' ngày
                                    </h6>
                                </div>
                                <div class="col-2 ps-0">
                                    <h5 class="mb-0 fw-semi-bold text-end">
                                        '. number_format($danhsachdatphong->phongs->loaiphongs->gia*$songay2, 0, '', '.') . 'đ   
                                    </h5>
                                </div> 
                            ';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="border-dashed border-bottom mt-4">
            <div class="d-flex justify-content-between mb-2">
                <h5 class="text-900 fw-semi-bold">Tổng số tiền phòng: </h5>
                <h5 class="text-900 fw-semi-bold">{{ number_format($tonggia, 0, '', '.') }}đ
                </h5>
            </div>

            <?php
            $tiendatcoc = App\Models\Thanhtoan::where('datphongid', $datphong->id)
                ->where('loaitien', 'datcoc')
                ->first();
            ?>
            @if ($tiendatcoc)
                <div class="d-flex justify-content-between mb-2">
                    <h5 class="text-900 fw-semi-bold">Trừ tiền đặt cọc: </h5>
                    <h5 class="text-danger text-900 fw-semi-bold">
                        -{{ number_format($tiendatcoc->gia, 0, '', '.') }}đ</h5>
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-between border-dashed-y pt-3">
            <h5 class="ms-0">Tổng cộng tiền phòng :</h5>
            <h5 class="ms-0">
                {{ number_format($tonggia - $tiendatcoc->gia, 0, '', '.') }}đ</h5>
        </div>
    </div>
</div>