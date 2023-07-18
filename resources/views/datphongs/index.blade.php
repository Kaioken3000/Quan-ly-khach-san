@extends('layouts2.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Đặt phòng /</span> Quản lý</h4>
        <div class="d-flex align-items-end my-2 ">
            <div class="mr-auto">
                <a class="btn btn-success" href="{{ route('datphongs.create') }}"><i class="fa fa-plus mb-1"></i> Đặt phòng</a>
            </div>

            {{-- @include('datphongs.option') --}}

        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card-box  pb-10">
            <div class="h5 pd-20 mb-0">Quản lý loại phòng</div>
            <table class="data-table table nowrap" id="datphongtable">
                <thead>
                    <tr>
                        <th class="table-plus">id</th>
                        <th>Số lượng</th>
                        <th colspan="2">Phòng hiện tại</th>
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
                                $dichvudatphongs = App\Models\DichvuDatphong::where('datphongid', $datphong->datphongid)->get();
                                $thanhtoans = App\Models\Thanhtoan::where('khachhangid', $datphong->id)->get();
                                ?>
                                {{-- Lich su dat phong --}}
                                @include('datphongs.history')

                                {{-- Hien va xoa dich vu --}}
                                @hasrole('Admin')
                                    @include('datphongs.dichvu')
                                @endhasrole

                            </td>
                            <td>{{ $datphong->ten }}</td>
                            <td>
                                <form class="mb-2" action="{{ route('datphongs.xuly', $datphong->datphongid) }}"
                                    method="Post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $datphong->datphongid }}">
                                    <button type="submit"
                                        class="m-0 border-0 
                                        badge {{ $datphong->tinhtrangxuly == 0 ? 'badge-danger' : 'badge-success' }}">
                                        {{ $datphong->tinhtrangxuly == 0 ? 'Chưa' : 'Xác nhận' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <label
                                    class="badge {{ $datphong->tinhtrangthanhtoan == 0 ? 'badge-danger' : 'badge-success' }}">
                                    {{ $datphong->tinhtrangthanhtoan == 0 ? 'Chưa' : 'Xác nhận' }}
                                </label>
                            </td>
                            <td>
                                <label
                                    class="badge {{ $datphong->tinhtrangnhanphong == 0 ? 'badge-danger' : 'badge-success' }}">
                                    {{ $datphong->tinhtrangnhanphong == 0 ? 'Chưa' : 'Xác nhận' }}
                                </label>
                            </td>
                            <!-- Action -->
                            <td>

                                <!-- các chức năng sửa, xoá, thanh toán, nhận phòng khi chưa thanh toán -->
                                @if ($datphong->tinhtrangthanhtoan == 0)
                                    <div class="row">

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
                                            <div class="row">
                                                <!-- Dịch vụ -->
                                                @include('datphongs.actionButton.dichvuButton')
                                            </div>
                                        @endif
                                    </div>
                                    {{-- KT co dat coc --}}
                                    <?php $check = 0;
                                    foreach ($thanhtoans as $thanhtoan) {
                                        if ($thanhtoan) {
                                            $check++;
                                        }
                                    }
                                    ?>
                                    <div class="d-flex justify-content-start">
                                        @if ($check == 0)
                                            {{-- Đặt cọc --}}
                                            <div class="my-1 col-6">
                                                <a href="/thanhtoanvnpayview/{{ $datphong->datphongid }}/datcoc/{{ $datphong->id }}/{{ $danhsachdatphong->phongs->loaiphongs->gia / 2 }}"
                                                    class="btn btn-success">Đặt cọc online</a>
                                            </div>
                                        @endif
                                        <!-- Thanh toán -->
                                        @if ($check != 0)
                                            @include('datphongs.actionButton.thanhtoan')
                                        @endif

                                        <!-- Nhận phòng, sửa nhận phòng -->
                                        @if ($check != 0)
                                            @include('datphongs.actionButton.nhanphong')
                                        @endif
                                    </div>

                                    <!-- các chức năng sửa thanh toán và in hoá đơn nhận phòng khi đã thanh toán -->
                                @else
                                    <div class="d-flex justify-content-start">
                                        @can('role-edit')
                                            @include('datphongs.actionButton.suathanhtoan')
                                        @endcan
                                        @include('datphongs.actionButton.hoadon')
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                    <td>
                        {!! $datphongs->links("pagination::bootstrap-4") !!}
                    </td>
                </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
    <script src="/adminresource/js/optiondatphong.js"></script>
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
                    setFilter('nhanphongOnly', 'Xác nhận', 7)
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
