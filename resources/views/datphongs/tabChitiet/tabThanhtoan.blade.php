<div class="d-flex align-items-center">
    <div class="flex-grow-1">
        <h4 class="card-title flex-grow-1">Thông tin chi tình trạng đặt phòng</h4>
    </div>
</div>
<table>
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
            $thanhtoans = App\Models\Thanhtoan::where('khachhangid', $datphong->khachhangs->id)->get();
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
                <td data-name='Tiền đã thanh toán:' class="d-flex">
                    <ul>
                        @foreach ($thanhtoans as $thanhtoan)
                            @if ($thanhtoan->loaitien == 'traphong')
                                <p>Tiền trả phòng: <b>{{ $thanhtoan->gia }} VND</b></p>
                            @else
                                <p>Tiền đặt cọc: <b>{{ $thanhtoan->gia }}VND</b></p>
                            @endif
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <td data-name='Tình trạng xử lý:' class="d-flex">
                    <ul>
                        @if (count($xulys) > 0)
                            @foreach ($xulys as $xuly)
                                <p>Họ tên người xử lý: <b>
                                        @isset($xuly->users)
                                            {{ $xuly->users->username }}
                                        @endisset
                                    </b>
                                </p>
                                <p>Thời gian xử lý: <b>{{ $xuly->created_at }}</b>
                                </p>
                            @endforeach
                        @endif

                        {{-- Nut xu ly --}}
                        <p>
                        <form class="mt-1" action="{{ route('datphongs.xuly', $datphong->id) }}" method="Post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $datphong->id }}">
                            <button type="submit"
                                class="
                                        badge {{ $datphong->tinhtrangxuly == 0 ? 'bg-danger' : 'bg-success' }}">
                                {{ $datphong->tinhtrangxuly == 0 ? 'Chưa' : 'Xác nhận' }}
                            </button>
                        </form>
                        </p>
                    </ul>
                </td>
                <td data-name='Tình trạng nhận phòng:' class="d-flex">
                    <ul>
                        @if (count($nhanphongs) > 0)
                            @foreach ($nhanphongs as $nhanphong)
                                <p>Họ tên người nhận: <b>
                                        @isset($nhanphong->users)
                                            {{ $nhanphong->users->username }}
                                        @endisset
                                    </b></p>
                                <p>Thời gian nhận: <b>{{ $nhanphong->created_at }}</b></p>
                            @endforeach
                        @endif
                        <p>
                            @if ($check != 0)
                                @include('datphongs.actionButton.nhanphong')
                            @else
                                <label class="badge bg-danger">
                                    Chưa
                                </label>
                            @endif
                        </p>
                    </ul>
                </td>
                <td data-name='Tình trạng thanh toán:' class="d-flex">
                    {{-- Hien thong tin (ai cung coi dc) --}}
                    <ul>
                        @if (count($traphongs) > 0)
                            @foreach ($traphongs as $traphong)
                                <p>Họ tên người trả phòng:
                                    <b>
                                        @isset($traphong->users->username)
                                            {{ $traphong->users->username }}
                                        @endisset
                                    </b>
                                </p>
                                <p>Thời gian trả phòng:
                                    <b>{{ $traphong->created_at }}</b>
                                </p>
                            @endforeach
                        @endif

                        {{-- Nut xac nhan thanh toan --}}
                        <p>
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
                        </p>
                    </ul>
                </td>
                <td>
                    @if (count($huydatphongs) > 0)
                        @foreach ($huydatphongs as $huydatphong)
                            <p>Số trả phòng: <b>
                                    @isset($huydatphong->users)
                                        {{ $huydatphong->users->username }}
                                    @endisset
                                </b></p>
                            <p>Họ tên người huỷ đặt phòng: <b>{{ $huydatphong->ten }}</b>
                            </p>
                            <p>Thời gian huỷ đặt phòng:
                                <b>{{ $huydatphong->created_at }}</b>
                            </p>
                        @endforeach
                    @endif
                    @hasrole('MainAdmin')
                        @include('datphongs.actionButton.huydatphong')
                    @endhasrole
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
