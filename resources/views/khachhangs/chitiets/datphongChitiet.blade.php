@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="d-flex gap-1">
    {{-- <div class="flex-grow-1">
                            @include('layouts3.title', ['titlePage' => 'Quản lý đặt phòng'])
                        </div>
                        <div>
                            <a class="btn btn-success" href="{{ route('datphongs.create') }}"><i class="fa fa-plus"></i> Đặt
                                phòng</a>
                        </div> --}}
    <?php $today = date('Y-m-d'); ?>
    {{-- <div>
                            <a href="/datphongs-kiemtra?ngaydat={{ $today }}&ngaytra={{ $today }}&soluong=1&tinhtrangthanhtoan=0&tinhtrangnhanphong=0"
                                class="btn btn-primary">
                                Hiện phòng trống</a>
                        </div> --}}
    {{-- @include('datphongs.option') --}}
</div>

@hasrole('MainAdmin')
    <div class="d-flex gap-1 mb-3">
        <div>
            <button class="btn btn-primary" id="chinhanhBtn" onclick="locChinhanh('')">Tất cả</button>
        </div>
        @foreach ($chinhanhs as $chinhanh)
            <div>
                <button class="btn btn-primary" id="chinhanhBtn{{ $chinhanh->id }}"
                    onclick="locChinhanh('{{ $chinhanh->ten }}')">{{ $chinhanh->ten }}</button>
            </div>
        @endforeach
    </div>
@endhasrole

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
            role="tab" aria-controls="tab-dichvu" aria-selected="false" tabindex="-1">Dịch vụ</a></li>
    <li class="nav-item" role="presentation"><a class="nav-link" id="khachhang-tab" data-bs-toggle="tab"
            href="#tab-khachhang" role="tab" aria-controls="tab-khachhang" aria-selected="false"
            tabindex="-1">Khách hàng</a></li>
    <li class="nav-item" role="presentation"><a class="nav-link" id="thanhtoan-tab" data-bs-toggle="tab"
            href="#tab-thanhtoan" role="tab" aria-controls="tab-thanhtoan" aria-selected="false" tabindex="-1">Chi
            tiết đặt phòng</a></li>
</ul>
<div class="tab-content mt-3" id="myTabContent">
    <div class="tab-pane fade show active" id="tab-thongtin" role="tabpanel" aria-labelledby="thongtin-tab">
        @include('datphongs.tab.tabThongtin')
    </div>
    <div class="tab-pane fade" id="tab-phong" role="tabpanel" aria-labelledby="phong-tab">
        @include('datphongs.tab.tabPhong')
    </div>
    <div class="tab-pane fade" id="tab-phong2" role="tabpanel" aria-labelledby="phong2-tab">
        @include('datphongs.tab.tabPhong2')
    </div>
    <div class="tab-pane fade" id="tab-dichvu" role="tabpanel" aria-labelledby="dichvu-tab">
        @include('datphongs.tab.tabDichvu')
    </div>
    <div class="tab-pane fade" id="tab-khachhang" role="tabpanel" aria-labelledby="khachhang-tab">
        @include('datphongs.tab.tabKhachhang')
    </div>
    <div class="tab-pane fade" id="tab-thanhtoan" role="tabpanel" aria-labelledby="thanhtoan-tab">
        @include('datphongs.tab.tabThanhtoan')
    </div>
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
