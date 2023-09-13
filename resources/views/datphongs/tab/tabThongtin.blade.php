<table class="table">
    <thead>
        <tr>
            <th class="table-plus">id</th>
            <th>Phòng hiện tại</th>
            <th>Chi nhánh</th>
            <th>Chi tiết phòng</th>
            <th style="width: 1px">Số lượng</th>
            <th>Khách hàng(ID)</th>
            <th>Xử lý</th>
            <th>Nhận phòng</th>
            <th>Thanh toán</th>
            <th class="datatable-nosort">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0; ?>
        @foreach ($datphongs as $datphong)
            <tr>
                <td data-name="Id">{{ $datphong->id }}</td>
                <td data-name="Phòng hiện tại">
                    <?php
                    $phongmax = App\Models\Danhsachdatphong::where('datphongid', $datphong->id)
                        ->orderBy('id', 'desc')
                        ->first();
                    ?>
                    @if ($phongmax)
                        {{ $phongmax->phongid }}
                    @endif
                </td>
                <td data-name="Chi nhánh">
                    <p>{{ $datphong->phongs[count($datphong->phongs) - 1]->chinhanhs->ten }}</p>
                    <?php $i++; ?>
                </td>
                <td data-name="Chi tiết phòng">
                    <?php
                    $danhsachdatphongs = App\Models\Danhsachdatphong::where('datphongid', $datphong->id)->get();
                    $nhanphongs = App\Models\Nhanphong::where('datphongid', $datphong->id)->get();
                    $traphongs = App\Models\Traphong::where('datphongid', $datphong->id)->get();
                    $huydatphongs = App\Models\Huydatphong::where('datphongid', $datphong->id)->get();
                    $anuongdatphongs = App\Models\AnuongDatphong::where('datphongid', $datphong->id)->get();
                    $dichvudatphongs = App\Models\DichvuDatphong::where('datphongid', $datphong->id)->get();
                    // $thanhtoans = App\Models\Thanhtoan::where('khachhangid', $datphong->khachhangs->id)->get();
                    $thanhtoans = App\Models\Thanhtoan::where('datphongid', $datphong->id)->get();
                    ?>
                    {{-- KT co dat coc --}}
                    <?php $check = 0;
                    foreach ($thanhtoans as $thanhtoan) {
                        if ($thanhtoan) {
                            $check++;
                        }
                    }
                    ?>
                    {{-- Lich su dat phong --}}
                    {{-- @include('datphongs.history') --}}
                    <a href="{{ route('datphongs.showHistoryPage', ['datphongid' => $datphong->id, 'khachhangid' => $datphong->khachhangs->id]) }}"
                        target="_blank" class="badge bg-primary">
                        Chi tiết <i class="fas fa-eye"></i>
                    </a>

                    {{-- Hien va xoa dich vu --}}
                    @hasanyrole('MainAdmin|Admin')
                        {{-- @include('datphongs.dichvu') --}}
                    @endhasanyrole

                </td>
                <td data-name="Số lượng">{{ $datphong->soluong }}</td>
                <td data-name="Khách hàng(ID)">
                    {{ $datphong->khachhangs->ten }}({{ $datphong->khachhangs->id }})</td>

                {{-- 3 tinh trang --}}
                <td data-name="Xử lý">
                    <form class="mt-1" action="{{ route('datphongs.xuly', $datphong->id) }}" method="Post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $datphong->id }}">
                        <button type="submit"
                            class="
                                badge {{ $datphong->tinhtrangxuly == 0 ? 'bg-danger' : 'bg-success' }}">
                            {{ $datphong->tinhtrangxuly == 0 ? 'Chưa' : 'Xác nhận' }}
                        </button>
                    </form>
                </td>
                <td data-name="Nhận phòng">
                    @if ($check != 0)
                        {{-- @include('datphongs.actionButton.nhanphong') --}}
                        @if ($datphong->tinhtrangnhanphong == 0)
                            <label class="badge bg-danger mt-2">
                                Chưa
                            </label>
                        @else
                            <label class="badge bg-success mt-2">
                                Xác nhận
                            </label>
                        @endif
                    @else
                        <label class="badge bg-danger mt-2">
                            Chưa
                        </label>
                    @endif
                </td>
                <td data-name="Thanh toán">
                    @if ($check != 0)
                        @if ($datphong->tinhtrangthanhtoan == 0)
                            <p class="badge bg-danger mt-2">Chưa</p>
                        @else
                            <p class="badge bg-success mt-2">Xác nhận</p>
                        @endif
                    @else
                        <label class="badge bg-danger mt-2">
                            Chưa
                        </label>
                    @endif
                </td>
                {{-- 3 tình trang --}}

                <!-- Action -->
                <td data-name="Action">

                    <!-- các chức năng sửa, xoá, thanh toán, nhận phòng khi chưa thanh toán -->
                    <div class="row">
                        @if ($datphong->huydatphong == 0)
                            @if ($datphong->tinhtrangthanhtoan == 0)
                                <!-- Đổi phòng -->
                                <div class="col-9">
                                    @if ($check == 0)
                                        {{-- //Đặt cọc --}}
                                        <div class="my-1">
                                            @foreach ($danhsachdatphongs as $danhsachdatphong)
                                                {{-- <a href="/thanhtoanvnpayview/{{ $datphong->id }}/datcoc/{{ $datphong->khachhangs->id }}/{{ $danhsachdatphong->phongs->loaiphongs->gia / 2 }}"
                                                    class="btn btn-success">Đặt cọc online</a> --}}
                                                <form action="/thanhtoanvnpayview" method="get">
                                                    {{-- Số tiền --}}
                                                    <input readonly hidden type="text" name="sotien"
                                                        id="sotien2{{ $datphong->id }}" value="{{ $danhsachdatphong->phongs->loaiphongs->gia / 2 }}">
                                                    {{-- Đặt phòng id --}}
                                                    <input readonly hidden type="text" name="datphongid"
                                                    id="" value="{{ $datphong->id }}">
                                                    {{-- loại tiền --}}
                                                    <input readonly hidden type="text" name="loaitien" id=""
                                                    value="datcoc">
                                                    {{-- khách hàng id --}}
                                                    <input readonly hidden type="text" name="khachhangid"
                                                    id="" value="{{ $datphong->khachhangs->id }}">
                                                    {{-- checkbox --}}
                                                    <input hidden class="form-check-input"
                                                    id="tiendiem2{{ $datphong->id }}" type="checkbox"
                                                    name="tiendiem" value="{{ $datphong->khachhangs->diem }}"
                                                    id="tiendiem2{{ $datphong->id }}" />
                                                    {{-- so diem --}}
                                                    <input hidden type="number"
                                                        value="{{ $datphong->khachhangs->diem }}" name="sotiendiem"
                                                        id="sotiendiem2{{ $datphong->id }}">

                                                    <button type="submit" class="btn btn-success">Đặt cọc online</button>
                                                </form>
                                            @endforeach
                                        </div>
                                    @endif
                                    @include('datphongs.actionButton.doiphong')
                                </div>
                            @else
                                <div class="col-9">
                                    @include('datphongs.actionButton.hoadon')
                                </div>
                            @endif
                            <!-- Xoá -->
                            @hasanyrole('MainAdmin')
                                <div class="col-3">
                                    @include('datphongs.actionButton.xoa')
                                </div>
                            @endhasanyrole
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>id</th>
            <th>Phòng hiện tại</th>
            <th>Chi nhánh</th>
            <th>Chi tiết phòng</th>
            <th style="width: 1px">Số lượng</th>
            <th>Khách hàng(ID)</th>
            <th>Xử lý</th>
            <th>Nhận phòng</th>
            <th>Thanh toán</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
