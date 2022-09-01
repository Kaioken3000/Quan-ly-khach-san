@extends('layouts.app')

@section('content')
<div class="container mt-2">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-right mb-2 row">
        <div class="col-4 mb-3">
          <label class="form-label" for="ngayvao">Ngày vào</label>
          <input type="date" name="ngayvao" class="form-control" id="ngayvao" placeholder="VD: Lý Nhựt Nam" 
              value="{{ $request->ngayvao }}"/>
        </div>
        <div class="col-4 mb-3">
          <label class="form-label" for="ngayra">Ngày ra</label>
          <input type="date" name="ngayra" class="form-control" id="ngayra" placeholder="VD: Lý Nhựt Nam" 
              value="{{ $request->ngayra }}"/>
        </div>
        <div class="col-4 mb-3">
          <label class="form-label" for="soluong">Số lượng</label>
          <input type="number" name="soluong" class="form-control" id="soluong" placeholder="VD: 001" 
              value="{{ $request->soluong }}"/>
        </div>
        <input type="hidden" name="khachhangid" value="{{$request->khachhangs}}">
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
                    value="{{ $request->ngayvao }}"/>
                <input type="hidden" name="ngaytra" id="ngaytra" 
                    value="{{ $request->ngayra }}"/>
                <input type="hidden" name="soluong" id="soluong"
                    value="{{ $request->soluong }}"/>
                <input type="hidden" name="khachhangid" value="{{$request->khachhangs}}">
                <input type="hidden" name="phongid" value="{{$phong->so_phong}}">
                <button type="submit" class="btn btn-success">Đặt phòng</button>
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