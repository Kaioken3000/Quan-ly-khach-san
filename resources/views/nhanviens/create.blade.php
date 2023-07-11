@extends('layouts2.app')

@section('content')
<div class="container mt-2">
  <br>
  <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('nhanviens.index') }}"> <i class="bx bx-chevron-left mb-1"></i> Back</a>
  </div>
  <h4 class="fw-bold py-3"><span class="text-muted fw-light">Nhân viên/</span> Create</h4>
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
          <form action="{{ route('nhanviens.store') }}" method="POST" >
            @csrf
            <div class="mb-3">
              <label class="form-label" for="ma">Mã nhân viên</label>
              <input type="text" name="ma" class="form-control" id="ma" placeholder="VD: NV1" require="require"/>
              @error('ma')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="ten">Tên nhân viên</label>
              <input type="text" name="ten" class="form-control" id="ten" placeholder="VD: Phòng VIP" require="require"/>
              @error('ten')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="luong">Lương nhân viên</label>
              <input type="number" name="luong" class="form-control" id="luong" min=0 require="require"/>
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
@endsection