<table class="table">
    <thead>
        <tr>
            {{-- <th style="max-width: 10px">Id</th> --}}
            <th>Thông tin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datphongs as $datphong)
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
            <tr>
                {{-- <td style="max-width: 10px">
                    <div style="width: 10px">
                        {{ $datphong->id }}
                    </div>
                </td> --}}
                <td class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="modal-title">Lịch sử các phòng đã và đang ở</h5>
                            </div>
                            <div class="card-body">
                                <p>Đặt phòng ID: {{ $datphong->id }}</p>
                                <?php $demphong = 0; ?>
                                @foreach ($danhsachdatphongs as $danhsachdatphong)
                                    @if ($demphong == count($danhsachdatphongs) - 1)
                                        <p>⭐Phòng đang ở: <b>{{ $danhsachdatphong->phongid }}</b></p>
                                    @else
                                        <p>Phòng đã ở: <b>{{ $danhsachdatphong->phongid }}</b></p>
                                    @endif
                                    <p>Loại phòng: <b>{{ $danhsachdatphong->phongs->loaiphongs->ten }}</b></p>
                                    <p>Giá: <b>{{ number_format($danhsachdatphong->phongs->loaiphongs->gia, 0, '', '.') }}
                                            VND</b></p>
                                    <p>Ngày bắt đầu ở:
                                        <b>{{ Carbon\Carbon::createFromFormat('Y-m-d', $danhsachdatphong->ngaybatdauo)->format('d-m-Y') }}</b>
                                    </p>
                                    <p>Ngày kết thúc ở:
                                        <b>{{ Carbon\Carbon::createFromFormat('Y-m-d', $danhsachdatphong->ngayketthuco)->format('d-m-Y') }}</b>
                                    </p>
                                    <hr>
                                    <?php $demphong++; ?>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="modal-title">Lịch sử thanh toán</h5>
                            </div>
                            <div class="card-body">
                                @foreach ($thanhtoans as $thanhtoan)
                                    @if ($thanhtoan->loaitien == 'traphong')
                                        <p>Tiền trả phòng: <b>{{ $thanhtoan->gia }} VND</b></p>
                                    @else
                                        <p>Tiền đặt cọc: <b>{{ $thanhtoan->gia }} VND</b></p>
                                    @endif
                                @endforeach
                                <hr>
                                @if (count($nhanphongs) > 0)
                                    <b>Nhận phòng</b>
                                    @foreach ($nhanphongs as $nhanphong)
                                        <p>Họ tên người nhận: <b>{{ $nhanphong->ten }}</b></p>
                                        <p>Thời gian nhận:
                                            <b>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $nhanphong->created_at)->format('d-m-Y H:i:s') }}</b>
                                        </p>
                                    @endforeach
                                @endif

                                @if (count($traphongs) > 0)
                                    <hr>
                                    <b>Trả phòng</b>
                                    @foreach ($traphongs as $traphong)
                                        <p>Số trả phòng: <b>{{ $traphong->so }}</b></p>
                                        <p>Họ tên người trả phòng: <b>{{ $traphong->ten }}</b></p>
                                        <p>Thời gian trả phòng:
                                            <b>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $traphong->created_at)->format('d-m-Y H:i:s') }}</b>
                                            <hr>
                                        </p>
                                    @endforeach
                                @endif

                                @if (count($huydatphongs) > 0)
                                    <hr>
                                    <b>Huỷ đặt phòng</b>
                                    @foreach ($huydatphongs as $huydatphong)
                                        <p>Số trả phòng: <b>{{ $huydatphong->so }}</b></p>
                                        <p>Họ tên người huỷ đặt phòng: <b>{{ $huydatphong->ten }}</b></p>
                                        <p>Thời gian huỷ đặt phòng:
                                            <b>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $huydatphong->created_at)->format('d-m-Y H:i:s') }}</b>
                                            <hr>
                                        </p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="modal-title">Lịch sử dịch vụ đã sử dụng</h5>
                            </div>
                            <div class="card-body">
                                @if (count($dichvudatphongs) > 0)
                                    <b>Dịch vụ sử dụng</b>
                                    @foreach ($dichvudatphongs as $dichvudatphong)
                                        <div class="d-flex justify-content-between">
                                            <div class="col-10">
                                                {{ $dichvudatphong->dichvus->ten }}:
                                                <b>
                                                    {{ number_format($dichvudatphong->dichvus->giatien, 0, '', '.') }}
                                                    {{ $dichvudatphong->dichvus->donvi }}</b>
                                            </div>
                                            @hasanyrole('MainAdmin|Admin')
                                                <!-- xoa dich vu -->
                                                <div class="col-2">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                                                        data-bs-target="#dichvudatphongdelete{{ $dichvudatphong->id }}{{ $datphong->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade"
                                                        id="dichvudatphongdelete{{ $dichvudatphong->id }}{{ $datphong->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="dichvudatphongdelete{{ $dichvudatphong->id }}{{ $datphong->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="Dichvudatphongdelete{{ $dichvudatphong->id }}{{ $datphong->id }}Label">
                                                                        Bạn có
                                                                        chắc
                                                                        chắn muốn xoá</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">No</button>
                                                                    <form
                                                                        action="{{ route('dichvu_datphong.destroy', $dichvudatphong->id) }}"
                                                                        method="Post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">
                                                                            Yes</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endhasanyrole
                                        </div>
                                    @endforeach
                                @endif
                                <hr>
                                @if (count($anuongdatphongs) > 0)
                                    <b>Dịch vụ ăn uống</b>
                                    @foreach ($anuongdatphongs as $anuongdatphong)
                                        <div class="d-flex justify-content-between">
                                            <div class="col-10">
                                                {{ $anuongdatphong->anuongs->ten }}:
                                                <b>{{ number_format($anuongdatphong->anuongs->gia * $anuongdatphong->soluong, 0, '', '.') }}
                                                    VND</b>
                                                <br>
                                                Số lượng:
                                                <b>{{ $anuongdatphong->soluong }}</b>
                                            </div>
                                            @hasanyrole('MainAdmin|Admin')
                                                <!-- xoa dich vu an uong -->
                                                <div class="col-2">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                                                        data-bs-target="#anuongdatphongdelete{{ $anuongdatphong->id }}{{ $datphong->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade"
                                                        id="anuongdatphongdelete{{ $anuongdatphong->id }}{{ $datphong->id }}"
                                                        tabindex="-1"
                                                        aria-labelledby="Anuongdatphongdelete{{ $anuongdatphong->id }}{{ $datphong->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="anuongdatphongdelete{{ $anuongdatphong->id }}{{ $datphong->id }}Label">
                                                                        Bạn có
                                                                        chắc
                                                                        chắn muốn xoá</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">No</button>
                                                                    <form
                                                                        action="{{ route('anuong_datphong.destroy', $anuongdatphong->id) }}"
                                                                        method="Post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">
                                                                            Yes</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endhasanyrole
                                        </div>
                                        <br>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            {{-- <th>Id</th> --}}
            <th>Thông tin</th>
        </tr>
    </tfoot>
</table>

