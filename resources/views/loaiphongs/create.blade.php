@extends('layouts.app')

@section('content')
<div class="container mt-2">
  <br>
  <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('loaiphongs.index') }}">Back</a>
  </div>
  <h4 class="fw-bold py-3"><span class="text-muted fw-light">Thêm/</span> Loại phòng</h4>
  @if(session('status'))
  <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
  </div>
  @endif
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">From nhập liệu</h5>
          <small class="text-muted float-end"><i class="fa fa-star"></i></small>
        </div>
        <div class="card-body">
          <form action="{{ route('loaiphongs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="ma">Mã loại phòng</label>
              <input type="text" name="ma" class="form-control" id="ma" placeholder="VD: P1" />
              @error('ma')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="ten">Tên loại phòng</label>
              <input type="text" name="ten" class="form-control" id="ten" placeholder="VD: Phòng VIP" />
              @error('ten')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="gia">Giá loại phòng</label>
              <input type="number" name="gia" class="form-control" id="gia" min=0 />
              @error('gia')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="mieuTa">Miêu tả</label>
              <textarea id="mieuTa" name="mieuTa" class="form-control" placeholder="VD: Phòng đẹp, tiện nghi,.."></textarea>
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