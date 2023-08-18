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
                <td>{{ $datphong->id }}</td>
                <td>
                    <?php
                    $phongmax = App\Models\Danhsachdatphong::where('datphongid', $datphong->id)
                        ->orderBy('id', 'desc')
                        ->first();
                    ?>
                    @if ($phongmax)
                        {{ $phongmax->phongid }}
                    @endif
                </td>
                <td>
                    <p>{{ $datphong->phongs[count($datphong->phongs) - 1]->chinhanhs->ten }}</p>
                    <?php $i++; ?>
                </td>
                <td>
                    <?php
                    $danhsachdatphongs = App\Models\Danhsachdatphong::where('datphongid', $datphong->id)->get();
                    $nhanphongs = App\Models\Nhanphong::where('datphongid', $datphong->id)->get();
                    $traphongs = App\Models\Traphong::where('datphongid', $datphong->id)->get();
                    $huydatphongs = App\Models\Huydatphong::where('datphongid', $datphong->id)->get();
                    $anuongdatphongs = App\Models\AnuongDatphong::where('datphongid', $datphong->id)->get();
                    $dichvudatphongs = App\Models\DichvuDatphong::where('datphongid', $datphong->id)->get();
                    $thanhtoans = App\Models\Thanhtoan::where('khachhangid', $datphong->khachhangs->id)->get();
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
                        Chi tiết
                    </a>

                    {{-- Hien va xoa dich vu --}}
                    @hasanyrole('MainAdmin|Admin')
                        {{-- @include('datphongs.dichvu') --}}
                    @endhasanyrole

                </td>
                <td>{{ $datphong->soluong }}</td>
                <td>{{ $datphong->khachhangs->ten }}({{ $datphong->khachhangs->id }})</td>

                {{-- 3 tinh trang --}}
                <td>
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
                <td>
                    @if ($check != 0)
                        {{-- @include('datphongs.actionButton.nhanphong') --}}
                        @if ($datphong->tinhtrangnhanphong == 0)
                            <label class="badge bg-danger">
                                Chưa
                            </label>
                        @else
                            <label class="badge bg-success">
                                Xác nhận
                            </label>
                        @endif
                    @else
                        <label class="badge bg-danger">
                            Chưa
                        </label>
                    @endif
                </td>
                <td>
                    @if ($check != 0)
                        @if ($datphong->tinhtrangthanhtoan == 0)
                            <p class="badge bg-danger">Chưa</p>
                        @else
                            <p class="badge bg-success">Xác nhận</p>
                        @endif
                    @else
                        <label class="badge bg-danger">
                            Chưa
                        </label>
                    @endif
                </td>
                {{-- 3 tình trang --}}

                <!-- Action -->
                <td>

                    <!-- các chức năng sửa, xoá, thanh toán, nhận phòng khi chưa thanh toán -->
                    @if ($datphong->tinhtrangthanhtoan == 0)
                        <div class="d-flex">

                            <!-- Đổi phòng -->
                            @include('datphongs.actionButton.doiphong')

                            <!-- Huỷ đặt phòng -->
                            {{-- @include('datphongs.actionButton.huydatphong') --}}

                            <!-- Xoá -->
                            @if ($datphong->tinhtrangnhanphong == 0)
                                @hasanyrole('MainAdmin')
                                    @include('datphongs.actionButton.xoa')
                                @endhasanyrole
                            @else
                                <!-- Dịch vụ -->
                                <div class="d-flex flex-column col-4">
                                    {{-- @include('datphongs.actionButton.dichvuButton')
                                    @include('datphongs.actionButton.anUongButton') --}}
                                </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-start gap-2">
                            @if ($check == 0)
                                {{-- //Đặt cọc --}}
                                <div class="my-1 col-6">
                                    @foreach ($danhsachdatphongs as $danhsachdatphong)
                                        <a href="/thanhtoanvnpayview/{{ $datphong->id }}/datcoc/{{ $datphong->khachhangs->id }}/{{ $danhsachdatphong->phongs->loaiphongs->gia / 2 }}"
                                            class="btn btn-success">Đặt cọc online</a>
                                    @endforeach
                                </div>
                            @endif
                            {{-- //Thanh toán
                            @if ($check != 0)
                                @include('datphongs.actionButton.thanhtoan')
                            @endif

                            //Nhận phòng, sửa nhận phòng
                            @if ($check != 0)
                                @include('datphongs.actionButton.nhanphong')
                            @endif --}}
                        </div>

                        <!-- các chức năng sửa thanh toán và in hoá đơn nhận phòng khi đã thanh toán -->
                    @else
                        {{-- <div class="d-flex justify-content-start gap-1"> --}}
                        {{-- @can('role-edit')
                                    @include('datphongs.actionButton.suathanhtoan')
                                @endcan --}}
                        @include('datphongs.actionButton.hoadon')
                        {{-- </div> --}}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
