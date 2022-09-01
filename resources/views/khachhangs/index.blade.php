@extends('layouts.app')

@section('content')
<div class="container mt-2">
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Khách hàng</h2>
      </div>
      <div class="pull-right mb-2">
        <a class="btn btn-success" href="{{ route('khachhangs.create') }}"> Create khách hàng</a>
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
            <th>id</th>
            <th>Ten</th>
            <th>sdt</th>
            <th>email</th>
            <th width="280px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($khachhangs as $khachhang)
          <tr>
            <td>{{ $khachhang->id }}</td>
            <td>{{ $khachhang->ten }}</td>
            <td>{{ $khachhang->sdt }}</td>
            <td>{{ $khachhang->email }}</td>
            <td>
              <form action="{{ route('khachhangs.destroy',$khachhang->id) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('khachhangs.edit',$khachhang->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
          <tr>
            <td>
              {!! $khachhangs->links("pagination::bootstrap-4") !!}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection