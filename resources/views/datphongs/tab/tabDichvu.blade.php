<table class="table">
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
                <td>{{ $datphong->id }}</td>
                <td>
                    @if (count($dichvudatphongs) > 0)
                        <ul class="list-group">
                            @foreach ($dichvudatphongs as $dichvudatphong)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <p>{{ $dichvudatphong->dichvus->ten }}:
                                        <b>{{ $dichvudatphong->dichvus->giatien }}
                                            {{ $dichvudatphong->dichvus->donvi }}</b>
                                    </p>
                                    <p>
                                        <b>{{ $dichvudatphong->created_at }} </b>
                                    </p>
                                    @hasanyrole('MainAdmin|Admin')
                                        <!-- xoa dich vu -->
                                        <span>
                                            @include('datphongs.tab.modal.modalThemDichvu')
                                        </span>
                                    @endhasanyrole
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    @if (count($anuongdatphongs) > 0)
                        <ul class="list-group">
                            @foreach ($anuongdatphongs as $anuongdatphong)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <p>
                                        {{ $anuongdatphong->anuongs->ten }}:
                                        <b>{{ $anuongdatphong->anuongs->gia }} VND</b>
                                        <br>
                                        Số lượng:
                                        <b>{{ $anuongdatphong->soluong }}</b>
                                    </p>
                                    <p>
                                        <b>{{ $anuongdatphong->created_at }} </b>
                                    </p>
                                    @hasanyrole('MainAdmin|Admin')
                                        <!-- xoa dich vu an uong -->
                                        <span>
                                            @include('datphongs.tab.modal.modalThemAnuong')
                                        </span>
                                    @endhasanyrole
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    <div class="d-flex gap-1">
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
                    </div>
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
