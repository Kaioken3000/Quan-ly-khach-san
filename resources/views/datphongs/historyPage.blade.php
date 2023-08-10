@extends('layouts3.app')

@section('content')
    <!-- Modal -->
    @include('layouts3.title', ['titlePage' => 'Lịch sử đặt phòng'])
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
            <div class="card">
                <div class="card-header">
                    <h5 class="modal-title">Lịch sử dịch vụ đã sử dụng</h5>
                </div>
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
                                @hasrole('Admin')
                                    <!-- xoa dich vu -->
                                    <div class="col-2">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                                            data-bs-target="#dichvudatphongxoa{{ $dichvudatphong->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="dichvudatphongxoa{{ $dichvudatphong->id }}" tabindex="-1"
                                            aria-labelledby="dichvudatphongxoa{{ $dichvudatphong->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="dichvudatphongxoa{{ $dichvudatphong->id }}Label"> Bạn có chắc
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
                                                            <button type="submit" class="btn btn-danger"> Yes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endhasrole
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
                                @hasrole('Admin')
                                    <!-- xoa dich vu an uong -->
                                    <div class="col-2">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="badge bg-danger" data-bs-toggle="modal"
                                            data-bs-target="#anuongdatphongxoa{{ $anuongdatphong->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="anuongdatphongxoa{{ $anuongdatphong->id }}" tabindex="-1"
                                            aria-labelledby="anuongdatphongxoa{{ $anuongdatphong->id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="anuongdatphongxoa{{ $anuongdatphong->id }}Label"> Bạn có chắc
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
                                                            <button type="submit" class="btn btn-danger"> Yes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endhasrole
                            </div>
                            <br>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <style>
        .card,
        hr {
            border: 1px black solid;
        }
    </style>
@endsection
