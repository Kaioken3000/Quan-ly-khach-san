<div class="my-1 col-4">
    <button type="button" class="badge bg-danger" data-bs-toggle="modal"
        data-bs-target="#modalthanhtoan{{ $datphong->id }}">
        <i class="fa fa-dollar"></i> Thanh toán
    </button>
</div>
<!-- Modal thanh toán -->
<div class="modal fade" id="modalthanhtoan{{ $datphong->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered w-75" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"> Thực hiện thanh toán</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form class="m-1" action="{{ route('datphongs.thanhtoan', $datphong->id) }}" method="Post">
                    @csrf
                    @method('PUT')
                    <div class="d-flex gap-1">
                        {{-- Tinh toan tong tien phong --}}
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
                        
                                $tonggia += $giatientungphong;
                                $i++;
                            }
                        } else {
                            foreach ($danhsachdatphongs as $danhsachdatphong) {
                                $ngaybatdau = $danhsachdatphong->ngaybatdauo;
                                $ngayketthuc = $danhsachdatphong->ngayketthuco;
                                $songay2 = abs(round((strtotime($ngayhomnay) - strtotime($ngaybatdau)) / 86400));
                                $tonggia += $danhsachdatphong->phongs->loaiphongs->gia * $songay2;
                            }
                        }
                        ?>
                        {{-- Tinh toan tong tien phong end --}}

                        {{-- Thông tin tiền phòng --}}
                        @include('datphongs.actionButton.thanhtoan.thongtintienphong')
                        {{-- Thông tin tiền dịch vụ --}}
                        @include('datphongs.actionButton.thanhtoan.thongtintiendichvu')
                    </div>
                    {{-- tien tru sau dat coc --}}
                    <br>

                    {{-- Tinh toan tien dich vu --}}
                    <?php
                    $tiendatcoc = App\Models\Thanhtoan::where('datphongid', $datphong->id)
                        ->where('loaitien', 'datcoc')
                        ->first();
                    ?>
                    <?php $tongtiendv = 0; ?>
                    @if ($dichvudatphongs)
                        @foreach ($dichvudatphongs as $dichvudatphong)
                            @if ($dichvudatphong)
                                <?php $tongtiendv += $dichvudatphong->dichvus->giatien; ?>
                            @endif
                        @endforeach
                    @endif
                    @if ($anuongdatphongs)
                        @foreach ($anuongdatphongs as $anuongdatphong)
                            @if ($anuongdatphong)
                                <?php $tongtiendv += $anuongdatphong->anuongs->gia * $anuongdatphong->soluong; ?>
                            @endif
                        @endforeach
                    @endif
                    {{-- Tinh toan tien dich vu end --}}

                    @if ($tiendatcoc)
                        <?php $tongtien = $tonggia - $tiendatcoc->gia + $tongtiendv; ?>
                    @else
                        <?php $tongtien = $tonggia + $tongtiendv; ?>
                    @endif

                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="col-9"> Trừ điểm vào tiền só tiền phải thanh toán: </h5>
                        <div class="col-3 w-25 input-group">
                            <span class="input-group-text">
                                <input class="form-check-input" id="tiendiem{{ $datphong->id }}" type="checkbox"
                                    name="tiendiem" value="{{ $datphong->khachhangs->diem }}"
                                    onclick="doiTongTien({{ $datphong->id }}, {{ $tongtien }})" />
                            </span>
                            <input type="number" value="{{ $datphong->khachhangs->diem }}" name="sotiendiem"
                                id="sotiendiem{{ $datphong->id }}" class="form-control w-25"
                                max="{{ $datphong->khachhangs->diem }}" min=0
                                onchange="doiTongTien({{ $datphong->id }}, {{ $tongtien }})">
                            <span class="input-group-text">điểm</span>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex">
                        <h5 class="flex-grow-1"> Tổng cộng toàn bộ số tiền phải thanh toán: </h5>
                        <input readonly type="text" name="sotien" class="form-control w-25"
                            id="sotien{{ $datphong->id }}" placeholder="VD: 300" value="{{ $tongtien }}" hidden />
                        <h4 class="" id="sotienLabel{{ $datphong->id }}">
                            {{ number_format($tongtien, 0, '', '.') }}đ</h4>
                    </div>
                    @error('sotien')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror



                    <input readonly type="hidden" name="id" value="{{ $datphong->id }}">
                    <input readonly type="hidden" name="khachhang_id" value="{{ $datphong->khachhangs->id }}">
                    <input readonly type="hidden" name="loaitien" value="traphong">
                    <input readonly type="hidden" name="hinhthucthanhtoan" value="tructiep">

                    {{-- btn xac nhan, cancel --}}
                    <div class="d-flex bd-highlight my-3">
                        <div class="bd-highlight">
                            <button type="submit" class="w-100 btn btn-warning"> Trực tiếp</button>
                        </div>
                        <form action="" method="get"></form>
                        <div class="bd-highlight mx-3">
                            {{-- Thanh toan vnpay --}}
                            {{-- <a
                                href="/thanhtoanvnpayview/{{ $datphong->id }}/traphong/{{ $datphong->khachhangs->id }}/{{ $tongtien }}">
                                <img src="https://www.msb.com.vn/documents/20121/273143/VnPay_Topbanner1600x400px.png/ffc9c0b4-617a-2cb0-2f5c-d8e6e6dd5bab?t=1657103705929"
                                    width="150px" class="shadow-sm">
                            </a> --}}
                            <form action="/thanhtoanvnpayview" method="get">
                                <input readonly hidden type="text" name="sotien" id="sotien2{{ $datphong->id }}"
                                    value="{{ $tongtien }}">
                                <input readonly hidden type="text" name="datphongid" id=""
                                    value="{{ $datphong->id }}">
                                <input readonly hidden type="text" name="loaitien" id="" value="traphong">
                                <input readonly hidden type="text" name="khachhangid" id=""
                                    value="{{ $datphong->khachhangs->id }}">
                                <input hidden class="form-check-input" id="tiendiem2{{ $datphong->id }}"
                                    type="checkbox" name="tiendiem" value="{{ $datphong->khachhangs->diem }}"
                                    id="tiendiem2{{ $datphong->id }}" />
                                <input hidden type="number" value="{{ $datphong->khachhangs->diem }}"
                                    name="sotiendiem" id="sotiendiem2{{ $datphong->id }}">

                                <button type="submit" class="btn btn-link m-0 p-0"> <img
                                        src="https://www.msb.com.vn/documents/20121/273143/VnPay_Topbanner1600x400px.png/ffc9c0b4-617a-2cb0-2f5c-d8e6e6dd5bab?t=1657103705929"
                                        width="150px" class="shadow-sm"></button>
                            </form>
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
<script>
    function doiTongTien(id, tongtien) {
        sotienInput = document.getElementById("sotien" + id);
        sotien2Input = document.getElementById("sotien2" + id);
        tiendiemInput = document.getElementById("tiendiem" + id);
        tiendiem2Input = document.getElementById("tiendiem2" + id);
        sotiendiemInput = document.getElementById("sotiendiem" + id);
        sotiendiem2Input = document.getElementById("sotiendiem2" + id);
        sotienLabel = document.getElementById("sotienLabel" + id);
        if (tiendiemInput.checked) {
            sotienInput.value = tongtien
            sotien2Input.value = tongtien
            sotienLabel.textContent = tongtien

            sotienInput.value = (parseInt(sotienInput.value) - parseInt(sotiendiemInput.value))
            sotien2Input.value = (parseInt(sotien2Input.value) - parseInt(sotiendiemInput.value))
            sotienLabel.textContent = sotienInput.value;

            tiendiem2Input.checked = true
        } else {
            tiendiem2Input.checked = false
            sotienInput.value = tongtien
            sotien2Input.value = tongtien
            sotienLabel.textContent = tongtien
        }
        sotiendiem2Input.value = sotiendiemInput.value;
        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0
        })
        sotienLabel.textContent = formatter.format(sotienLabel.textContent)
    }
</script>
