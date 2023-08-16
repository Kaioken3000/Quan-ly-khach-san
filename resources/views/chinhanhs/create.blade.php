@extends('layouts3.app')

@section('content')
    @error('mieutaid')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror
    @error('hinhid')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @enderror
    <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item" role="presentation"><a class="nav-link active" id="thongtin-tab" data-bs-toggle="tab"
                href="#tab-thongtin" role="tab" aria-controls="tab-thongtin" aria-selected="true">Thông tin</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="hinh-tab" data-bs-toggle="tab" href="#tab-hinh"
                role="tab" aria-controls="tab-hinh" aria-selected="true">Hình</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="mieuta-tab" data-bs-toggle="tab" href="#tab-mieuta"
                role="tab" aria-controls="tab-mieuta" aria-selected="true">Miêu tả</a></li>
    </ul>
    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-thongtin" role="tabpanel" aria-labelledby="thongtin-tab">
            @include('chinhanhs.tab.tabThongtin')
        </div>
        <div class="tab-pane fade" id="tab-hinh" role="tabpanel" aria-labelledby="hinh-tab">
            @include('chinhanhs.tab.tabHinh')
        </div>
        <div class="tab-pane fade" id="tab-mieuta" role="tabpanel" aria-labelledby="mieuta-tab">
            @include('chinhanhs.tab.tabMieuta')
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
@endsection
