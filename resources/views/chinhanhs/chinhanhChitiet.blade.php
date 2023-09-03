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
                role="tab" aria-controls="tab-hinh" aria-selected="true">Hình</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" id="mieuta-tab" data-bs-toggle="tab" href="#tab-mieuta"
                role="tab" aria-controls="tab-mieuta" aria-selected="true">Miêu tả</a></li>
    </ul> --}}
    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-thongtin" role="tabpanel" aria-labelledby="thongtin-tab">
            <div class="row">
                <div class="col-6">
                    <div class="card border mb-3">
                        <div class="card-body">
                            <input type="checkbox" name="" id="toggleView" checked hidden />
                            @include('chinhanhs.mainTabChitiet.tabThongtin')
                        </div>
                    </div>
                    <div class="card border mb-3">
                        <div class="card-body">
                            <input type="checkbox" name="" id="toggleView" checked hidden />
                            @include('chinhanhs.mainTabChitiet.tabMieuta')
                        </div>
                    </div>
                </div>
                {{-- <div class="col-6">
                    <div class="card border mb-3">
                        <div class="card-body">
                            <input type="checkbox" name="" id="toggleView" checked hidden />
                            
                        </div>
                    </div>
                </div> --}}
                <div class="col-6">
                    <div class="card border mb-3">
                        <div class="card-body">
                            <input type="checkbox" name="" id="toggleView" checked hidden />
                            @include('chinhanhs.mainTabChitiet.tabHinh')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="tab-pane fade" id="tab-hinh" role="tabpanel" aria-labelledby="hinh-tab">
            <input type="checkbox" name="" id="toggleView" checked hidden />
            @include('chinhanhs.mainTabChitiet.tabHinh')
        </div>
        <div class="tab-pane fade" id="tab-mieuta" role="tabpanel" aria-labelledby="mieuta-tab">
            <input type="checkbox" name="" id="toggleView" checked hidden />
            @include('chinhanhs.mainTabChitiet.tabMieuta')
        </div> --}}
    </div>
    <link rel="stylesheet" href="/tableToList/style.css">
@endsection
