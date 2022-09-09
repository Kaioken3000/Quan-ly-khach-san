@extends('layouts.app')

@section('content')
@guest
<div class="bg-light p-5 text-center">
    <h1>💖💖💖💖💖💖Dashboard💖💖💖💖💖💖</h1>
    <p class="lead">Hãy đăng nhập để vào hệ thống</p>
</div>
@endguest



@auth
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-hotel rounded  btn-outline-success p-2 border border-success"></i>
                        </div>
                        <a href="{{ route('phongs.index') }}">Detail</a>
                    </div>
                    <span class="fw-semibold d-block mb-1">Phòng</span>
                    <h3 class="card-title mb-2">{{ $sophong }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-user rounded  btn-outline-info p-2 border border-info"></i>
                        </div>
                        <a href="{{ route('khachhangs.index') }}">Detail</a>
                    </div>
                    <span class="fw-semibold d-block mb-1">Khách hàng</span>
                    <h3 class="card-title mb-2">{{ $sokhachhang }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-group rounded  btn-outline-danger p-2 border border-danger"></i>
                        </div>
                        <a href="{{ route('nhanviens.index') }}">Detail</a>
                    </div>
                    <span class="fw-semibold d-block mb-1">Nhân viên</span>
                    <h3 class="card-title mb-2">{{ $sonhanvien }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-user-circle rounded  btn-outline-primary p-2 border border-primary"></i>
                        </div>
                        <a href="{{ route('users.index') }}">Detail</a>
                    </div>
                    <span class="fw-semibold d-block mb-1">Account</span>
                    <h3 class="card-title mb-2">{{ $souser }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection