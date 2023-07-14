<!-- Button trigger modal -->
<button type="button" class="badge badge-info border-info" data-toggle="modal" data-target="#LichsuModal{{ $datphong->datphongid }}">
    Lịch sử
</button>

<!-- Modal -->
<div class="modal fade" id="LichsuModal{{ $datphong->datphongid }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Lịch sử đặt phòng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($danhsachdatphongs as $danhsachdatphong)
                <p>Phòng: <b>{{ $danhsachdatphong->phongid }} - {{ $danhsachdatphong->phongs->loaiphongs->ten }} -
                        {{ $danhsachdatphong->phongs->loaiphongs->gia }}</b></p>
                <p>Ngày bắt đầu ở: <b>{{ $danhsachdatphong->ngaybatdauo }}</b></p>
                <p>Ngày kết thúc ở: <b>{{ $danhsachdatphong->ngayketthuco }}</b></p>
                @endforeach
                <p>Khách hàng: <b>{{ $datphong->ten }}</b></p>
                @foreach ($thanhtoans as $thanhtoan)
                @if ($thanhtoan->loaitien == 'traphong')
                <p>Tiền trả phòng: <b>{{$thanhtoan->gia}} VND</b></p>
                @else
                <p>Tiền đặt cọc: <b>{{$thanhtoan->gia}} VND</b></p>
                @endif
                @endforeach

                @if(count($nhanphongs)>0)
                <hr>
                <b>Nhận phòng</b>
                @foreach($nhanphongs as $nhanphong)
                <p>Họ tên người nhận: <b>{{ $nhanphong->ten }}</b></p>
                <p>Thời gian nhận: <b>{{ $nhanphong->created_at }}</b></p>
                @endforeach
                @endif

                @if(count($traphongs)>0)
                <hr>
                <b>Trả phòng</b>
                @foreach($traphongs as $traphong)
                <p>Số trả phòng: <b>{{ $traphong->so }}</b></p>
                <p>Họ tên người trả phòng: <b>{{ $traphong->ten }}</b></p>
                <p>Thời gian trả phòng: <b>{{ $traphong->created_at }}</b>
                    <hr>
                </p>
                @endforeach
                @endif

                @if(count($huydatphongs)>0)
                <hr>
                <b>Huỷ đặt phòng</b>
                @foreach($huydatphongs as $huydatphong)
                <p>Số trả phòng: <b>{{ $huydatphong->so }}</b></p>
                <p>Họ tên người huỷ đặt phòng: <b>{{ $huydatphong->ten }}</b></p>
                <p>Thời gian huỷ đặt phòng: <b>{{ $huydatphong->created_at }}</b>
                    <hr>
                </p>
                @endforeach
                @endif

                @if(count($dichvudatphongs)>0)
                <hr>
                <b>Dịch vụ sử dụng</b>
                @foreach($dichvudatphongs as $dichvudatphong)
                <div class="row mt-2">
                    <div class="col-10">
                        {{ $dichvudatphong->dichvus->ten }}: <b>{{ $dichvudatphong->dichvus->giatien }} {{
                        $dichvudatphong->dichvus->donvi }}</b>
                    </div>
                    @hasrole('Admin')
                    <!-- xoa dich vu -->
                    <div class="col-2">
                        <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#dichvudatphongxoa{{ $dichvudatphong->id }}">
                            delete
                        </button>
                    </div>
                    @endhasrole
                </div>
                @endforeach
                @endif
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
