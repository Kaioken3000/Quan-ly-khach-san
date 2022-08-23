@extends('layouts.app')

@section('content')
<div class="container mt-2">
  <br>
  <div class="pull-right">
    <a class="btn btn-primary" href="{{ route('phongs.index') }}">Back</a>
  </div>
  <h4 class="fw-bold py-3"><span class="text-muted fw-light">Thêm/</span> Phòng</h4>
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
          <form action="{{ route('phongs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="so_phong">Sô phòng</label>
              <input type="number" name="so_phong" class="form-control" id="so_phong" placeholder="VD: 001" />
              @error('so_phong')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="hinh">Hình phòng</label>
              <input type="file" name="hinh" class="form-control" id="hinh" />
              @error('hinh')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="loaiphongid">Loại phòng</label>
              <select class="form-select" id="loaiphongid" name="loaiphongid">
                @foreach ($loaiphongs as $loaiphong)
                <option value="{{ $loaiphong->ma }}">{{ $loaiphong->ten }}</option>
                @endforeach
              </select>
              @error('loaiphongid')
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