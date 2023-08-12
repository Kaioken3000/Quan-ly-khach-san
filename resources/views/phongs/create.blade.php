@extends('layouts3.app')

@section('content')
    <!-- Create -->
    @hasrole('Admin')
        @error('thietbiid')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        @error('giuongid')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
        @error('mieutaid')
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
        </ul>
        <div class="tab-content clearfix">
            <!-- Modal Create -->
            <div class="tab-content clearfix">
                <div class="tab-content mt-3" id="myTabContent">
                    <div class="overflow-auto tab-pane fade show active" id="tab-thongtin" role="tabpanel"
                        aria-labelledby="thongtin-tab">
                        <form action="{{ route('phongs.store') }}" method="POST">
                            @csrf
                            @foreach ($thietbis as $thietbi)
                                <input class="form-check-input" type="checkbox" id="thietbi{{ $thietbi->id }}"
                                    name="thietbiid[]" value="{{ $thietbi->id }}" hidden>
                            @endforeach
                            @foreach ($giuongs as $giuong)
                                <input class="form-check-input" type="checkbox" id="giuong{{ $giuong->id }}" name="giuongid[]"
                                    value="{{ $giuong->id }}" hidden>
                            @endforeach
                            @foreach ($mieutas as $mieuta)
                                <input class="form-check-input" type="checkbox" id="mieuta{{ $mieuta->id }}" name="mieutaid[]"
                                    value="{{ $mieuta->id }}" hidden>
                            @endforeach
                            @foreach ($hinhs as $hinh)
                                <input class="form-check-input" type="checkbox" id="hinh{{ $hinh->id }}" name="hinhid[]"
                                    value="{{ $hinh->id }}" hidden>
                            @endforeach
                            @include('phongs.tab.tabThongTinChung')
                            <button type="submit" class="btn btn-primary mt-3"> Xác nhận</button>
                        </form>
                    </div>
                    <div class="overflow-auto tab-pane fade" id="tab-thietbi" role="tabpanel"
                        aria-labelledby="thietbi-tab">
                        @include('phongs.tab.tabThietBi')
                    </div>
                    <div class="overflow-auto tab-pane fade" id="tab-giuong" role="tabpanel"
                        aria-labelledby="giuong-tab">
                        @include('phongs.tab.tabGiuong')
                    </div>
                    <div class="overflow-auto tab-pane fade" id="tab-hinh" role="tabpanel"
                        aria-labelledby="hinh-tab">
                        @include('phongs.tab.tabHinh')
                    </div>
                    <div class="overflow-auto tab-pane fade" id="tab-mieuta" role="tabpanel"
                        aria-labelledby="mieuta-tab">
                        @include('phongs.tab.tabMieuTa')
                    </div>

                    <script>
                        function changeBoder(ele, element) {
                            var elementBtn = document.getElementById(element);
                            if (elementBtn.checked == true) {
                                ele.style.border = 'none';
                            } else {
                                ele.style.border = '3px black solid';
                            }
                        }
                    </script>
                </div>
            </div>

        </div>
    @endhasrole
@endsection
