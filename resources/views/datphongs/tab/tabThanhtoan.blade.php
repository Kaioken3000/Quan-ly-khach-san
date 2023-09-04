<table class="table fs--1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tiền đã thanh toán(VND)</th>
            <th>Tình trạng xử lý</th>
            <th>Tình trạng nhận phòng</th>
            <th>Tình trạng thanh toán</th>
            <th>Hủy đặt phòng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datphongs as $datphong)
            <?php
            $danhsachdatphongs = App\Models\Danhsachdatphong::where('datphongid', $datphong->id)->get();
            $nhanphongs = App\Models\Nhanphong::where('datphongid', $datphong->id)->get();
            $xulys = App\Models\Xuly::where('datphongid', $datphong->id)->get();
            $traphongs = App\Models\Traphong::where('datphongid', $datphong->id)->get();
            $huydatphongs = App\Models\Huydatphong::where('datphongid', $datphong->id)->get();
            $anuongdatphongs = App\Models\AnuongDatphong::where('datphongid', $datphong->id)->get();
            $dichvudatphongs = App\Models\DichvuDatphong::where('datphongid', $datphong->id)->get();
            // $thanhtoans = App\Models\Thanhtoan::where('khachhangid', $datphong->khachhangs->id)->get();
            $thanhtoans = App\Models\Thanhtoan::where('datphongid', $datphong->id)->get();
            ?>
            {{-- KT co dat coc --}}
            <?php $check = 0;
            foreach ($thanhtoans as $thanhtoan) {
                if ($thanhtoan) {
                    $check++;
                }
            }
            ?>
            <tr>
                <td>{{ $datphong->id }}</td>
                <td>
                    <ul class="list-group">
                        @foreach ($thanhtoans as $thanhtoan)
                            @if ($thanhtoan->loaitien == 'traphong')
                                <li class="list-group-item">Tiền trả phòng: <b>{{ $thanhtoan->gia }}</b></li>
                            @else
                                <li class="list-group-item">Tiền đặt cọc: <b>{{ $thanhtoan->gia }}</b></li>
                            @endif
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @if (count($xulys) > 0)
                            @foreach ($xulys as $xuly)
                                <li class="list-group-item">Họ tên người xử lý: <b>
                                        @isset($xuly->users)
                                            {{ $xuly->users->username }}
                                        @endisset
                                    </b>
                                </li>
                                <li class="list-group-item">Thời gian xử lý: <b>{{ $xuly->created_at }}</b>
                                </li>
                            @endforeach
                        @endif

                        {{-- Nut xu ly --}}
                        <li class="list-group-item">
                            <form class="mt-1" action="{{ route('datphongs.xuly', $datphong->id) }}"
                                method="Post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $datphong->id }}">
                                <button type="submit"
                                    class="
                                        badge {{ $datphong->tinhtrangxuly == 0 ? 'bg-danger' : 'bg-success' }}">
                                    {{ $datphong->tinhtrangxuly == 0 ? 'Chưa' : 'Xác nhận' }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @if (count($nhanphongs) > 0)
                            @foreach ($nhanphongs as $nhanphong)
                                <li class="list-group-item">Họ tên người nhận: <b>
                                        @isset($nhanphong->users)
                                            {{ $nhanphong->users->username }}
                                        @endisset
                                    </b></li>
                                <li class="list-group-item">Thời gian nhận: <b>{{ $nhanphong->created_at }}</b></li>
                            @endforeach
                        @endif
                        <li class="list-group-item">
                            @if ($check != 0)
                                @include('datphongs.actionButton.nhanphong')
                            @else
                                <label class="badge bg-danger">
                                    Chưa
                                </label>
                            @endif
                        </li>
                    </ul>
                </td>
                <td>
                    {{-- Hien thong tin (ai cung coi dc) --}}
                    <ul class="list-group">
                        @if (count($traphongs) > 0)
                            @foreach ($traphongs as $traphong)
                                <li class="list-group-item">Họ tên người trả phòng:
                                    <b>
                                        @isset($traphong->users->username)
                                            {{ $traphong->users->username }}
                                        @endisset
                                    </b>
                                </li>
                                <li class="list-group-item">Thời gian trả phòng:
                                    <b>{{ $traphong->created_at }}</b>
                                </li>
                            @endforeach
                        @endif

                        {{-- Nut xac nhan thanh toan --}}
                        <li class="list-group-item">
                            @if ($check != 0)
                                @if ($datphong->tinhtrangthanhtoan == 0)
                                    <p style="display:none">Chưa</p>
                                    @include('datphongs.actionButton.thanhtoan')
                                @else
                                    <p style="display:none">Xác nhận</p>
                                    @hasanyrole('MainAdmin|Admin')
                                        @include('datphongs.actionButton.suathanhtoan')
                                    @else
                                        <label class="badge bg-success">
                                            Xác nhận
                                        </label>
                                    @endhasanyrole
                                @endif
                            @else
                                <label class="badge bg-danger">
                                    Chưa
                                </label>
                            @endif
                        </li>
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @if (count($huydatphongs) > 0)
                            @foreach ($huydatphongs as $huydatphong)
                                <li class="list-group-item">Số trả phòng: <b>
                                        @isset($huydatphong->users)
                                            {{ $huydatphong->users->username }}
                                        @endisset
                                    </b></li>
                                <li class="list-group-item">Họ tên người huỷ đặt phòng: <b>{{ $huydatphong->ten }}</b>
                                </li>
                                <li class="list-group-item">Thời gian huỷ đặt phòng:
                                    <b>{{ $huydatphong->created_at }}</b>
                                </li>
                            @endforeach
                        @endif
                        <li class="list-group-item">
                            @hasrole('MainAdmin')
                                @include('datphongs.actionButton.huydatphong')
                            @endhasrole
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Tiền đã thanh toán(VND)</th>
            <th>Tình trạng xử lý</th>
            <th>Tình trạng nhận phòng</th>
            <th>Tình trạng thanh toán</th>
            <th>Hủy đặt phòng</th>
        </tr>
    </tfoot>
</table>
<style>
    .card,
    hr {
        border: 1px black solid;
    }
</style>
