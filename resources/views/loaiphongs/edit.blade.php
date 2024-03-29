@extends('layouts.app')

@section('content')
<div class="container mt-2">
  <br>
  <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('loaiphongs.index') }}"> <i class="bx bx-chevron-left mb-1"></i> Back</a>
  </div>
  <h4 class="fw-bold py-3"><span class="text-muted fw-light">Loại phòng/</span> Edit</h4>
  @if(session('status'))
  <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
  </div>
  @endif
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4 col-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">From nhập liệu</h5>
          <small class="text-muted float-end"><i class="fa fa-star"></i></small>
        </div>
        <div class="card-body">
          <form action="{{ route('loaiphongs.update',$loaiphong->ma) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label" for="ma">Mã loại phòng</label>
              <input type="text" name="ma" class="form-control" value="{{ $loaiphong->ma }}" id="ma" placeholder="VD: P1"  require="require"/>
              @error('ma')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="ten">Tên loại phòng</label>
              <input type="text" name="ten" class="form-control" id="ten" value="{{ $loaiphong->ten }}" placeholder="VD: Phòng VIP"  require="require"/>
              @error('ten')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="gia">Giá loại phòng</label>
              <input type="number" name="gia" class="form-control" value="{{ $loaiphong->gia }}" id="gia" min=0  require="require"/>
              @error('gia')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="hinh">Hinh loại phòng</label>
              <input type="file" name="hinh" class="form-control" id="hinh"  require="require"/>
              @error('hinh')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="soluong">Số lượng</label>
              <input type="number" name="soluong" class="form-control" id="soluong" min=1 value="{{ $loaiphong->soluong }}" require="require"/>
              @error('soluong')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="mieuTa">Miêu tả</label>
              <textarea id="mieuTa" name="mieuTa" class="form-control" placeholder="VD: Phòng đẹp, tiện nghi,.." require="require">{{ $loaiphong->mieuTa }}</textarea>
              @error('mieuTa')
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