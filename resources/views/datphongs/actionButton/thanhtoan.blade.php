<div class="my-1 col-4">
    <button type="button" class="badge bg-danger" data-bs-toggle="modal"
        data-bs-target="#modalthanhtoan{{ $datphong->datphongid }}">
        <i class="fa fa-dollar"></i> Thanh toán
    </button>
</div>
<!-- Modal thanh toán -->
<div class="modal fade" id="modalthanhtoan{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"> Bạn có chắc chắn muốn thanh toán</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form class="m-1" action="{{ route('datphongs.thanhtoan', $datphong->datphongid) }}" method="Post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                            <div>
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
                                        echo ' <h5 class="mb-3">' . 'Phòng: ' . $danhsachdatphong->phongid . '</h5>';
                                        echo ' <h5 class="mb-3">' . $danhsachdatphong->phongs->loaiphongs->ten . '-' . $danhsachdatphong->phongs->loaiphongs->gia . ' VND' . '</h5>';
                                
                                        echo '<p class=""> Ngày bắt đầu ở: ' . $danhsachdatphong->ngaybatdauo . '</p>';
                                
                                        echo '<p class=""> Ngày kết thúc ở: ' . $danhsachdatphong->ngayketthuco . '</p>';
                                
                                        if ($i == count($danhsachdatphongs) - 1) {
                                            echo '<p class=""> Ngày kết thúc ở thực tế: ' . $ngayhomnay . '</p>';
                                        }
                                
                                        if ($i != count($danhsachdatphongs) - 1 || $i == 0) {
                                            echo '<p class=""> Số ngày ở: ' . $songay1 . '</p>';
                                        } else {
                                            echo '<p class=""> Số ngày ở: ' . $songay2 . '</p>';
                                        }
                                
                                        echo ' <p class="badge bg-primary" />' . $giatientungphong . ' VND</p><br>';
                                        $tonggia += $giatientungphong;
                                        $i++;
                                    }
                                } else {
                                    foreach ($danhsachdatphongs as $danhsachdatphong) {
                                        $ngaybatdau = $danhsachdatphong->ngaybatdauo;
                                        $ngayketthuc = $danhsachdatphong->ngayketthuco;
                                        $songay2 = abs(round((strtotime($ngayhomnay) - strtotime($ngaybatdau)) / 86400));
                                        $tonggia += $danhsachdatphong->phongs->loaiphongs->gia * $songay2;
                                        echo '<p class="">' . $danhsachdatphong->phongid . '-' . $danhsachdatphong->phongs->loaiphongs->ten . '-' . $danhsachdatphong->phongs->loaiphongs->gia . '</p>';
                                
                                        echo '<p class=""> Ngày bắt đầu ở: ' . $danhsachdatphong->ngaybatdauo . '</p>';
                                
                                        echo '<p class=""> Ngày kết thúc ở: ' . $danhsachdatphong->ngayketthuco . '</p>';
                                
                                        echo '<p class=""> Số ngày ở: ' . $songay2 . '</p>';
                                
                                        echo ' <p class="badge bg-primary" />' . $tonggia . '</p><br>';
                                    }
                                }
                                ?>
                            </div>
                            {{-- Truc tiep --}}
                        </div>
                        <div class="mb-3 col">
                            <?php
                            $tiendatcoc = App\Models\Thanhtoan::where('khachhangid', $datphong->id)
                                ->where('loaitien', 'datcoc')
                                ->first();
                            ?>
                            <h5 class="">Tổng số tiền phòng</h5>
                            <input type="text" name="tongsotien" class="form-control" id="tongsotien"
                                placeholder="VD: 300" value="{{ $tonggia }}" readonly />
                            @error('tongsotien')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror

                            {{-- tien dat coc --}}
                            @if ($tiendatcoc)
                                <h5 class="mt-3">-Trừ số tiền đặt cọc</h5>
                                <input type="text" name="tiendatcoc" class="form-control" id="tiendatcoc"
                                    placeholder="VD: 300" value="{{ $tiendatcoc->gia }}" readonly />
                            @endif
                            <h5 class="mt-3">Còn lại</h5>
                            <input type="text" class="form-control" value="<?php echo $tonggia - $tiendatcoc->gia; ?>">
                            <br>
                        </div>
                        <div class="col">
                            {{-- tien dich vu --}}
                            <h5 class="">Cộng số tiền dịch vụ</h5>
                            <?php $tongtiendv = 0; ?>

                            @if ($dichvudatphongs)
                                @foreach ($dichvudatphongs as $dichvudatphong)
                                    @if ($dichvudatphong)
                                        <?php $tongtiendv += $dichvudatphong->dichvus->giatien; ?>

                                        <label class="form-label"
                                            for="tiendichvu">{{ $dichvudatphong->dichvus->ten }}</label>
                                        <input type="text" name="tiendichvu" class="form-control" id="tiendichvu"
                                            placeholder="VD: 300" value="{{ $dichvudatphong->dichvus->giatien }}"
                                            readonly />
                                    @endif
                                @endforeach
                            @endif
                            @if ($anuongdatphongs)
                                @foreach ($anuongdatphongs as $anuongdatphong)
                                    @if ($anuongdatphong)
                                        <?php $tongtiendv += $anuongdatphong->anuongs->gia; ?>

                                        <label class="form-label"
                                            for="tienanuong">{{ $anuongdatphong->soluong }}-{{ $anuongdatphong->anuongs->ten }}</label>
                                        <input type="text" name="tienanuong" class="form-control" id="tienanuong"
                                            placeholder="VD: 300" value="{{ $anuongdatphong->anuongs->gia }}"
                                            readonly />
                                    @endif
                                @endforeach
                            @endif

                            <h5 class="mt-3">Tổng số tiền dịch vụ</h5>
                            <input type="text" name="tongtiendichvu" class="form-control" id="tongtiendichvu"
                                placeholder="VD: 300" value="{{ $tongtiendv }}" readonly />
                        </div>
                    </div>
                    {{-- tien tru sau dat coc --}}
                    <br>
                    @if ($tiendatcoc)
                        <?php $tongtien = $tonggia - $tiendatcoc->gia + $tongtiendv; ?>
                    @else
                        <?php $tongtien = $tonggia + $tongtiendv; ?>
                    @endif

                    <hr style="border: 1px black solid">
                    <h5> Tổng cộng toàn bộ só tiền phải thanh toán </h5>
                    <input type="text" name="sotien" class="form-control w-25" id="sotien" placeholder="VD: 300"
                        value="{{ $tongtien }}" readonly />
                    @error('sotien')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror

                    <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
                    <input type="hidden" name="khachhang_id" value="{{ $datphong->id }}">
                    <input type="hidden" name="loaitien" value="traphong">
                    <input type="hidden" name="hinhthucthanhtoan" value="tructiep">

                    {{-- btn xac nhan, cancel --}}
                    <div class="d-flex bd-highlight my-3">
                        <div class="bd-highlight">
                            <button type="submit" class="w-100 btn btn-warning"> Trực tiếp</button>
                        </div>
                        <div class="bd-highlight mx-3">
                            {{-- Thanh toan vnpay --}}
                            <a
                                href="/thanhtoanvnpayview/{{ $datphong->datphongid }}/traphong/{{ $datphong->id }}/{{ $tongtien }}">
                                <img src="https://www.msb.com.vn/documents/20121/273143/VnPay_Topbanner1600x400px.png/ffc9c0b4-617a-2cb0-2f5c-d8e6e6dd5bab?t=1657103705929"
                                    width="150px" class="shadow-sm">
                            </a>
                        </div>
                        <div class="ml-auto bd-highlight">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Hủy
                            </button>
                        </div>
                    </div>
                    {{-- KT btn xac nhan, cancel --}}
                </form>
            </div>
        </div>
    </div>
</div>
