@extends('layouts2.app')

@section('content')
<div class="container mt-2">
  <br>
  <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('dichvus.index') }}"> <i class="bx bx-chevron-left mb-1"></i> Back</a>
  </div>
  <h4 class="fw-bold py-3"><span class="text-muted fw-light">Dịch vụ/</span> Edit</h4>
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
          <form action="{{ route('dichvus.update',$dichvu->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label" for="ten">Tên dịch vụ</label>
              <input type="text" name="ten" class="form-control" id="ten" value="{{ $dichvu->ten }}" placeholder="VD: ăn uống" require="require" />
              @error('ten')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="giatien">Giá dịch vụ</label>
              <input type="number" name="giatien" class="form-control" value="{{ $dichvu->giatien }}" id="giatien" min=0 require="require" />
              @error('giatien')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="donvi">Đơn vị</label>
              <input type="text" name="donvi" class="form-control" id="donvi" value="{{ $dichvu->donvi }}" placeholder="VD: VND" require="require" />
              @error('donvi')
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