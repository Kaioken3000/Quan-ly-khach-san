@extends('layouts3.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="d-flex">
        <div class="flex-grow-1">
            @include('layouts3.title', ['titlePage' => 'Quản lý chi nhánh'])
        </div>
        <div>
            {{-- @include('chinhanhs.create') --}}
            <a href="{{ route('chinhanhs.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Create Chi
                nhánh</a>
        </div>
    </div>
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
            @include('chinhanhs.mainTab.tabThongtin')
        </div>
        <div class="tab-pane fade" id="tab-hinh" role="tabpanel" aria-labelledby="hinh-tab">
            @include('chinhanhs.mainTab.tabHinh')
        </div>
        <div class="tab-pane fade" id="tab-mieuta" role="tabpanel" aria-labelledby="mieuta-tab">
            @include('chinhanhs.mainTab.tabMieuta')
        </div>
    </div>
@endsection
