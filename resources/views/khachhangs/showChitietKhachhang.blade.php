@extends('layouts3.app')

@section('content')
    @include('layouts3.title', ['titlePage' => 'Thông tin chi tiết khách hàng ' . $khachhangs[0]->ten])
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-6">
            <div class="card border mb-3 h-100">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h4 class="card-title">Thông tin khách hàng</h4>
                        </div>
                    </div>
                    <input type="checkbox" name="" id="toggleView" checked hidden />
                    @include('khachhangs.chitiets.indexChitiet')
                </div>
            </div>
        </div>
        @isset($khachhangs[0]->users)
            <div class="col-6">
                <div class="card border mb-3 h-100">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4 class="card-title">Thông tin tài khoản</h4>
                            </div>
                        </div>
                        <input type="checkbox" name="" id="toggleView" checked hidden />
                        @include('khachhangs.chitiets.userChitiet')
                    </div>
                </div>
            </div>
        @endisset

        @if ($request->view == 'list')
            <div class="col-12 mt-3">
                <div class="card border mb-3 h-100">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4 class="card-title ">Danh sách đặt phòng của khách hàng</h4>
                            </div>
                            @include('khachhangs.button.danhsachdatphongGridOrList')
                        </div>
                        @include('khachhangs.chitiets.datphongChitiet')
                    </div>
                </div>
            </div>
        @else
            <div class="col-12 mt-3">
                <div class="card border mb-3 h-100">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h4 class="card-title">Danh sách đặt phòng của khách hàng</h4>
                            </div>
                            @include('khachhangs.button.danhsachdatphongGridOrList')
                        </div>
                        @include('khachhangs.chitiets.datphongChitiet2')
                    </div>
                </div>
            </div>
        @endif
    </div>
    <link rel="stylesheet" href="/tableToList/style.css">
@endsection
