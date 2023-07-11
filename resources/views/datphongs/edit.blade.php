@extends('layouts2.app')

@section('content')
<div class="container mt-2">
  <br>
  <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('datphongs.index') }}"><i class="bx bx-chevron-left mb-1"></i> Back</a>
  </div>
  <h4 class="fw-bold py-3"><span class="text-muted fw-light">Đặt phòng/</span> Edit</h4>
  @if(session('status'))
  <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
  </div>
  @endif
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card-box">
        <div class="card-header">
          <h5 class="mb-0">From nhập liệu</h5>
          
        </div>
        <div class="card-body">
          <form action="/datphongs-kiemtra-capnhat" method="GET">
            <div class="mb-3">
              <label class="form-label" for="ngaydat">Ngày vào</label>
              <input type="date" name="ngaydat" class="form-control" id="ngaydat" placeholder="VD: Lý Nhựt Nam" value="{{ $datphong->ngaydat }}" />
              @error('ngaydat')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="ngaytra">Ngày ra</label>
              <input type="date" name="ngaytra" class="form-control" id="ngaytra" placeholder="VD: Lý Nhựt Nam" value="{{ $datphong->ngaytra }}" />
              @error('ngaytra')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="soluong">Số lượng</label>
              <input type="number" name="soluong" class="form-control" id="soluong" placeholder="VD: 001" value="{{ $datphong->soluong }}" />
              @error('soluong')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
              <input type="hidden" name="khachhangid" value="{{ $datphong->khachhangid }}">
              <input type="hidden" name="id" value="{{ $datphong->id }}">
            </div>
            <input type="hidden" name="tinhtrangthanhtoan" class="form-check-input" id="tinhtrangthanhtoan" value="{{ $datphong->tinhtrangthanhtoan }}" {{ ($datphong->tinhtrangthanhtoan==1) ? 'checked':'' }} />
            <input type="hidden" name="tinhtrangnhanphong" class="form-check-input" id="tinhtrangnhanphong" value="{{ $datphong->tinhtrangnhanphong }}" {{ ($datphong->tinhtrangnhanphong==1) ? 'checked':'' }} />
            <button type="submit" class="btn btn-primary">Xác nhận</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection