@extends('layouts3.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="d-flex">
        <div class="flex-grow-1">
            @include('layouts3.title', ['titlePage' => 'Quản lý đặt phòng'])
        </div>
        <div>
            <a class="btn btn-success" href="{{ route('datphongs.create') }}"><i class="fa fa-plus"></i> Đặt phòng</a>
        </div>
        {{-- @include('datphongs.option') --}}
    </div>

    <div class="">
        <table class="table">
            <thead>
                <tr>
                    <th class="table-plus">id</th>
                    <th>Số lượng</th>
                    <th style="width: 1px"></th>
                    <th>Phòng hiện tại</th>
                    <th>Khách hàng</th>
                    <th>Xử lý</th>
                    <th>Thanh toán</th>
                    <th>Nhận phòng</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datphongs as $datphong)
                    <tr>
                        <td>{{ $datphong->datphongid }}</td>
                        <td>{{ $datphong->soluong }}</td>
                        <td>
                            <?php
                            $phongmax = App\Models\Danhsachdatphong::where('datphongid', $datphong->datphongid)
                                ->orderBy('id', 'desc')
                                ->first();
                            ?>
                            @if ($phongmax)
                                {{ $phongmax->phongid }}
                            @endif
                        </td>
                        <td>
                            <?php
                            $danhsachdatphongs = App\Models\Danhsachdatphong::where('datphongid', $datphong->datphongid)->get();
                            $nhanphongs = App\Models\Nhanphong::where('datphongid', $datphong->datphongid)->get();
                            $traphongs = App\Models\Traphong::where('datphongid', $datphong->datphongid)->get();
                            $huydatphongs = App\Models\Huydatphong::where('datphongid', $datphong->datphongid)->get();
                            $anuongdatphongs = App\Models\AnuongDatphong::where('datphongid', $datphong->datphongid)->get();
                            $dichvudatphongs = App\Models\DichvuDatphong::where('datphongid', $datphong->datphongid)->get();
                            $thanhtoans = App\Models\Thanhtoan::where('khachhangid', $datphong->id)->get();
                            ?>
                            {{-- KT co dat coc --}}
                            <?php $check = 0;
                            foreach ($thanhtoans as $thanhtoan) {
                                if ($thanhtoan) {
                                    $check++;
                                }
                            }
                            ?>
                            {{-- Lich su dat phong --}}
                            {{-- @include('datphongs.history') --}}
                            <a href="{{ route('datphongs.showHistoryPage', ['datphongid' => $datphong->datphongid, 'khachhangid' => $datphong->id]) }}"
                                target="_blank" class="badge bg-primary">
                                Chi tiết
                            </a>

                            {{-- Hien va xoa dich vu --}}
                            @hasrole('Admin')
                                {{-- @include('datphongs.dichvu') --}}
                            @endhasrole

                        </td>
                        <td>{{ $datphong->ten }}</td>
                        <td>
                            <form class="mt-1" action="{{ route('datphongs.xuly', $datphong->datphongid) }}"
                                method="Post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
                                <button type="submit"
                                    class="
                                        badge {{ $datphong->tinhtrangxuly == 0 ? 'bg-danger' : 'bg-success' }}">
                                    {{ $datphong->tinhtrangxuly == 0 ? 'Chưa' : 'Xác nhận' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            @if ($check != 0)
                                @if ($datphong->tinhtrangthanhtoan == 0)
                                    <p style="display:none">Chưa</p>
                                    @include('datphongs.actionButton.thanhtoan')
                                @else
                                    <p style="display:none">Xác nhận</p>
                                    @hasrole('Admin')
                                        @include('datphongs.actionButton.suathanhtoan')
                                    @else
                                        <label class="badge bg-success">
                                            Xác nhận
                                        </label>
                                    @endhasrole
                                @endif
                            @else
                                <label class="badge bg-danger">
                                    Chưa
                                </label>
                            @endif
                        </td>
                        <td>
                            @if ($check != 0)
                                @include('datphongs.actionButton.nhanphong')
                            @else
                                <label class="badge bg-danger">
                                    Chưa
                                </label>
                            @endif
                        </td>
                        <!-- Action -->
                        <td>

                            <!-- các chức năng sửa, xoá, thanh toán, nhận phòng khi chưa thanh toán -->
                            @if ($datphong->tinhtrangthanhtoan == 0)
                                <div class="d-flex">

                                    <!-- Đổi phòng -->
                                    @include('datphongs.actionButton.doiphong')

                                    <!-- Huỷ đặt phòng -->
                                    @include('datphongs.actionButton.huydatphong')

                                    <!-- Xoá -->
                                    @if ($datphong->tinhtrangnhanphong == 0)
                                        @hasrole('Admin')
                                            @include('datphongs.actionButton.xoa')
                                        @endhasrole
                                    @else
                                        <!-- Dịch vụ -->
                                        <div class="d-flex flex-column col-4">
                                            @include('datphongs.actionButton.dichvuButton')
                                            @include('datphongs.actionButton.anUongButton')
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-start gap-2">
                                    @if ($check == 0)
                                        {{-- //Đặt cọc --}}
                                        <div class="my-1 col-6">
                                            @foreach ($danhsachdatphongs as $danhsachdatphong)
                                                <a href="/thanhtoanvnpayview/{{ $datphong->datphongid }}/datcoc/{{ $datphong->id }}/{{ $danhsachdatphong->phongs->loaiphongs->gia / 2 }}"
                                                    class="btn btn-success">Đặt cọc online</a>
                                            @endforeach
                                        </div>
                                    @endif
                                    {{-- //Thanh toán
                                    @if ($check != 0)
                                        @include('datphongs.actionButton.thanhtoan')
                                    @endif

                                    //Nhận phòng, sửa nhận phòng
                                    @if ($check != 0)
                                        @include('datphongs.actionButton.nhanphong')
                                    @endif --}}
                                </div>

                                <!-- các chức năng sửa thanh toán và in hoá đơn nhận phòng khi đã thanh toán -->
                            @else
                                {{-- <div class="d-flex justify-content-start gap-1"> --}}
                                {{-- @can('role-edit')
                                            @include('datphongs.actionButton.suathanhtoan')
                                        @endcan --}}
                                @include('datphongs.actionButton.hoadon')
                                {{-- </div> --}}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(window).on('load', function() {
            if ((localStorage.getItem("filter"))) {
                var filter = localStorage.getItem("filter");
                if (filter == "thanhtoanOnly") {
                    setFilter('thanhtoanOnly', 'Xác nhận', 6)
                }
                if (filter == "chuathanhtoanOnly") {
                    setFilter('chuathanhtoanOnly', 'Chưa', 6)
                }
                if (filter == "xulyOnly") {
                    setFilter('xulyOnly', 'Xác nhận', 5)
                }
                if (filter == "chuaxulyOnly") {
                    setFilter('chuaxulyOnly', 'Chưa', 5)
                }
                if (filter == "nhanphongOnly") {
                    setFilter('nhanphongOnly', 'check', 7)
                }
                if (filter == "chuanhanphongOnly") {
                    setFilter('chuanhanphongOnly', 'Chưa', 7)
                }
            } else {
                localStorage.setItem("filter", "");
            }
        });
    </script>
@endsection
