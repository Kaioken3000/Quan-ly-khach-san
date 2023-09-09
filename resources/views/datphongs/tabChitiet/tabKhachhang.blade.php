<table>
    <thead>
        <tr>
            <th>Phòng</th>
            <th>Khách hàng Id</th>
            <th>Chi nhánh</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datphongs as $datphong)
            <tr>
                <td data-name="Mã đặt phòng:">{{ $datphong->id }}</td>
                <td data-name="Khách hàng Id:">{{ $datphong->khachhangs->id }}</td>
                <td data-name="Chi nhánh:">{{ $datphong->phongs[count($datphong->phongs) - 1]->chinhanhs->ten }}</td>
                <td data-name="Tên:">{{ $datphong->khachhangs->ten }}</td>
                <td data-name="Số điện thoại:">{{ $datphong->khachhangs->sdt }}</td>
                <td data-name="Email: " class="d-flex">{{ $datphong->khachhangs->email }}</td>
                <td>
                    <?php $i = 0; ?>
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
                    <!-- Action -->
                    <!-- các chức năng sửa, xoá, thanh toán, nhận phòng khi chưa thanh toán -->
                    @if ($datphong->tinhtrangthanhtoan == 0)
                        <div class="d-flex">

                            <!-- Đổi phòng -->
                            @include('datphongs.actionButton.doiphong')

                            <!-- Xoá -->
                            @if ($datphong->tinhtrangnhanphong == 0)
                                @hasanyrole('MainAdmin')
                                    @include('datphongs.actionButton.xoa')
                                @endhasanyrole
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
                        </div>

                        <!-- các chức năng sửa thanh toán và in hoá đơn nhận phòng khi đã thanh toán -->
                    @else
                        @include('datphongs.actionButton.hoadon')
                    @endif
                </td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
<style>
    .card,
    hr {
        border: 1px black solid;
    }
</style>
