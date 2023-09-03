@extends('layouts3.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <ul class="nav nav-underline" id="myTab" role="tablist" id="myTab">
        <li class="nav-item" role="presentation"><a class="nav-link active" id="phong-tab" data-bs-toggle="tab" href="#tab-phong"
                role="tab" aria-controls="tab-phong" aria-selected="false" tabindex="-1">Phòng - Khách hàng</a>
        </li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="thanhtoan-tab" data-bs-toggle="tab"
                href="#tab-thanhtoan" role="tab" aria-controls="tab-thanhtoan" aria-selected="false" tabindex="-1">
                Thanh toán - Dịch vụ
            </a></li>
    </ul>
    <!-- Modal -->

    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-phong" role="tabpanel" aria-labelledby="phong-tab">
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
                            @include('datphongs.tabChitiet.tabThongtin')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-thanhtoan" role="tabpanel" aria-labelledby="thanhtoan-tab">
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
@endsection
