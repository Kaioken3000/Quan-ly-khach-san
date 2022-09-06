@extends('layouts.app')

@section('content')
<div class="container mt-2">
  <br>
  <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('nhanviens.index') }}"> <i class="bx bx-chevron-left mb-1"></i> Back</a>
  </div>
  <h4 class="fw-bold py-3"><span class="text-muted fw-light">Nhân viên/</span> Edit</h4>
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
          <form action="{{ route('nhanviens.update',$nhanvien->ma) }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label" for="ma">Mã nhân viên</label>
              <input type="text" name="ma" class="form-control" id="ma" placeholder="VD: NV1" require="require"
                value="{{ $nhanvien->ma }}"/>
              @error('ma')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="ten">Tên nhân viên</label>
              <input type="text" name="ten" class="form-control" id="ten" placeholder="VD: Phòng VIP" require="require"
                value="{{ $nhanvien->ten }}"/>
              @error('ten')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="luong">Lương nhân viên</label>
              <input type="number" name="luong" class="form-control" id="luong" min=0 require="require"
                value="{{ $nhanvien->luong }}"/>
              @error('luong')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Xác nhận</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection