<div class="d-flex gap-1 align-items-center">
    <h4 class="card-title flex-grow-1">Thông tin chi tiết dịch vụ</h4>
    @foreach ($datphongs as $datphong)
        @if ($datphong->tinhtrangthanhtoan == 0)
            @if ($datphong->tinhtrangnhanphong == 0)
                Chưa nhận phòng nên không thể chọn dịch vụ
            @else
                @include('datphongs.actionButton.dichvuButton')
                @include('datphongs.actionButton.anuongButton')
            @endif
        @else
            Đã trả phòng
        @endif
    @endforeach
</div>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Dịch vụ thường</th>
            <th>Dịch vụ ăn uống</th>
            <th>Action</th>
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
            $thanhtoans = App\Models\Thanhtoan::where('khachhangid', $datphong->khachhangs->id)->get();
            ?>
            <tr>
                <td>
                    @if (count($dichvudatphongs) > 0)
                        @foreach ($dichvudatphongs as $dichvudatphong)
                            <div class="row">
                                <div class="col d-flex gap-1">
                                    @hasanyrole('MainAdmin|Admin')
                                        <!-- xoa dich vu -->
                                        <span>
                                            @include('datphongs.tab.modal.modalThemDichvu')
                                        </span>
                                    @endhasanyrole
                                    <p>{{ $dichvudatphong->dichvus->ten }}:</p>
                                </div>
                                <p class="col">{{ $dichvudatphong->dichvus->giatien }}VND
                                    {{ $dichvudatphong->dichvus->donvi }}
                                </p>
                                <p class="col">
                                    <b>{{ $dichvudatphong->created_at }} </b>
                                </p>
                            </div>
                        @endforeach
                    @endif
                </td>
                <td>
                    @if (count($anuongdatphongs) > 0)
                        @foreach ($anuongdatphongs as $anuongdatphong)
                            <div class="row">
                                <div class="col d-flex gap-1">
                                    @hasanyrole('MainAdmin|Admin')
                                        <!-- xoa dich vu an uong -->
                                        <span>
                                            @include('datphongs.tab.modal.modalThemAnuong')
                                        </span>
                                    @endhasanyrole
                                    <p>{{ $anuongdatphong->anuongs->ten }}:</p>
                                </div>
                                <p class="col">
                                    <b>{{ $anuongdatphong->anuongs->gia }} VND</b>
                                </p>
                                <p class="col">
                                    <b>{{ $anuongdatphong->created_at }} </b>
                                </p>
                                <p class="col">
                                    Số lượng:
                                    <b>{{ $anuongdatphong->soluong }}</b>
                                </p>

                            </div>
                        @endforeach
                    @endif
                </td>
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
