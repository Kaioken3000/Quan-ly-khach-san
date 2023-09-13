<div class="table-responsive text-nowrap">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
</div>
<table>
    <thead>
        <tr>
            <th>Mã</th>
            <th>Ngày đặt</th>
            <th>Ngày trả</th>
            <th>Số người ở</th>
            <th colspan="2">Phòng hiện đang ở</th>
            <th>Tình trạng xử lý</th>
            <th>Thanh Toán</th>
            <th>Nhận phòng</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datphongalls as $datphongall)
            @if ($datphongall->khachhangs->userid == Auth::user()->id)
                <tr>
                    <td data-name='Mã: '>{{ $datphongall->id }}</td>
                    <td data-name='Ngày đặt: '>
                        {{ Carbon\Carbon::createFromFormat('Y-m-d', $datphongall->ngaydat)->format('d-m-Y') }}
                    </td>
                    <td data-name='Ngày trả: '>
                        {{ Carbon\Carbon::createFromFormat('Y-m-d', $datphongall->ngaytra)->format('d-m-Y') }}
                    </td>
                    <td data-name='Số người ở: '>{{ $datphongall->soluong }}</td>
                    <?php
                    $phongmax = App\Models\Danhsachdatphong::where('datphongid', $datphongall->id)
                        ->orderBy('id', 'desc')
                        ->first();
                    ?>
                    <?php
                    $danhsachdatphongs = App\Models\Danhsachdatphong::where('datphongid', $datphongall->id)->get();
                    $nhanphongs = App\Models\Nhanphong::where('datphongid', $datphongall->id)->get();
                    $traphongs = App\Models\Traphong::where('datphongid', $datphongall->id)->get();
                    $dichvudatphongs = App\Models\DichvuDatphong::where('datphongid', $datphongall->id)->get();
                    $anuongdatphongs = App\Models\AnuongDatphong::where('datphongid', $datphongall->id)->get();
                    $thanhtoans = App\Models\Thanhtoan::where('datphongid', $datphongall->id)->get();
                    ?>
                    <td data-name='Tình trạng xử lý: '>
                        <label
                            class="text-white badge {{ $datphongall->tinhtrangxuly == 0 ? 'bg-danger' : 'bg-success' }}">
                            {{ $datphongall->tinhtrangxuly == 0 ? 'Chưa' : 'Xác nhận' }}
                        </label>
                    </td>
                    <td data-name='Thanh toán: '>
                        <label
                            class="text-white badge {{ $datphongall->tinhtrangthanhtoan == 0 ? 'bg-danger' : 'bg-success' }}">
                            {{ $datphongall->tinhtrangthanhtoan == 0 ? 'Chưa' : 'Xác nhận' }}
                        </label>
                    </td>
                    <td data-name='Nhận phòng: '>
                        <label
                            class="text-white badge {{ $datphongall->tinhtrangnhanphong == 0 ? 'bg-danger' : 'bg-success' }}">
                            {{ $datphongall->tinhtrangnhanphong == 0 ? 'Chưa' : 'Xác nhận' }}
                        </label>
                    </td>
                    <!-- Action -->
                    <td data-name='Hành động: '>

                        <!-- các chức năng sửa, xoá, thanh toán, nhận phòng khi chưa thanh toán -->
                        @if ($datphongall->tinhtrangthanhtoan == 0)
                            <div class="d-flex">

                                <!-- Đổi phòng -->
                                <form class="my-1" action="hiendoiphongclient" method="get">
                                    <input type="hidden" name="datphongid" value="{{ $datphongall->id }}">
                                    <button class="w-100 btn btn-primary" type="submit"><i class="bx bx-key mb-1"></i>
                                        Đổi phòng</button>
                                </form>

                                <!-- Xoá -->
                                @if ($datphongall->tinhtrangnhanphong == 0)
                                    @include('client.yourRoom.modalDelete')
                                @else
                                    @include('client.yourRoom.modalDichvu')

                                    @include('client.yourRoom.modalAnuong')
                                @endif
                            </div>

                            <!-- các chức năng sửa thanh toán và in hoá đơn nhận phòng khi đã thanh toán -->
                        @else
                            <form action="/generate-invoice-pdf" method="get">
                                @csrf
                                <input type="hidden" name="id" value="{{ $datphongall->id }}">
                                <button type="submit" class="w-100 btn btn-info"><i class="bx bx-spreadsheet mb-1"></i>
                                    Xem Hóa Đơn</button>
                            </form>
                        @endif

                        {{-- KT co dat coc --}}
                        <?php $check = 0; ?>
                        @foreach ($thanhtoans as $thanhtoan)
                            @if ($thanhtoan)
                                <?php $check++; ?>
                            @endif
                        @endforeach
                        {{-- {{$danhsachdatphongs}} --}}
                        @if ($check == 0)
                            {{-- Đặt cọc --}}
                            <div class="mx-1">
                                <a href="/client/thanhtoanvnpayview/{{ $datphongall->id }}/datcoc/{{ $datphongall->khachhangid }}/{{ $datphongall->phongs[count($datphongall->phongs) - 1]->loaiphongs->gia / 2 }}"
                                    class="btn btn-success">Đặt cọc online</a>
                            </div>
                        @endif
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
