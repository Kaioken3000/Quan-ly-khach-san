@extends('layouts.app')

@section('content')
<div class="container mt-2">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-right mb-2 row">
        <div class="col-4 mb-3">
          <label class="form-label" for="ngaydat">Ngày vào</label>
          <input type="date" name="ngaydat" class="form-control" id="ngaydat" placeholder="VD: Lý Nhựt Nam" 
              value="{{ $request->ngaydat }}"/>
        </div>
        <div class="col-4 mb-3">
          <label class="form-label" for="ngaytra">Ngày ra</label>
          <input type="date" name="ngaytra" class="form-control" id="ngaytra" placeholder="VD: Lý Nhựt Nam" 
              value="{{ $request->ngaytra }}"/>
        </div>
        <div class="col-4 mb-3">
          <label class="form-label" for="soluong">Số lượng</label>
          <input type="number" name="soluong" class="form-control" id="soluong" placeholder="VD: 001" 
              value="{{ $request->soluong }}"/>
        </div>
        <input type="hidden" name="khachhangid" value="{{$request->khachhangid}}">
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <div class="card">
    <h5 class="card-header">Quản lý phòng</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="thead-dark">
            <th>Số phòng</th>
            <th>Loại phòng</th>
            <th width="280px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($phongs as $phong)
          <tr>
            <td>{{ $phong->so_phong }}</td>
            <td>{{ $phong->loaiphongid }}</td>
            <td>
              <form action="{{ route('datphongs.store') }}" method="Post">
                @csrf
                <input type="hidden" name="ngaydat" id="ngaydat" 
                    value="{{ $request->ngaydat }}"/>
                <input type="hidden" name="ngaytra" id="ngaytra" 
                    value="{{ $request->ngaytra }}"/>
                <input type="hidden" name="soluong" id="soluong"
                    value="{{ $request->soluong }}"/>
                <input type="hidden" name="khachhangid" value="{{$request->khachhangid}}">
                <input type="hidden" name="phongid" value="{{$phong->so_phong}}">
                <input type="hidden" name="tinhtrangthanhtoan" value=0>
                <button type="submit" class="btn btn-success"><i class="bx bx-plus mb-1"></i> Đặt phòng</button>
              </form>
            </td>
          </tr>
          @endforeach
          <tr>
            <td>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection