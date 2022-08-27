@extends('layouts.app')

@section('content')
<div class="container mt-2">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Phòng</h2>
      </div>
      <div class="pull-right mb-2">
        <a class="btn btn-success" href="{{ route('phongs.create') }}"> Create Phòng</a>
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
            <th>Ngày đặt</th>
            <th>Ngày trả</th>
            <th>Số lượng</th>
            <th width="280px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($phongs as $phong)
          <tr>
            <td>{{ $phong->so_phong }}</td>
            <td>{{ $phong->loaiphongid }}</td>
            <td>{{ $phong->ngaydat }}</td>
            <td>{{ $phong->ngaytra }}</td>
            <td>{{ $phong->soluong }}</td>
            <td>
              <form action="{{ route('phongs.destroy',$phong->so_phong) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('phongs.edit',$phong->so_phong) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
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