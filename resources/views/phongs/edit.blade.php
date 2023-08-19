@extends('layouts3.app')

@section('content')
    <!-- Create -->
    @hasanyrole('MainAdmin|Admin')
        @error('thietbiid')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        @error('giuongid')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        @error('mieutaid')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        @error('hinhid')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        <ul class="nav nav-underline" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="thongtin-tab" data-bs-toggle="tab" href="#tab-thongtin"
                    role="tab" aria-controls="tab-thongtin" aria-selected="true">Thông tin chung</a></li>
            <li class="nav-item"><a class="nav-link" id="thietbi-tab" data-bs-toggle="tab" href="#tab-thietbi" role="tab"
                    aria-controls="tab-thietbi" aria-selected="false">Thiết bị</a></li>
            <li class="nav-item"><a class="nav-link" id="giuong-tab" data-bs-toggle="tab" href="#tab-giuong" role="tab"
                    aria-controls="tab-giuong" aria-selected="false">Giường</a></li>
            <li class="nav-item"><a class="nav-link" id="mieuta-tab" data-bs-toggle="tab" href="#tab-mieuta" role="tab"
                    aria-controls="tab-mieuta" aria-selected="false">Miêu tả</a></li>
            <li class="nav-item"><a class="nav-link" id="hinh-tab" data-bs-toggle="tab" href="#tab-hinh" role="tab"
                    aria-controls="tab-hinh" aria-selected="false">Hình</a></li>
            <li class="nav-item"><a class="nav-link" id="virtualtour-tab" data-bs-toggle="tab" href="#tab-virtualtour"
                    role="tab" aria-controls="tab-virtualtour" aria-selected="false">Virtual Tour</a></li>
        </ul>
        <div class="tab-content clearfix">
            <!-- Modal Create -->
            <div class="tab-content clearfix">
                <div class="tab-content mt-3" id="myTabContent">
                    <div class="overflow-auto tab-pane fade show active" id="tab-thongtin" role="tabpanel"
                        aria-labelledby="thongtin-tab">
                        <form action="{{ route('phongs.update', $phong->so_phong) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @foreach ($thietbis as $thietbi)
                                <input class="form-check-input" type="checkbox" id="thietbi{{ $thietbi->id }}"
                                    <?php
                                    if (isset($phong)) {
                                        foreach ($phong->thietbiphongs as $thietbiphong) {
                                            if ($thietbi->id === $thietbiphong->thietbiid) {
                                                echo 'checked';
                                            }
                                        }
                                    }
                                    ?> name="thietbiid[]" value="{{ $thietbi->id }}" hidden>
                            @endforeach
                            @foreach ($giuongs as $giuong)
                                <input class="form-check-input" type="checkbox" id="giuong{{ $giuong->id }}"
                                    <?php
                                    if (isset($phong)) {
                                        foreach ($phong->giuongphongs as $giuongphong) {
                                            if ($giuong->id === $giuongphong->giuongid) {
                                                echo 'checked';
                                            }
                                        }
                                    }
                                    ?> name="giuongid[]" value="{{ $giuong->id }}" hidden>
                            @endforeach
                            @foreach ($mieutas as $mieuta)
                                <input class="form-check-input" type="checkbox" id="mieuta{{ $mieuta->id }}"
                                    <?php
                                    if (isset($phong)) {
                                        foreach ($phong->mieutaphongs as $mieutaphong) {
                                            if ($mieuta->id === $mieutaphong->mieutaid) {
                                                echo 'checked';
                                            }
                                        }
                                    }
                                    ?> name="mieutaid[]" value="{{ $mieuta->id }}" hidden>
                            @endforeach
                            @foreach ($hinhs as $hinh)
                                <input class="form-check-input" type="checkbox" id="hinh{{ $hinh->id }}"
                                    <?php
                                    if (isset($phong)) {
                                        foreach ($phong->hinhphongs as $hinhphong) {
                                            if ($hinh->id === $hinhphong->hinhid) {
                                                echo 'checked';
                                            }
                                        }
                                    }
                                    ?> name="hinhid[]" value="{{ $hinh->id }}" hidden>
                            @endforeach
                            @foreach ($virtualtours as $virtualtour)
                                <input class="form-check-input" type="checkbox" id="virtualtour{{ $virtualtour->id }}"
                                    <?php
                                    if (isset($phong)) {
                                        foreach ($phong->virtualtourphongs as $virtualtourphong) {
                                            if ($virtualtour->id === $virtualtourphong->virtualtourid) {
                                                echo 'checked';
                                            }
                                        }
                                    }
                                    ?> name="virtualtourid[]" value="{{ $virtualtour->id }}" hidden>
                            @endforeach
                            @include('phongs.tab.tabThongTinChung')
                            <button type="submit" class="btn btn-primary mt-3"> Xác nhận</button>
                        </form>
                    </div>
                    <div class="overflow-auto tab-pane fade" id="tab-thietbi" role="tabpanel" aria-labelledby="thietbi-tab">
                        @include('phongs.tab.tabThietBi')
                    </div>
                    <div class="overflow-auto tab-pane fade" id="tab-giuong" role="tabpanel" aria-labelledby="giuong-tab">
                        @include('phongs.tab.tabGiuong')
                    </div>
                    <div class="overflow-auto tab-pane fade" id="tab-hinh" role="tabpanel" aria-labelledby="hinh-tab">
                        @include('phongs.tab.tabHinh')
                    </div>
                    <div class="overflow-auto tab-pane fade" id="tab-mieuta" role="tabpanel" aria-labelledby="mieuta-tab">
                        @include('phongs.tab.tabMieuTa')
                    </div>
                    <div class="overflow-auto tab-pane fade" id="tab-virtualtour" role="tabpanel" aria-labelledby="virtualtour-tab">
                        @include('phongs.tab.tabVirtualtour')
                    </div>
                </div>
            </div>
        </div>
        <script>
            function changeBoder(ele, element) {
                var elementBtn = document.getElementById(element);
                var eleBtn = document.getElementById(ele);
                if (elementBtn.checked == true) {
                    eleBtn.style.border = 'none';
                } else {
                    eleBtn.style.border = '3px black solid';
                }
            }
        </script>
    @endhasanyrole
@endsection
