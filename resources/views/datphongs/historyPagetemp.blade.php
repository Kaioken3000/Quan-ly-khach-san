@extends('layouts3.app')

@section('content')
    <ul class="nav nav-underline" id="myTab" role="tablist" id="myTab">
        <li class="nav-item" role="presentation"><a class="nav-link active" id="thongtin-tab" data-bs-toggle="tab"
                href="#tab-thongtin" role="tab" aria-controls="tab-thongtin" aria-selected="true">Thông tin</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="phong-tab" data-bs-toggle="tab" href="#tab-phong"
                role="tab" aria-controls="tab-phong" aria-selected="false" tabindex="-1">Phòng</a>
        </li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="phong2-tab" data-bs-toggle="tab" href="#tab-phong2"
                role="tab" aria-controls="tab-phong2" aria-selected="false" tabindex="-1">Phòng chi tiết</a>
        </li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="dichvu-tab" data-bs-toggle="tab" href="#tab-dichvu"
                role="tab" aria-controls="tab-dichvu" aria-selected="false" tabindex="-1">Dịch
                vụ</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="khachhang-tab" data-bs-toggle="tab"
                href="#tab-khachhang" role="tab" aria-controls="tab-khachhang" aria-selected="false"
                tabindex="-1">Khách hàng</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="thanhtoan-tab" data-bs-toggle="tab"
                href="#tab-thanhtoan" role="tab" aria-controls="tab-thanhtoan" aria-selected="false" tabindex="-1">Chi
                tiết đặt phòng</a></li>
    </ul>
    <!-- Modal -->

    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active d-flex gap-1" id="tab-thongtin" role="tabpanel"
            aria-labelledby="thongtin-tab">
            <div>
                <input type="checkbox" name="" id="toggleView" checked hidden />
                @include('datphongs.tabChitiet.tabThongtin')
                @include('datphongs.tabChitiet.tabKhachhang')
            </div>
            <input type="checkbox" name="" id="toggleView" checked hidden />
            @include('datphongs.tabChitiet.tabThanhtoan')
        </div>
        <div class="tab-pane fade" id="tab-phong" role="tabpanel" aria-labelledby="phong-tab">
            @include('datphongs.tabChitiet.tabPhong')
            {{-- @include('layouts3.title', ['titlePage' => 'Lịch sử đặt phòng'])
            <div class="modal-body row mb-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="modal-title">Lịch sử các phòng đã và đang ở</h5>
                        </div>
                        <div class="card-body">
                            <?php $demphong = 0; ?>
                            @foreach ($danhsachdatphongs as $danhsachdatphong)
                                @if ($demphong == 0)
                                    <p>⭐Phòng đang ở: <b>{{ $danhsachdatphong->phongid }}</b></p>
                                @else
                                    <p>Phòng đã ở: <b>{{ $danhsachdatphong->phongid }}</b></p>
                                @endif
                                <p>Loại phòng: <b>{{ $danhsachdatphong->phongs->loaiphongs->ten }}</b></p>
                                <p>Giá: <b>{{ $danhsachdatphong->phongs->loaiphongs->gia }} VND</b></p>
                                <p>Ngày bắt đầu ở: <b>{{ $danhsachdatphong->ngaybatdauo }}</b></p>
                                <p>Ngày kết thúc ở: <b>{{ $danhsachdatphong->ngayketthuco }}</b></p>
                                <hr>
                                <?php $demphong++; ?>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="modal-title">Lịch sử thanh toán</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($thanhtoans as $thanhtoan)
                                @if ($thanhtoan->loaitien == 'traphong')
                                    <p>Tiền trả phòng: <b>{{ $thanhtoan->gia }} VND</b></p>
                                @else
                                    <p>Tiền đặt cọc: <b>{{ $thanhtoan->gia }} VND</b></p>
                                @endif
                            @endforeach
                            <hr>
                            @if (count($nhanphongs) > 0)
                                <b>Nhận phòng</b>
                                @foreach ($nhanphongs as $nhanphong)
                                    <p>Họ tên người nhận: <b>{{ $nhanphong->ten }}</b></p>
                                    <p>Thời gian nhận: <b>{{ $nhanphong->created_at }}</b></p>
                                @endforeach
                            @endif

                            @if (count($traphongs) > 0)
                                <hr>
                                <b>Trả phòng</b>
                                @foreach ($traphongs as $traphong)
                                    <p>Số trả phòng: <b>{{ $traphong->so }}</b></p>
                                    <p>Họ tên người trả phòng: <b>{{ $traphong->ten }}</b></p>
                                    <p>Thời gian trả phòng: <b>{{ $traphong->created_at }}</b>
                                        <hr>
                                    </p>
                                @endforeach
                            @endif

                            @if (count($huydatphongs) > 0)
                                <hr>
                                <b>Huỷ đặt phòng</b>
                                @foreach ($huydatphongs as $huydatphong)
                                    <p>Số trả phòng: <b>{{ $huydatphong->so }}</b></p>
                                    <p>Họ tên người huỷ đặt phòng: <b>{{ $huydatphong->ten }}</b></p>
                                    <p>Thời gian huỷ đặt phòng: <b>{{ $huydatphong->created_at }}</b>
                                        <hr>
                                    </p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col">

                </div>
            </div> --}}
        </div>
        <div class="tab-pane fade" id="tab-phong2" role="tabpanel" aria-labelledby="phong2-tab">
            @include('datphongs.tabChitiet.tabPhong2')
        </div>
        <div class="tab-pane fade" id="tab-dichvu" role="tabpanel" aria-labelledby="dichvu-tab">
            @include('datphongs.tabChitiet.tabDichvu')
            {{-- <div class="d-flex">
                <div class="flex-grow-1">
                    @include('layouts3.title', ['titlePage' => 'Lịch sử dịch vụ đã sử dụng'])
                </div>
                <div class="d-flex gap-1">
                    @include('datphongs.actionButton.dichvuButton', ['dichvus' => $dichvus, 'datphong' => $datphong])
                    @include('datphongs.actionButton.anuongButton', ['anuongs' => $anuongs, 'datphong' => $datphong])
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @if (count($dichvudatphongs) > 0)
                        <b>Dịch vụ sử dụng</b>
                        @foreach ($dichvudatphongs as $dichvudatphong)
                            <div class="d-flex justify-content-between">
                                <div class="col-10">
                                    {{ $dichvudatphong->dichvus->ten }}:
                                    <b>{{ $dichvudatphong->dichvus->giatien }}
                                        {{ $dichvudatphong->dichvus->donvi }}</b>
                                </div>
                                @hasanyrole('MainAdmin|Admin')
                                    <!-- xoa dich vu -->
                                    <div class="col-2">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                                            data-bs-target="#dichvudatphongxoa{{ $dichvudatphong->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="dichvudatphongxoa{{ $dichvudatphong->id }}"
                                            tabindex="-1" aria-labelledby="dichvudatphongxoa{{ $dichvudatphong->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="dichvudatphongxoa{{ $dichvudatphong->id }}Label"> Bạn
                                                            có chắc
                                                            chắn muốn xoá</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">No</button>
                                                        <form
                                                            action="{{ route('dichvu_datphong.destroy', $dichvudatphong->id) }}"
                                                            method="Post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                Yes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endhasanyrole
                            </div>
                        @endforeach
                    @endif
                    <hr>
                    @if (count($anuongdatphongs) > 0)
                        <b>Dịch vụ ăn uống</b>
                        @foreach ($anuongdatphongs as $anuongdatphong)
                            <div class="d-flex justify-content-between">
                                <div class="col-10">
                                    {{ $anuongdatphong->anuongs->ten }}:
                                    <b>{{ $anuongdatphong->anuongs->gia }} VND</b>
                                    <br>
                                    Số lượng:
                                    <b>{{ $anuongdatphong->soluong }}</b>
                                </div>
                                @hasanyrole('MainAdmin|Admin')
                                    <!-- xoa dich vu an uong -->
                                    <div class="col-2">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                                            data-bs-target="#anuongdatphongxoa{{ $anuongdatphong->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="anuongdatphongxoa{{ $anuongdatphong->id }}"
                                            tabindex="-1" aria-labelledby="anuongdatphongxoa{{ $anuongdatphong->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="anuongdatphongxoa{{ $anuongdatphong->id }}Label"> Bạn
                                                            có chắc
                                                            chắn muốn xoá</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">No</button>
                                                        <form
                                                            action="{{ route('anuong_datphong.destroy', $anuongdatphong->id) }}"
                                                            method="Post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                Yes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endhasanyrole
                            </div>
                            <br>
                        @endforeach
                    @endif
                </div>
            </div> --}}
        </div>
        <div class="tab-pane fade" id="tab-khachhang" role="tabpanel" aria-labelledby="khachhang-tab">
            @include('datphongs.tabChitiet.tabKhachhang')
        </div>
        <div class="tab-pane fade" id="tab-thanhtoan" role="tabpanel" aria-labelledby="thanhtoan-tab">
            @include('datphongs.tabChitiet.tabThanhtoan')
        </div>
    </div>
    <style>
        table {
            width: 100%;
            border-spacing: 0;
            background-color: #FFFFFF;
            font-size: 14px;
        }

        thead th {
            color: #7A7A7A;
            text-align: left;
            background-color: #F9FAFC;
        }

        thead th,
        tbody td {
            padding: 14px;
            border: 0;
            border-bottom: 1px solid #E7E7E7;
        }

        tbody td:first-child {
            border-left: 4px solid transparent;
            transition: all ease 0.3s;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        tbody tr:hover {
            /* background-color: #F7F9FC; */
        }

        tbody tr:hover td:first-child {
            border-left-color: #0F6FDE;
        }

        td.status {
            text-align: center;
        }

        td.status span {
            font-size: 12px;
            border-radius: 3px;
            padding: 4px 8px;
        }

        td.status span.approved {
            color: #FFFFFF;
            background-color: #00C455;
        }

        td.status span.decline {
            color: #FFFFFF;
            background-color: #F13426;
        }

        td.status span.pending {
            color: #132D4A;
            background-color: #EBF0F5;
        }

        #toggleView:checked~table thead {
            display: none;
        }

        #toggleView:checked~table tbody {
            /* display: flex; */
            width: 100%;
            flex-wrap: wrap;
            padding: 4px;
        }

        #toggleView:checked~table tbody tr,
        #toggleView:checked~table tbody td {
            display: block;
            border: 0;
        }

        #toggleView:checked~table tbody td {
            padding: 4px;
            font-weight: bold;
        }

        #toggleView:checked~table tbody td:before {
            content: attr(data-name);
            width: 200px;
            display: inline-block;
            text-transform: capitalize;
            font-weight: normal;
        }

        #toggleView:checked~table tbody td.status {
            position: absolute;
            top: 4px;
            right: 4px;
        }

        #toggleView:checked~table tbody tr {
            position: relative;
            /* width: calc(50% - 8px); */
            width: 100%;
            border: 1px solid #E7E7E7;
            padding: 8px;
            margin: 4px;
        }
    </style>
    <style>
        .card,
        hr {
            border: 1px black solid;
        }
    </style>
@endsection
