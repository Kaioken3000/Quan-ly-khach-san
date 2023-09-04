<table class="table fs--1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Phòng</th>
            <th>Loại phòng</th>
            <th>Giá (VND)</th>
            <th>
                <div class="d-flex justify-content-between align-items-start gap-1">
                    <p>Ngày bắt đầu ở</p>
                    <p>Ngày kết thúc ở</p>
                </div>
            </th>
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
                <td>{{ $datphong->id }}</td>
                <td>
                    <ul class="list-group">
                        <?php $demphong = 0; ?>
                        @foreach ($danhsachdatphongs as $danhsachdatphong)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Số: {{ $danhsachdatphong->phongid }}
                                @if ($demphong == count($danhsachdatphongs)-1)
                                    <span class="badge badge-light-primary rounded-pill">Đang ở</span>
                                @endif
                                <?php $demphong++; ?>
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach ($danhsachdatphongs as $danhsachdatphong)
                            <li class="list-group-item">
                                <b>{{ $danhsachdatphong->phongs->loaiphongs->ten }}</b>
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach ($danhsachdatphongs as $danhsachdatphong)
                            <li class="list-group-item"><b>{{ $danhsachdatphong->phongs->loaiphongs->gia }}</b></li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach ($danhsachdatphongs as $danhsachdatphong)
                            <li class="list-group-item d-flex justify-content-between align-items-start gap-1">
                                <b>{{ $danhsachdatphong->ngaybatdauo }}</b>
                                <b>{{ $danhsachdatphong->ngayketthuco }}</b>
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Phòng</th>
            <th>Loại phòng</th>
            <th>Giá (VND)</th>
            <th> </th>
        </tr>
    </tfoot>
</table>
<style>
    .card,
    hr {
        border: 1px black solid;
    }
</style>
