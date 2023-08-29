<div class="table-responsive text-nowrap">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
</div>
<table class="table">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Date Set</th>
            <th>Ngày trả</th>
            <th>Number of people</th>
            <th colspan="2">Phòng hiện đang ở</th>
            <th>Tình trạng xử lý</th>
            <th>Thanh Toán</th>
            <th>Nhận phòng</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datphongs as $datphong)
            <tr>
                <td>{{ $datphong->datphongid }}</td>
                <td>{{ $datphong->ngaydat }}</td>
                <td>{{ $datphong->ngaytra }}</td>
                <td>{{ $datphong->soluong }}</td>
                <td>
                    <?php
                    $phongmax = App\Models\Danhsachdatphong::where('datphongid', $datphong->datphongid)
                        ->orderBy('id', 'desc')
                        ->first();
                    ?>
                    @if ($phongmax)
                        {{ $phongmax->phongid }}
                    @endif
                </td>
                <td>
                    <?php
                    $danhsachdatphongs = App\Models\Danhsachdatphong::where('datphongid', $datphong->datphongid)->get();
                    $nhanphongs = App\Models\Nhanphong::where('datphongid', $datphong->datphongid)->get();
                    $traphongs = App\Models\Traphong::where('datphongid', $datphong->datphongid)->get();
                    $dichvudatphongs = App\Models\DichvuDatphong::where('datphongid', $datphong->datphongid)->get();
                    $anuongdatphongs = App\Models\AnuongDatphong::where('datphongid', $datphong->datphongid)->get();
                    $thanhtoans = App\Models\Thanhtoan::where('khachhangid', $datphong->id)->get();
                    ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="badge badge-info border-info text-white" data-toggle="modal"
                        data-target="#LichsuModal{{ $datphong->datphongid }}">
                        History
                    </button>

                    <!-- Modal -->
                    @include('client.yourRoom.modalHistory')
                </td>
                <td>
                    <label class="text-white badge {{ $datphong->tinhtrangxuly == 0 ? 'bg-danger' : 'bg-success' }}">
                        {{ $datphong->tinhtrangxuly == 0 ? 'Chưa' : 'Xác nhận' }}
                    </label>
                </td>
                <td>
                    <label
                        class="text-white badge {{ $datphong->tinhtrangthanhtoan == 0 ? 'bg-danger' : 'bg-success' }}">
                        {{ $datphong->tinhtrangthanhtoan == 0 ? 'Chưa' : 'Xác nhận' }}
                    </label>
                </td>
                <td>
                    <label
                        class="text-white badge {{ $datphong->tinhtrangnhanphong == 0 ? 'bg-danger' : 'bg-success' }}">
                        {{ $datphong->tinhtrangnhanphong == 0 ? 'Chưa' : 'Xác nhận' }}
                    </label>
                </td>
                <!-- Action -->
                <td>

                    <!-- các chức năng sửa, xoá, thanh toán, nhận phòng khi chưa thanh toán -->
                    @if ($datphong->tinhtrangthanhtoan == 0)
                        <div class="d-flex">

                            <!-- Đổi phòng -->
                            <form class="m-1" action="hiendoiphongclient" method="get">
                                <input type="hidden" name="datphongid" value="{{ $datphong->datphongid }}">
                                <button class="w-100 btn btn-primary" type="submit"><i class="bx bx-key mb-1"></i>
                                    Change Room</button>
                            </form>

                            <!-- Xoá -->
                            @if ($datphong->tinhtrangnhanphong == 0)
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
                            <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
                            <button type="submit" class="w-100 btn btn-info"><i class="bx bx-spreadsheet mb-1"></i>
                                View Bill</button>
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
                        <?php $datphongsnew = App\Models\Datphong::where('khachhangid', $datphong->id)->first(); ?>
                        {{-- Đặt cọc --}}
                        <div class="mx-1">
                            <a href="/client/thanhtoanvnpayview/{{ $datphong->datphongid }}/datcoc/{{ $datphong->id }}/{{ $datphongsnew->phongs[count($datphongsnew->phongs) - 1]->loaiphongs->gia/2 }}"
                                class="btn btn-success">Đặt cọc online</a>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
