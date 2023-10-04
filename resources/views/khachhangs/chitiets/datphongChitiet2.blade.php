@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
{{-- @include('layouts3.title', ['titlePage' => 'Đặt phòng ' . $datphongs[0]->id]) --}}
<ul class="nav nav-underline" id="myTab" role="tablist" id="myTab">
    <li class="nav-item" role="presentation"><a class="nav-link active" id="2phong-tab" data-bs-toggle="tab"
            href="#tab-2phong" role="tab" aria-controls="tab-2phong" aria-selected="false" tabindex="-1">Phòng -
            Khách hàng</a>
    </li>
    <li class="nav-item" role="presentation"><a class="nav-link" id="2thanhtoan-tab" data-bs-toggle="tab"
            href="#tab-2thanhtoan" role="tab" aria-controls="tab-2thanhtoan" aria-selected="false" tabindex="-1">
            Thanh toán - Dịch vụ
        </a></li>
</ul>
<!-- Modal -->

<div class="tab-content mt-3" id="myTabContent">
    <div class="tab-pane fade show active" id="tab-2phong" role="tabpanel" aria-labelledby="2phong-tab">
        <div class="row">
            <div class="col-6">
                <div class="card border mb-3 h-100">
                    <div class="card-body">
                        <h4 class="card-title">Thông tin chi tiết phòng</h4>
                        <input type="checkbox" name="" id="toggleView" checked hidden />
                        @include('datphongs.tabChitiet.tabPhong2')
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card border mb-3 h-100">
                    <div class="card-body">
                        <h4 class="card-title">Thông tin khách hàng</h4>
                        <input type="checkbox" name="" id="toggleView" checked hidden />
                        @include('datphongs.tabChitiet.tabKhachhang')
                        {{-- @include('datphongs.tabChitiet.tabThongtin') --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="tab-2thanhtoan" role="tabpanel" aria-labelledby="2thanhtoan-tab">
        <div class="row">
            <div class="col-6">
                <div class="card border mb-3 h-100">
                    <div class="card-body">
                        <input type="checkbox" name="" id="toggleView" checked hidden />
                        @include('datphongs.tabChitiet.tabThanhtoan')
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card border mb-3 h-100">
                    <div class="card-body">
                        <input type="checkbox" name="" id="toggleView" checked hidden />
                        @include('datphongs.tabChitiet.tabDichvu')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/tableToList/style.css">
<style>
    .card,
    hr {
        border: 1px black solid;
    }
</style>