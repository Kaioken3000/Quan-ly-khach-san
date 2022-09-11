@extends('layouts.app')

@section('content')
<div class="container mt-2">
  <br>
  <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('khachhangs.index') }}"><i class="bx bx-chevron-left mb-1"></i> Back</a>
  </div>
  <h4 class="fw-bold py-3"><span class="text-muted fw-light">Đặt phòng/</span> Create</h4>
  @if(session('status'))
  <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
  </div>
  @endif
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4 col-xl-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">From nhập liệu</h5>
          <small class="text-muted float-end"><i class="fa fa-star"></i></small>
        </div>
        <div class="card-body">
          <form action="{{ route('datphong.create') }}" method="GET">
            <div class="mb-3">
              <label class="form-label" for="ngaydat">Ngày vào</label>
              <input type="date" name="ngaydat" class="form-control" id="ngaydat"/>
              @error('ngaydat')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="ngaytra">Ngày ra</label>
              <input type="date" name="ngaytra" class="form-control" id="ngaytra"/>
              @error('ngaytra')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="soluong">Số lượng</label>
              <input type="number" name="soluong" class="form-control" id="soluong"/>
              @error('soluong')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="ten">Họ tên</label>
              <input type="text" name="ten" class="form-control" id="ten" placeholder="VD: Lý Nhựt Nam" />
              @error('ten')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="sdt">Số điện thoại</label>
              <input type="text" name="sdt" class="form-control" id="sdt" placeholder="VD: 001" />
              @error('sdt')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="VD: 001"/>
              @error('email')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <input type="hidden" name="khachhangid" value="{{ $khachhangs }}">
            <input type="hidden" name="tinhtrangthanhtoan" value=0>
            <input type="hidden" name="tinhtrangnhanphong" value=0>
            <button type="submit" class="btn btn-primary">Xác nhận</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection