<div class="modal fade" id="LichsuModal{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Lịch sử đặt phòng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Lịch sử các phòng đã và đang ở
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
                                Lịch sử thanh toán
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
                                Lịch sử dịch vụ đã sử dụng
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
<style>
    .modal-lg {
        max-width: 80%;
    }
</style>
