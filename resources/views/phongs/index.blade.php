@extends('layouts3.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="">
        <div class="d-flex">
            <div class="flex-grow-1">
                @include('layouts3.title', ['titlePage' => 'Quản lý phòng'])
            </div>
            <div>
                {{-- @include('phongs.create') --}}
                <a href="{{ route('phongs.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Create Phòng</a>
            </div>
        </div>

        <ul class="nav nav-underline" id="myTab" role="tablist">
            <li class="nav-item" role="presentation"><a class="nav-link active" id="thongtin-tab" data-bs-toggle="tab"
                    href="#tab-thongtin" role="tab" aria-controls="tab-thongtin" aria-selected="true">Thông tin</a></li>

            <li class="nav-item" role="presentation"><a class="nav-link" id="hinh-tab" data-bs-toggle="tab"
                    href="#tab-hinh" role="tab" aria-controls="tab-hinh" aria-selected="false" tabindex="-1">Hình</a>
            </li>

            <li class="nav-item" role="presentation"><a class="nav-link" id="thietbi-tab" data-bs-toggle="tab"
                    href="#tab-thietbi" role="tab" aria-controls="tab-thietbi" aria-selected="false"
                    tabindex="-1">Thiết
                    bị</a></li>

            <li class="nav-item" role="presentation"><a class="nav-link" id="giuong-tab" data-bs-toggle="tab"
                    href="#tab-giuong" role="tab" aria-controls="tab-giuong" aria-selected="false"
                    tabindex="-1">Giường</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" id="mieuta-tab" data-bs-toggle="tab"
                    href="#tab-mieuta" role="tab" aria-controls="tab-mieuta" aria-selected="false" tabindex="-1">Miêu
                    tả</a></li>
        </ul>
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-thongtin" role="tabpanel" aria-labelledby="thongtin-tab">
                @include('phongs.mainTab.tabThongtin')  
            </div>
            <div class="tab-pane fade" id="tab-hinh" role="tabpanel" aria-labelledby="hinh-tab">
                @include('hinhs.create')
                @include('phongs.mainTab.tabHinh')
            </div>
            <div class="tab-pane fade" id="tab-thietbi" role="tabpanel" aria-labelledby="thietbi-tab">
                @include('thietbis.create')
                @include('phongs.mainTab.tabThietbi')
            </div>
            <div class="tab-pane fade" id="tab-giuong" role="tabpanel" aria-labelledby="giuong-tab">
                @include('giuongs.create')
                @include('phongs.mainTab.tabGiuong')
            </div>
            <div class="tab-pane fade" id="tab-mieuta" role="tabpanel" aria-labelledby="mieuta-tab">
                @include('mieutas.create')
                @include('phongs.mainTab.tabMieuta')
            </div>
        </div>

    </div>
@endsection
