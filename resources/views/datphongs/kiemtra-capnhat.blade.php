@extends('layouts.app')

@section('content')
<div class="container mt-2">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-right mb-2 row">
        <div class="col-4 mb-3">
          <label class="form-label" for="ngaydat">Ngày vào</label>
          <input disabled type="date" name="ngaydat" class="form-control" id="ngaydat" placeholder="VD: Lý Nhựt Nam" 
              value="{{ $dat->ngaydat }}"/>
        </div>
        <div class="col-4 mb-3">
          <label class="form-label" for="ngaytra">Ngày ra</label>
          <input disabled type="date" name="ngaytra" class="form-control" id="ngaytra" placeholder="VD: Lý Nhựt Nam" 
              value="{{ $dat->ngaytra }}"/>
        </div>
        <div class="col-4 mb-3">
          <label class="form-label" for="soluong">Số lượng</label>
          <input disabled type="number" name="soluong" class="form-control" id="soluong" placeholder="VD: 001" 
              value="{{ $dat->soluong }}"/>
        </div>
        <input disabled type="hidden" name="khachhangid" value="{{$dat->khachhangid}}">
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
              <form action="{{ route('danhsachdatphongs.change') }}" method="Post">
                @csrf
                <input type="hidden" name="datphongid" id="datphongid" 
                    value="{{ $dat->id }}"/>
                <input type="hidden" name="phongid" id="phongid" 
                    value="{{ $phong->so_phong }}"/>
                <button type="submit" class="btn btn-success"><i class="bx bx-plus mb-1"></i> Đổi phòng</button>
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