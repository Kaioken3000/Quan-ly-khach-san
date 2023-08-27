<table>
    <thead>
        <tr>
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
            $thanhtoans = App\Models\Thanhtoan::where('khachhangid', $datphong->khachhangs->id)->get();
            ?>
            <tr>
                <?php $demphong = 0; ?>
                @foreach ($danhsachdatphongs as $danhsachdatphong)
                    <td data-name="Phòng:" class="d-flex align-items-center">
                        <li class=" d-flex justify-content-between align-items-center gap-2">
                            Số: {{ $danhsachdatphong->phongid }}
                            @if ($demphong == count($danhsachdatphongs) - 1)
                                <span class="badge badge-light-primary rounded-pill">Đang ở</span>
                            @endif
                            <?php $demphong++; ?>
                        </li>
                    </td>
                    <td data-name="Loại phòng:" class="d-flex align-items-center">
                        <b>{{ $danhsachdatphong->phongs->loaiphongs->ten }}</b>
                    </td>
                    <td data-name="Giá:" class="d-flex align-items-center">
                        <b>{{ $danhsachdatphong->phongs->loaiphongs->gia }}</b>
                    </td>
                    <td data-name="Ngày bắt đầu ở:" class="Ngày bắt đầu ở:">
                        <b>{{ $danhsachdatphong->ngaybatdauo }}</b>
                    </td>
                    <td data-name="Ngày kết thúc ở:" class="Ngày kết thúc ở:">
                        <b>{{ $danhsachdatphong->ngayketthuco }}</b>
                    </td>
                    <td></td>
                @endforeach
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
