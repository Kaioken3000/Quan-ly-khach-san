@extends('layouts3.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    {{-- <ul class="nav nav-underline" id="myTab" role="tablist" id="myTab">
        <li class="nav-item" role="presentation"><a class="nav-link active" id="thongtin-tab" data-bs-toggle="tab"
                href="#tab-thongtin" role="tab" aria-controls="tab-thongtin" aria-selected="true">Thông tin</a></li>

        <li class="nav-item" role="presentation"><a class="nav-link" id="hinh-tab" data-bs-toggle="tab" href="#tab-hinh"
                role="tab" aria-controls="tab-hinh" aria-selected="false" tabindex="-1">Hình</a>
        </li>

        <li class="nav-item" role="presentation"><a class="nav-link" id="thietbi-tab" data-bs-toggle="tab"
                href="#tab-thietbi" role="tab" aria-controls="tab-thietbi" aria-selected="false" tabindex="-1">Thiết
                bị</a></li>

        <li class="nav-item" role="presentation"><a class="nav-link" id="giuong-tab" data-bs-toggle="tab" href="#tab-giuong"
                role="tab" aria-controls="tab-giuong" aria-selected="false" tabindex="-1">Giường</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="mieuta-tab" data-bs-toggle="tab" href="#tab-mieuta"
                role="tab" aria-controls="tab-mieuta" aria-selected="false" tabindex="-1">Miêu
                tả</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="virtualTour-tab" data-bs-toggle="tab"
                href="#tab-virtualTour" role="tab" aria-controls="tab-virtualTour" aria-selected="false"
                tabindex="-1">Virtual Tour</a></li>
    </ul> --}}
    <ul class="nav nav-underline" id="myTab" role="tablist" id="myTab">
        <li class="nav-item" role="presentation"><a class="nav-link active" id="thongtin-tab" data-bs-toggle="tab"
                href="#tab-thongtin" role="tab" aria-controls="tab-thongtin" aria-selected="true">Thông tin - Thiết
                bị</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="giuong-tab" data-bs-toggle="tab" href="#tab-giuong"
                role="tab" aria-controls="tab-giuong" aria-selected="false" tabindex="-1">Giường - Miêu tả</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="hinh-tab" data-bs-toggle="tab" href="#tab-hinh"
                role="tab" aria-controls="tab-hinh" aria-selected="false" tabindex="-1">Hình - Virtual Tours</a>
        </li>
    </ul>
    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-thongtin" role="tabpanel" aria-labelledby="thongtin-tab">
            <div class="row">
                <div class="col-6">
                    <div class="card border border-dark mb-3">
                        <div class="card-body">
                            <input type="checkbox" name="" id="toggleView" checked hidden />
                            @include('phongs.mainTabChitiet.tabThongtin')
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card border border-dark mb-3">
                        <div class="card-body">
                            <input type="checkbox" name="" id="toggleView" checked hidden />
                            @include('phongs.mainTabChitiet.tabThietbi')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-giuong" role="tabpanel" aria-labelledby="giuong-tab">
            <div class="row">
                <div class="col-6">
                    <div class="card border border-dark mb-3">
                        <div class="card-body">
                            <input type="checkbox" name="" id="toggleView" checked hidden />
                            @include('phongs.mainTabChitiet.tabGiuong')
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card border border-dark mb-3">
                        <div class="card-body">
                            <input type="checkbox" name="" id="toggleView" checked hidden />
                            @include('phongs.mainTabChitiet.tabMieuta')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-hinh" role="tabpanel" aria-labelledby="hinh-tab">
            <div class="row">
                <div class="col-6">
                    <div class="card border border-dark mb-3">
                        <div class="card-body">
                            <input type="checkbox" name="" id="toggleView" checked hidden />
                            @include('phongs.mainTabChitiet.tabHinh')
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card border border-dark mb-3">
                        <div class="card-body">
                            <input type="checkbox" name="" id="toggleView" checked hidden />
                            @include('phongs.mainTabChitiet.tabVirtualTour')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="/tableToList/style.css">
@endsection
