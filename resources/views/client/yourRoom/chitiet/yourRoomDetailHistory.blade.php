@foreach ($datphongalls as $datphongall)
    <?php
    $danhsachdatphongs = App\Models\Danhsachdatphong::where('datphongid', $datphongall->id)->get();
    $nhanphongs = App\Models\Nhanphong::where('datphongid', $datphongall->id)->get();
    $traphongs = App\Models\Traphong::where('datphongid', $datphongall->id)->get();
    $dichvudatphongs = App\Models\DichvuDatphong::where('datphongid', $datphongall->id)->get();
    $anuongdatphongs = App\Models\AnuongDatphong::where('datphongid', $datphongall->id)->get();
    $thanhtoans = App\Models\Thanhtoan::where('datphongid', $datphongall->id)->get();
    ?>
    <!-- Modal -->
    @if ($datphongall->khachhangs->userid == Auth::user()->id)
        <div class="row my-3">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Lịch sử thanh toán</h4>
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
                                <p>Họ tên người nhận: <b>
                                        @isset($nhanphong->users)
                                            {{ $nhanphong->users->username }}
                                        @endisset
                                    </b></p>
                                <p>Thời gian nhận: <b>{{ $nhanphong->created_at }}</b>
                                </p>
                            @endforeach
                        @endif
                        <br>

                        @if (count($traphongs) > 0)
                            <b class="font-weight-bold">Trả phòng</b>
                            @foreach ($traphongs as $traphong)
                                <p>Số trả phòng: {{ $traphong->so }}</p>
                                <p>Họ tên người trả phòng:
                                    @isset($traphong->users)
                                        {{ $traphong->users->username }}
                                    @endisset
                                </p>
                                <p>Thời gian trả phòng: {{ $traphong->created_at }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Lịch sử dịch vụ đã sử dụng</h4>
                        @if (count($dichvudatphongs) > 0)
                            <b class="font-weight-bold">Used service</b>
                            @foreach ($dichvudatphongs as $dichvudatphong)
                                <p>{{ $dichvudatphong->dichvus->ten }}:
                                    <b>{{ $dichvudatphong->dichvus->giatien }}
                                        {{ $dichvudatphong->dichvus->donvi }}</b>
                                </p>
                            @endforeach
                        @endif
                        @if (count($anuongdatphongs) > 0)
                            <b class="font-weight-bold">Used Food service</b>
                            @foreach ($anuongdatphongs as $anuongdatphong)
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p>{{ $anuongdatphong->anuongs->ten }}:
                                            <b>{{ $anuongdatphong->anuongs->gia }} VND</b>
                                        </p>
                                    </div>
                                    <div>
                                        <p>Số lượng:
                                            <b>{{ $anuongdatphong->soluong }}</b>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    @endif
@endforeach
