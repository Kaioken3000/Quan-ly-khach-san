@extends('layouts.app')

@section('content')
<div class="container mt-2">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Loại phòng</h2>
      </div>
      <div class="pull-right mb-2">
        <a class="btn btn-success" href="{{ route('loaiphongs.create') }}"> Create loai phong</a>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <div class="card">
    <h5 class="card-header">Quản lý loại phòng</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="thead-dark">
            <th>Mã loại phòng</th>
            <th>Tên loại phòng</th>
            <th>Giá </th>
            <th>Hinh</th>
            <th>Số lượng</th>
            <th>Miêu tả loại phòng</th>
            <th width="280px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($loaiphongs as $loaiphong)
          <tr>
            <td>{{ $loaiphong->ma }}</td>
            <td>{{ $loaiphong->ten }}</td>
            <td>{{ $loaiphong->gia }} VND</td>
            <td><img data-bs-toggle="tooltip" 
                     data-popup="tooltip-custom" 
                     data-bs-placement="top" 
                     title="{{ $loaiphong->hinh }}" 
                     src="/client/images/{{ $loaiphong->hinh }}" 
                     width="30%"></td>
            <td>{{ $loaiphong->soluong }}</td>
            <td>{{ $loaiphong->mieuTa }}</td>
            <td>
              <form action="{{ route('loaiphongs.destroy',$loaiphong->ma) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('loaiphongs.edit',$loaiphong->ma) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
          <tr>
            <td>
              {!! $loaiphongs->links("pagination::bootstrap-4") !!}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection