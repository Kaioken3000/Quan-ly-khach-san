@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Khách hàng /</span> Quản lý</h4>
  <a class="btn btn-success mb-4" href="{{ route('khachhangs.create') }}"><i class="bx bx-plus mb-1"></i> Create khách hàng</a>
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
                <a class="btn btn-primary" href="{{ route('khachhangs.edit',$khachhang->id) }}"><i class="bx bx-edit mb-1"></i> Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bx bx-trash mb-1"></i> Delete</button>
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