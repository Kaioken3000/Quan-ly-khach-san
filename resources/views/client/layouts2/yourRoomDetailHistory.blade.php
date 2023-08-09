@foreach ($datphongs as $datphong)
    <?php
    $danhsachdatphongs = App\Models\Danhsachdatphong::where('datphongid', $datphong->datphongid)->get();
    $nhanphongs = App\Models\Nhanphong::where('datphongid', $datphong->datphongid)->get();
    $traphongs = App\Models\Traphong::where('datphongid', $datphong->datphongid)->get();
    $dichvudatphongs = App\Models\DichvuDatphong::where('datphongid', $datphong->datphongid)->get();
    $thanhtoans = App\Models\Thanhtoan::where('khachhangid', $datphong->id)->get();
    ?>
    <!-- Modal -->
    <div>
        <div>
            <div class="modal-content mb-3">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Chi Tiết Đặt phòng {{$datphong->datphongid}}</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="modal-title" >Lịch sử các phòng đã và đang ở</h5>
                                </div>
                                <div class="card-body">
                                    @foreach ($danhsachdatphongs as $danhsachdatphong)
                                        <p>Phòng: {{ $danhsachdatphong->phongid }} -
                                            {{ $danhsachdatphong->phongs->loaiphongs->ten }} -
                                            {{ $danhsachdatphong->phongs->loaiphongs->gia }} VND</p>
                                        <p>Ngày bắt đầu ở: {{ $danhsachdatphong->ngaybatdauo }}</p>
                                        <p>Ngày kết thúc ở: {{ $danhsachdatphong->ngayketthuco }}
                                        </p>
                                        <p>Khách hàng: <b>{{ $datphong->ten }}</b></p>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="modal-title" >Lịch sử thanh toán</h5>
                                </div>
                                <div class="card-body">
                                    @foreach ($thanhtoans as $thanhtoan)
                                        @if ($thanhtoan->loaitien == 'traphong')
                                            <p>Tiền trả phòng: <b>{{ $thanhtoan->gia }} VND</b></p>
                                        @else
                                            <p>Tiền đặt cọc: <b>{{ $thanhtoan->gia }} VND</b></p>
                                        @endif
                                    @endforeach

                                    @if (count($nhanphongs) > 0)
                                        <b class="font-weight-bold">Nhận phòng</b>
                                        @foreach ($nhanphongs as $nhanphong)
                                            <p>Họ tên người nhận: <b>{{ $nhanphong->ten }}</b></p>
                                            <p>Thời gian nhận: <b>{{ $nhanphong->created_at }}</b>
                                            </p>
                                        @endforeach
                                    @endif
                                    <br>

                                    @if (count($traphongs) > 0)
                                        <b class="font-weight-bold">Trả phòng</b>
                                        @foreach ($traphongs as $traphong)
                                            <p>Số trả phòng: {{ $traphong->so }}</p>
                                            <p>Họ tên người trả phòng: {{ $traphong->ten }}</p>
                                            <p>Thời gian trả phòng: {{ $traphong->created_at }}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="modal-title" >Lịch sử dịch vụ đã sử dụng</h5>
                                </div>
                                <div class="card-body">
                                    @if (count($dichvudatphongs) > 0)
                                        <b class="font-weight-bold">Used service</b>
                                        @foreach ($dichvudatphongs as $dichvudatphong)
                                            <p>{{ $dichvudatphong->dichvus->ten }}:
                                                <b>{{ $dichvudatphong->dichvus->giatien }}
                                                    {{ $dichvudatphong->dichvus->donvi }}</b>
                                            </p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endforeach
<style>
    .card,
    hr {
        border: 1px black solid;
    }
</style>
